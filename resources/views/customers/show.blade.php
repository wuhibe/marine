@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <!-- Back button -->
    <div class="d-flex justify-content-start">
        <a href="{{ route('customers.index') }}" class="mr-2 mb-2">
            <i class="fas fa-chevron-left"> </i> Back
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
        <div class="col-sm-10 mb-3 mb-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Customer Information</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>First Name: </strong> {{ $customer->first_name }}</li>
                                <li class="list-group-item"><strong>Last Name: </strong> {{ $customer->last_name }}</li>
                                <li class="list-group-item"><strong>Email: </strong> {{ $customer->email }}</li>
                                <li class="list-group-item"><strong>Phone: </strong> {{ $customer->phone }}</li>
                                <li class="list-group-item"><strong>Address: </strong> {{ $customer->address }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Avatar: </strong>
                                @if ($customer->avatar)
                                    <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('storage/' . $customer->avatar) }}">
                                        <img src="{{ asset('storage/' . $customer->avatar) }}" alt="Avatar" class="avatar">
                                    </a>
                                @else
                                    None
                                @endif
                                </li>
                                <li class="list-group-item"><strong>Id Photo: </strong>
                                @if ($customer->id_photo)
                                    <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('storage/' . $customer->id_photo) }}">
                                        <img src="{{ asset('storage/' . $customer->id_photo) }}" alt="Id Photo" class="avatar">
                                    </a>
                                @else
                                    None
                                @endif
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 mb-3 mb-lg-2">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Bookings <span class="badge badge-warning">{{ $bookings->count() }}</span></h5>
                <hr />
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead> 
                        <tr>
                            <th>ID</th>
                            <th>Room</th>
                            <th>Check-in Date</th>
                            <th>Check-out Date</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>Receptionist</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->room->room_number }}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>{{ $booking->total_price }}</td>
                            <td>{{ $booking->payment_method }}</td>
                            <td>{{ $booking->receptionist_name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-warning btn-sm" title="View Booking">
                                <i class="fas fa-eye"></i></a>
                                @if ($booking->check_in_date >= now()->toDateString() || auth('admin')->user()->user_type == 'admin')
                                    <a href="{{ route('bookings.edit', $booking->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                @endif
                                @if (auth('admin')->user()->user_type == 'admin')
                                    <a class="btn btn-sm btn-danger" href="javascript:"
                                    onclick=" form_alert('booking-{{ $booking->id }}','Want to delete this booking ?')"
                                    title="Delete booking"><i class="fas fa-trash"></i>
                                    </a>
                                    <form action="{{ route('bookings.destroy', [$booking->id]) }}" method="post" id="booking-{{$booking->id }}"> @csrf @method('delete') </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection