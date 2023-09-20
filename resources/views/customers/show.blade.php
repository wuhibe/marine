@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <!-- Back button -->
        <div class="d-flex justify-content-start">
            <a href="{{ route('customers.index') }}" class="mr-2 mb-2">
                <i class="fas fa-chevron-left"></i> Back
            </a>
        </div>
        <div class="page-header d-flex justify-content-center">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="fas fa-user"></i> Customer Details</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row justify-content-center">
            <div class="col-sm-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Information</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>First Name:</strong> {{ $customer->first_name }}</li>
                            <li class="list-group-item"><strong>Last Name:</strong> {{ $customer->last_name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
                            <li class="list-group-item"><strong>Phone:</strong> {{ $customer->phone }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $customer->address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservations</h5>
                        @if ($customer->reservations->isEmpty())
                            <p>No reservations found for this customer.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($customer->reservations as $reservation)
                                    <li class="list-group-item">
                                        Reservation ID: {{ $reservation->id }}<br>
                                        Check-in Date: {{ $reservation->checkin_date }}<br>
                                        Check-out Date: {{ $reservation->checkout_date }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Past Bookings</h5>
                        <p>Total Past Bookings: {{ $customer->bookings->where('status', 'completed')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
