@php
    $totalDebit = 0;
    $totalCredit = 0;
@endphp
@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Report Collections</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Earnings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{ $totalIncome - $totalExpense }}
                                @if ($totalIncome > $totalExpense)
                                    <sup class="text-success">Profit</sup>
                                @elseif($totalIncome < $totalExpense)
                                    <sup class="text-danger">Lose</sup>
                                @else 
                                    <sup class="text-pending">Equal</sup>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Income Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $totalIncome }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Expense Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-danger">${{$totalExpense}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Loan Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalLoan}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 card p-2">
            <h4 class="text-center"><span class="">Transactions</span></h4>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Create Date</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Create Date</th>
                            <th>Payment</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->member->name}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->payment_type}}</td>
                                <td>{{$transaction->created_at->format('d M Y')}}</td>
                                <td>
                                    @if ($transaction->member->member_type == 1)
                                        <span class="badge badge-success">Recived</span>
                                    @elseif($transaction->member->member_type == 2)
                                        <span class="badge badge-danger">Paid</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection