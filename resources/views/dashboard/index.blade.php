@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue for the Past Day</h5>
                        <p class="card-text">{{ $revenueDay }} Br.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue for the Past Week</h5>
                        <p class="card-text">{{ $revenueWeek }} Br.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue for the Past Month</h5>
                        <p class="card-text">{{ $revenueMonth }} Br.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h2>Upcoming Reservations</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($upcomingReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->customer->name }}</td>
                            <td>{{ $reservation->check_in_date->format('Y-m-d') }}</td>
                            <td>{{ $reservation->check_out_date->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
