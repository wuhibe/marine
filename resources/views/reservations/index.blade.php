@extends('layouts.app') @section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm">
                <h1 class="page-header-title">
                    <i class="fas fa-list"></i> Reservations List
                </h1>
            </div>
            <div class="col-sm-auto">
                <a
                    class="btn btn-primary"
                    href="{{ route('reservations.create') }}"
                >
                    <i class="fas fa-plus"></i> Add Reservation
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
                        Reservations List<span
                            class="badge badge-soft-dark ml-4"
                            id="itemCount"
                            >{{ $reservations->total() }}</span
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->room->room_number }}</td>
                                <td>
                                    {{ $reservation->customer->first_name }}
                                    {{ $reservation->customer->last_name }}
                                </td>
                                <td>{{ $reservation->check_in_date }}</td>
                                <td>{{ $reservation->check_out_date }}</td>
                                <td>{{ $reservation->total_price }}</td>
                                <td>
                                @if($reservation->status == 'PENDING' && $reservation->check_in_date > date('Y-m-d'))
                                    <a
                                        href="{{ route('reservations.show', $reservation->id) }}"
                                        class="btn btn-warning btn-sm"
                                        ><i class="fas fa-eye"></i></a
                                    >
                                    <a
                                        href="{{ route('reservations.edit', $reservation->id) }}"
                                        class="btn btn-primary btn-sm"
                                        ><i class="fas fa-edit"></i></a
                                    >
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
                                {!! $reservations->withQueryString()->links()
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
