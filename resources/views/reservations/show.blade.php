@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservation Details</h2>
    <p><strong>Room:</strong> {{ $reservation->room->room_number }}</p>
    <p><strong>Customer:</strong> {{ $reservation->customer->first_name }} {{ $reservation->customer->last_name }}</p>
    <p><strong>Check-in Date:</strong> {{ $reservation->check_in_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $reservation->check_out_date }}</p>
    <p><strong>Total Price:</strong> {{ $reservation->total_price }}</p>
    <p><strong>Payment Method:</strong> {{ $reservation->payment_method }}</p>
    <a href="{{ route('reservations.index') }}" class="btn btn-primary">Back to Reservations</a>
</div>
@endsection
