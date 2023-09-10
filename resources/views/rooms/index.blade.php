@extends('layouts.app')

@section('content')

<div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title"><i class="fas fa-list"></i> Rooms List </h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{route('rooms.create')}}">
                        <i class="fas fa-plus"></i> Add Room
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 my-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h5>Room List<span
                                class="badge badge-soft-dark ml-4" id="itemCount">{{ $rooms->total() }}</span></h5>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Room Number</th>
                                    <th>Type</th>
                                    <th style="max-width: 20%">Description</th>
                                    <th>Price</th>
                                    <th>Capacity</th>
                                    <th>Availability</th>
                                    <th style="min-width: 8rem;">Action</th>
                                </tr>
                            </thead>

                            <tbody id="set-rows">
                                @foreach ($rooms as $key => $room)
                                    <tr>
                                        <td>{{ $key + $rooms->firstItem() }}</td>
                                        <td>{{ $room->room_number }}</td>
                                        <td>
                                            <span class="d-block font-size-sm text-uppercase">
                                                {{ $room->room_type }}
                                            </span>
                                        </td>
                                        <td style="max-width: 25rem; overflow: hidden; text-overflow: ellipsis;"
                                        title="{{ $room->description }}"
                                        >
                                            {{ $room->description }}
                                        </td>
                                        <td>
                                            <span class="d-block font-size-sm text-body">
                                                {{ $room->price_per_night }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-block font-size-sm text-body">
                                                {{ $room->capacity }}
                                            </span>
                                        </td>
                                        <td>
                                            <label class="toggle-switch toggle-switch-sm"
                                                for="stocksCheckbox{{ $room->id }}">
                                                <input type="checkbox"
                                                    onclick="form_alert('availability-{{ $room->id }}','Want to change availability for this room ?', event)"
                                                    class="toggle-switch-input" id="stocksCheckbox{{ $room->id }}"
                                                    {{ $room->availability == 'AVAILABLE' ? 'checked' : '' }}>
                                                <span class="toggle-switch-label">
                                                    <span class="toggle-switch-indicator"></span>
                                                </span>
                                            </label>
                                            <form
                                                action="{{ route('rooms.availability', [$room->id, $room->availability === 'AVAILABLE' ? 'RESERVED' : 'AVAILABLE']) }}"
                                                method="get" id="availability-{{ $room->id }}">
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-white"
                                                href="{{ route('rooms.edit', [$room->id]) }}"
                                                title="Edit Room"><i
                                                    class="fas fa-edit"></i>
                                            </a>
                                            @if (auth('admin')->user()->user_type == 'admin')
                                                <a class="btn btn-sm btn-white" href="javascript:"
                                                    onclick="form_alert('room-{{ $room->id }}','Want to delete this room ?')"
                                                    title="Delete room"><i
                                                        class="fas fa-trash"></i>
                                                </a>
                                                <form action="{{ route('rooms.destroy', [$room->id]) }}"
                                                    method="post" id="room-{{ $room->id }}">
                                                    @csrf @method('delete')
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="page-area">
                            <table>
                                <tfoot>
                                    {!! $rooms->withQueryString()->links() !!}
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

