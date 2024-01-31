@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Password Change</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid w-25 rounded-pill border border-success border-5" src="{{asset('uploads')}}/{{$user->photo}}" alt="">
                    </div>
                    <div class="p-2">
                        <form action="{{route('password.update', $user->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
                                <small class="mt-2 d-block text-muted">
                                    <input type="checkbox" onclick="oldPassword()"> Show Password
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                <small class="mt-2 d-block text-muted">
                                    <input type="checkbox" onclick="newPassword()"> Show Password
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                <small class="mt-2 d-block text-muted">
                                    <input type="checkbox" onclick="confirmPassword()"> Show Password
                                </small>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('script')
    <script>
        function oldPassword() {
            var data = document.getElementById('old_password');
            if (data.type === "password") {
                data.type = "text";
            } else {
                data.type = "password";
            }
        }
        function newPassword() {
            var data = document.getElementById('new_password');
            if (data.type === "password") {
                data.type = "text";
            } else {
                data.type = "password";
            }
        }
        function confirmPassword() {
            var data = document.getElementById('confirm_password');
            if (data.type === "password") {
                data.type = "text";
            } else {
                data.type = "password";
            }
        }
    </script>
@endpush