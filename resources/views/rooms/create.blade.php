@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <!-- back button -->
        <div class="d-flex justify-content-start">
            <a href="{{ route('rooms.index') }}" class=" mr-2 mb-2">
                <i class="fas fa-chevron-left"></i> Back
            </a>
        </div>
        <div class="page-header d-flex justify-content-center">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="fas fa-plus"></i>  Create Room</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3 justify-content-center">
            <div class="col-sm-6 col-lg-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="input-label">Room Number</label>
                                        <input type="text" name="room_number" class="form-control" placeholder="Enter room number" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Price</label>
                                        <input type="number" step="0.5" name="price_per_night" class="form-control" placeholder="Enter price" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Capacity</label>
                                        <input type="number" step="1" name="capacity" class="form-control" placeholder="Enter capacity" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Room Type</label>
                                        <select name="room_type" class="form-control">
                                            <option value="standard">Standard</option>
                                            <option value="double">Double</option>
                                            <option value="queen">Queen</option>
                                            <option value="king">King</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Description</label>
                                        <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Availability</label>
                                        <select name="availability" class="form-control">
                                            <option value="AVAILABLE">AVAILABLE</option>
                                            <option value="RESERVED">RESERVED</option>
                                        </select>
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
