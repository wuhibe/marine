@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Reservation</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="room_id">Select Room</label>
            <select name="room_id" class="form-control">
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}" data="{{$room->price_per_night}}">
                        {{ " $room->capacity Bed(s)  -  No. $room->room_number  -  $room->room_type size  -  -  $room->price_per_night"}}</p>
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="customer_id">Select Customer</label> <span class="text-right"><a href="{{ route('customers.create') }}">Create Customer</a></span>
            <select name="customer_id" class="form-control">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" name="check_in_date" class="form-control" min="{{ now()->toDateString() }}" required>
            </div>
            <div class="col-6">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" name="check_out_date" class="form-control" min="{{ now()->addDay()->toDateString() }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" name="total_price" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Create Reservation</button>
    </form>
</div>


<script>
    // Calculate total price based on selected dates and room price
    document.addEventListener('input', function (e) {
        if (e.target.name === 'check_in_date' || e.target.name === 'check_out_date' || e.target.name === 'room_id') {
            calculateTotalPrice();
        }
    });
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
    // Calculate total price on page load
    window.addEventListener('load', calculateTotalPrice);

</script>
@endsection
