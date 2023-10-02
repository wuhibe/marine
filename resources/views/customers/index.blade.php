@extends('layouts.app')

@section('content')

<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm">
                <h1 class="page-header-title"><i class="fas fa-list"></i> Customers List</h1>
            </div>

            <div class="col-sm-auto">
                <a class="btn btn-primary" href="{{ route('customers.create') }}">
                    <i class="fas fa-plus"></i> Add Customer
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-12 col-lg-12 my-lg-2">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h5>Customer List<span class="badge badge-soft-dark ml-4" id="itemCount">{{ $customers->total() }}</span>
                    </h5>
                    <!-- Search Bar -->
                    <div class="col-6">
                        <form action="{{ route('customers.index') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search customers" value={{$search}}>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                </div>
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Avatar</th>
                                <th>ID Photo</th>
                                <th style="min-width: 8rem;">Actions</th>
                            </tr>
                        </thead>

                        <tbody id="set-rows">
                            @foreach ($customers as $key => $customer)
                            <tr>
                                <td>{{ $key + $customers->firstItem() }}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email ?? '---' }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    @if ($customer->avatar)
                                        <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('storage/' . $customer->avatar) }}">
                                            <img src="{{ asset('storage/' . $customer->avatar) }}" alt="Avatar" class="avatar">
                                        </a>
                                    @else
                                        No Avatar
                                    @endif
                                </td>
                                <td>
                                    @if ($customer->id_photo)
                                        <a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('storage/' . $customer->id_photo) }}">
                                            <img src="{{ asset('storage/' . $customer->id_photo) }}" alt="ID Photo" class="avatar">
                                        </a>
                                    @else
                                        No ID Photo
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('customers.show', [$customer->id]) }}"
                                        title="View Customer"><i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('customers.edit', [$customer->id]) }}"
                                        title="Edit Customer"><i class="fas fa-edit"></i>
                                    </a>
                                    @if(auth('admin')->user()->user_type == 'admin')
                                    <a class="btn btn-sm btn-danger" href="javascript:"
                                        onclick="form_alert('customer-{{ $customer->id }}','Want to delete this customer ?')"
                                        title="Delete Customer"><i class="fas fa-trash"></i>
                                    </a>
                                    <form action="{{ route('customers.destroy', [$customer->id]) }}" method="post"
                                        id="customer-{{ $customer->id }}">
                                        @csrf
                                        @method('delete')
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
                                {!! $customers->withQueryString()->links() !!}
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
