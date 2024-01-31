@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fas fa-user"></i> Edit & Update User</h3>
                    <div class="card-body">
                        <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name', $user->name)}}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email', $user->email)}}">
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
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone', $user->phone)}}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" value="{{old('salary', $user->salary)}}">
                                        @error('salary')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                            <option value="1" @if ($user->status == 1) selected @endif>Active</option>
                                            <option value="0" @if ($user->status == 0) selected @endif>Pending</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">User Role</label>
                                        <select class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" id="is_admin">
                                            <option value="1" @if ($user->is_admin == 1) selected @endif>Admin</option>
                                            <option value="0" @if ($user->is_admin == 0) selected @endif>User</option>
                                        </select>
                                        @error('is_admin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="10" rows="5">{{old('address', $user->address)}}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-window-restore"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection