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
                                    Menunggu Konfirmasi</div>
                                <div class="h5 mb-0 font-weight-bold text-danger text-center">{{ $pendingOrders->count() }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('order.index') }}" class="text-uppercase btn btn-warning" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg  text-center font-weight-bold text-primary text-uppercase mb-1">
                                    Dikonfirmasi</div>
                                <div class="h5 mb-0 font-weight-bold text-primary text-center">{{ $successOrders->count() }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('order.index') }}" class="text-uppercase btn btn-primary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg  text-center font-weight-bold text-info text-uppercase mb-1">
                                    Proses Dikirim</div>
                                <div class="h5 mb-0 font-weight-bold text-info text-center">{{ $processOrders->count() }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('order.index') }}" class="text-uppercase btn btn-info" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg  text-center font-weight-bold text-success text-uppercase mb-1">
                                    Orderan Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-success text-center">{{ $doneOrders->count() }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('order.index') }}" class="text-uppercase btn btn-success" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($products) }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('products.index') }}" class="text-uppercase btn btn-secondary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-dark text-uppercase mb-1">
                                    Total Services</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ count($services) }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('services.index') }}" class="text-uppercase btn btn-dark" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            @foreach($category_products as $category)
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-secondary text-uppercase mb-1">
                                Total {{ ucfirst($category->name) }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $category->ttl_product }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('products.index') }}" class="text-uppercase btn btn-secondary" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($category_services as $category)
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg text-center font-weight-bold text-dark text-uppercase mb-1">
                                Total {{ ucfirst($category->name) }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $category->ttl_product }}</div>
                            </div>
                        </div>
                        <center class="mt-4">
                            <a href="{{ route('products.index') }}" class="text-uppercase btn btn-dark" style="font-weight: bold">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection