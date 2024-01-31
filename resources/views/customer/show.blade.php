@extends('app')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-backward fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fas fa-user"></i> Customer Transactions</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Notes</th>
                                        <th>Start date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Notes</th>
                                        <th>Start date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->member->name}}</td>
                                            <td>{{$transaction->amount}}</td>
                                            <td>{{$transaction->payment_type}}</td>
                                            <td>{{$transaction->notes}}</td>
                                            <td>{{$transaction->created_at->format('d M Y')}}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 class="pt-4 text-center"><i class="fas fa-user"></i></h3>
                    <div class="card-body">
                        <div class="p-2">
                            <table class="table table-bordered border-primary">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>{{ $customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{$customer->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>{{$customer->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$customer->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection