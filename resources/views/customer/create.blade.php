@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fas fa-user"></i> Add New Customer</h3>
                    <div class="card-body">
                        <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="01*********">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="member_type" class="form-label">Member Type</label>
                                        <input type="hidden" name="member_type" class="form-control" value="1">
                                        <div class="border rounded p-1">Customer</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="10" rows="5"></textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-window-restore"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection