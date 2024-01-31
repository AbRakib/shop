@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">loans</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fab fa-amazon-pay"></i> New loan</h3>
                    <div class="text-center text-success">(Friends)</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Create Date</th>
                                        <th>Payment Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Create Date</th>
                                        <th>Payment Type</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($loans as $loan)
                                    @if ($loan->user->is_admin == 0)
                                        <tr>
                                            <td>{{$loan->id}}</td>
                                            <td>{{$loan->user->name}}</td>
                                            <td>{{$loan->amount}}</td>
                                            <td>{{$loan->payment_type}}</td>
                                            <td>{{$loan->created_at->format('d M Y')}}</td>
                                            <td>
                                                @if ($loan->status == 1)
                                                    <span class="badge badge-success">Paid Success</span>
                                                @elseif($loan->status == 0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('loan.edit', $loan->id)}}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fab fa-amazon-pay"></i> New loan</h3>
                    <div class="text-center text-success">(Friends)</div>
                    <div class="card-body">
                        <form action="{{route('loan.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Select User</label>
                                        <span class="text-danger">*</span>
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Payment Type</label>
                                        <span class="text-danger">*</span>
                                        <select name="payment_type" class="form-control @error('payment_type') is-invalid @enderror" id="payment_type">
                                            <option value="banktransfer">Bank Transfer</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                        @error('payment_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Payment Amount</label>
                                        <span class="text-danger">*</span>
                                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" value="{{old('amount')}}">
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notes</label>
                                        <span class="text-danger">*</span>
                                        <input type="texr" name="notes" class="form-control" value="{{old('notes')}}">
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