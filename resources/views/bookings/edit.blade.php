@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Booking</h2>
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_id">Select Room</label>
            <select name="room_id" class="form-control">
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="customer_id">Select Customer</label>
            <select name="customer_id" class="form-control">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="check_in_date">Check-in Date</label>
            <input type="date" name="check_in_date" class="form-control" value="{{ $booking->check_in_date }}">
        </div>
        <div class="form-group">
            <label for="check_out_date">Check-out Date</label>
            <input type="date" name="check_out_date" class="form-control" value="{{ $booking->check_out_date }}">
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" name="total_price" class="form-control" value="{{ $booking->total_price }}">
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" value="{{ $booking->payment_method }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Booking</button>
    </form>
</div>
@endsection
