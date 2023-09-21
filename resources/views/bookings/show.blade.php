@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Booking Details</h2>
    <p><strong>Room:</strong> {{ $booking->room->room_number }}</p>
    <p><strong>Customer:</strong> {{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</p>
    <p><strong>Check-in Date:</strong> {{ $booking->check_in_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $booking->check_out_date }}</p>
    <p><strong>Total Price:</strong> {{ $booking->total_price }}</p>
    <p><strong>Payment Method:</strong> {{ $booking->payment_method }}</p>
    <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back to Bookings</a>
</div>
@endsection
