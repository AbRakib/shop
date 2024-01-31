@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Loan Transactions</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fab fa-amazon-pay"></i> Edid Loan Transaction</h3>
                    <div class="text-center text-success">(Friends)</div>
                    <div class="card-body">
                        <form action="{{route('loan.update', $loan->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Select User</label>
                                        <span class="text-danger">*</span>
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}" @if ($user->id == $loan->user->id) selected @endif>{{$user->name}}</option>
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
                                            <option value="banktransfer" @if ($loan->payment_type == 'banktransfer') selected @endif>Bank Transfer</option>
                                            <option value="cheque" @if ($loan->payment_type == 'cheque') selected @endif>Cheque</option>
                                            <option value="cash" @if ($loan->payment_type == 'cash') selected @endif>Cash</option>
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
                                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" value="{{old('amount', $loan->amount)}}">
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notes</label>
                                        <span class="text-danger">*</span>
                                        <input type="texr" name="notes" class="form-control" value="{{old('notes', $loan->notes)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Status</label>
                                        <span class="text-danger">*</span>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                            <option value="0" @if ($loan->status == 0) selected @endif>Pending</option>
                                            <option value="1" @if ($loan->status == 1) selected @endif>Success</option>
                                        </select>
                                        @error('status')
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