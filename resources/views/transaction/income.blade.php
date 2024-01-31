@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">transactions</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">transaction List</h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-success" href="{{route('transaction.create')}}"><i class="fas fa-transaction-plus"></i> Create transaction</a>
                        </div>
                    </div>
                </div>
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
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                @if ($transaction->member->member_type == 1)
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
                                @endif
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection