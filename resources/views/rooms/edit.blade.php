@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-center">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="fas fa-edit"></i>Update Room</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3 justify-content-center">
            <div class="col-sm-6 col-lg-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="input-label">Room Number</label>
                                        <input type="text" name="room_number" class="form-control" placeholder="Enter room number" value="{{ $room->room_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Price</label>
                                        <input type="number" step="0.5" name="price_per_night" class="form-control" placeholder="Enter price" value="{{ $room->price_per_night }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Capacity</label>
                                        <input type="number" step="1" name="capacity" class="form-control" placeholder="Enter capacity" value="{{ $room->capacity }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Room Type</label>
                                        <select name="room_type" class="form-control">
                                            <option value="standard" {{ $room->room_type == 'standard' ? 'selected' : '' }}>Standard</option>
                                            <option value="double" {{ $room->room_type == 'double' ? 'selected' : '' }}>Double</option>
                                            <option value="queen" {{ $room->room_type == 'queen' ? 'selected' : '' }}>Queen</option>
                                            <option value="king" {{ $room->room_type == 'king' ? 'selected' : '' }}>King</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Description</label>
                                        <textarea type="text" name="description" class="form-control" placeholder="Description">{{ $room->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>

@endsection
