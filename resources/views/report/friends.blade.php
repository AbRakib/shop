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
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Today</th>
                                    <th>Yestarday</th>
                                    <th>This Month</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Today</th>
                                    <th>Yestarday</th>
                                    <th>This Month</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{$loan->id}}</td>
                                        <td>{{$loan->user->name}}</td>
                                        <td>{{$loan->where('user_id', $loan->user->id)->whereDate('created_at', now()->toDateString())->sum('amount')}}</td>
                                        <td>{{$loan->where('user_id', $loan->user->id)->whereDate('created_at', now()->subDay())->sum('amount')}}</td>
                                        <td>{{$loan->where('user_id', $loan->user->id)->whereBetween('created_at', [now()->startOfMonth(), now()])->sum('amount')}}</td>
                                        <td>{{$loan->where('user_id', $loan->user->id)->sum('amount')}}</td>
                                        <td>{{$loan->status == 0 ? 'Pending': 'Paid'}}</td>
                                    </tr>
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