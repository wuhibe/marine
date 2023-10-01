@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Reservation</h2>
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_id">Select Room</label>
            <select name="room_id" class="form-control">
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ $reservation->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="customer_id">Select Customer</label>
            <select name="customer_id" class="form-control">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $reservation->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="check_in_date">Check-in Date</label>
            <input type="date" name="check_in_date" class="form-control" value="{{ $reservation->check_in_date }}">
        </div>
        <div class="form-group">
            <label for="check_out_date">Check-out Date</label>
            <input type="date" name="check_out_date" class="form-control" value="{{ $reservation->check_out_date }}">
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" name="total_price" class="form-control" value="{{ $reservation->total_price }}">
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" value="{{ $reservation->payment_method }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>

<script>
    // Calculate total price based on selected dates and room price
    document.addEventListener('input', function (e) {
        if (e.target.name === 'check_in_date' || e.target.name === 'check_out_date' || e.target.name === 'room_id') {
            calculateTotalPrice();
        }
    });

    function calculateTotalPrice() {
        const checkInDate = new Date(document.querySelector('input[name="check_in_date"]').value);
        const checkOutDate = new Date(document.querySelector('input[name="check_out_date"]').value);
        const roomId = document.querySelector('select[name="room_id"]').value;
        const roomPrice = document.querySelector('select[name="room_id"]').selectedOptions[0].getAttribute('data');
        const roomType = document.querySelector('select[name="room_id"]').selectedOptions[0].getAttribute('type');
        let totalPrice = 1;
        if (!isNaN(checkInDate) && !isNaN(checkOutDate) && roomId !== '') {
            const nights = Math.ceil((checkOutDate - checkInDate) / (1000 * 3600 * 24));
            if (roomType === 'standard'){
                if (nights < 30) {
                    totalPrice = 1500 * nights;
                }
                else{
                    totalPrice = 1400 * nights;
                }
            }
            else if (roomType === 'double'){
                if (nights < 30) {
                    totalPrice = 2500 * nights;
                }
                else if (nights < 45) {
                    totalPrice = 2000 * nights;
                }
                else {
                    totalPrice = 1700 * nights;
                }
            }
            else {
                if (nights < 20) {
                    totalPrice = 4000 * nights;
                }
                else if (nights < 30) {
                    totalPrice = 3700 * nights;
                }
                else {
                    totalPrice = 3200 * nights;
                }
            }
            document.querySelector('input[name="total_price"]').value = totalPrice;
        }
    }
    window.addEventListener('load', calculateTotalPrice);

</script>
@endsection
