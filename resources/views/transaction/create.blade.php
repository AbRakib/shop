@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fab fa-amazon-pay"></i> New Transaction</h3>
                    <div class="text-center text-success">(Customer & Suppliers)</div>
                    <div class="card-body">
                        <form action="{{route('transaction.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Select Member</label>
                                        <span class="text-danger">*</span>
                                        <select name="member_id" class="form-control @error('member_id') is-invalid @enderror" id="member_id">
                                            @foreach ($members as $member)
                                                <option value="{{$member->id}}">{{$member->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('member_id')
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