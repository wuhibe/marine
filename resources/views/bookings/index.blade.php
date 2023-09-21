@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Booking List</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-2">Create Booking</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>Customer</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->room->room_number }}</td>
                <td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>{{ $booking->total_price }}</td>
                <td>{{ $booking->payment_method }}</td>
                <td>
                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $bookings->links() }}
</div>
@endsection
