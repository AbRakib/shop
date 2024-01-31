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
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <p>Transtions Debit</p>
                    <div class="row">
                        @foreach ($debitData as $data)
                        <div class="col-md-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        Member: 
                                        <b>{{ $data['name'] }}</b> 
                                        <br>
                                            Debit: <b>${{ $data['debit'] }}</b>
                                    </div>
                                </div>
                                <div class="text-center mb-2">
                                    <a class="btn btn-sm btn-primary" href="{{route('supplier.view', $data['id'])}}">View Details</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $totalDebit += $data['debit'];
                        @endphp
                        @endforeach
                        <div class="col-md-12 mt-4">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5>Total Debit: <b>${{ $totalDebit }}</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <p>Transtions Credit</p>
                    <div class="row">
                        @foreach ($creditData as $data)
                        <div class="col-md-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        Member: 
                                        <b>{{ $data['name'] }}</b> 
                                        <br>
                                        Credit: <b>${{ $data['credit'] }}</b>
                                    </div>
                                </div>
                                <div class="text-center mb-2">
                                    <a class="btn btn-sm btn-primary" href="{{route('customer.view', $data['id'])}}">View Details</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $totalCredit += $data['credit'];
                        @endphp
                        @endforeach
                        <div class="col-md-12 mt-4">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5>Total Credit: <b>${{ $totalCredit }}</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection