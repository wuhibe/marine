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
                    <h1 class="page-header-title"><i class="fas fa-edit"></i> Update Customer</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3 justify-content-center">
            <div class="col-sm-6 col-lg-6 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="input-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Enter first name" value="{{ $customer->first_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter last name" value="{{ $customer->last_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $customer->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{ $customer->phone }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{ $customer->address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Avatar</label>
                                        <div class="d-flex flex-row">
                                            <input type="file" name="avatar_img" class="form-control-file">
                                            @if ($customer->avatar)
                                                <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ $customer->avatar }}">
                                                    <img src="{{ ($customer->avatar) }}" alt="Avatar" class="avatar">
                                                </a>
                                            @else
                                                No Avatar
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">ID Photo</label>
                                        <div class="d-flex flex-row">
                                            <input type="file" name="id_photo_img" class="form-control-file">
                                            @if ($customer->id_photo)
                                                <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ $customer->id_photo }}">
                                                    <img src="{{ ($customer->id_photo) }}" alt="ID Photo" class="avatar">
                                                </a>
                                            @else
                                                No ID Photo
                                            @endif
                                        </div>
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
