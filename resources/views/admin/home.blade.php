@extends('admin.layouts.main')

@section('content')
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome Back! {{ auth()->user()->username }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg  text-center font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-danger text-center">0</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="/dashboard/products" class="text-uppercase btn btn-warning" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-primary text-uppercase mb-1">
                                    Total Foods</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($foods) }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="/dashboard/products" class="text-uppercase btn btn-primary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-primary text-uppercase mb-1">
                                    Total Drinks</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($drinks) }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="/dashboard/products" class="text-uppercase btn btn-primary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-primary text-uppercase mb-1">
                                    Total Services</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($services) }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="/dashboard/services" class="text-uppercase btn btn-primary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection