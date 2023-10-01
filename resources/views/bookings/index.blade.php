@extends('layouts.app') @section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm">
                <h1 class="page-header-title">
                    <i class="fas fa-list"></i> Bookings List
                </h1>
            </div>
            <div class="col-sm-auto">
                <a
                    class="btn btn-primary"
                    href="{{ route('bookings.create') }}"
                >
                    <i class="fas fa-plus"></i> Add Booking
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-12 col-lg-12 my-lg-2">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h5>
                        Bookings List<span
                            class="badge badge-soft-dark ml-4"
                            id="itemCount"
                            >{{ $bookings->total() }}</span
                        >
                    </h5>
                </div>
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table
                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    >
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
                                <td>
                                    {{ $booking->customer->first_name }}
                                    {{ $booking->customer->last_name }}
                                </td>
                                <td>{{ $booking->check_in_date }}</td>
                                <td>{{ $booking->check_out_date }}</td>
                                <td>{{ $booking->total_price }}</td>
                                <td>{{ $booking->payment_method }}</td>
                                <td>
                                    <a
                                    href="{{ route('bookings.show', $booking->id) }}"
                                    class="btn btn-warning btn-sm" title="View Booking"><i class="fas fa-eye"></i></a>
                                    @if ($booking->check_in_date >= now()->toDateString())
                                    <a
                                        href="{{ route('bookings.edit', $booking->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if (auth('admin')->user()->user_type == 'admin')
                                    <a class="btn btn-sm btn-danger" href="javascript:"
                                        onclick="form_alert('reservation-{{ $reservation->id }}','Want to delete this reservation ?')"
                                        title="Delete reservation"><i
                                            class="fas fa-trash"></i>
                                    </a>
                                    <form action="{{ route('reservations.destroy', [$reservation->id]) }}"
                                    method="post" id="reservation-{{ $reservation->id }}">
                                    @csrf @method('delete')
                                </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr />
                    <div class="page-area">
                        <table>
                            <tfoot>
                                {!! $bookings->withQueryString()->links()
                                !!}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Table -->
    </div>
</div>
@endsection
