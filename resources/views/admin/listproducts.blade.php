@extends('admin.layouts.main')

@section('content')
    
@if($products->count())
    <div class="container">
        <div class="row">
            {{-- List Product --}}
            @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/images/{{ $product->thumb_img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark uppercase">{{ $product->name }}</h5>
                        <h5 class="card-title font-weight-bold text-danger">Rp {{ number_format($product->price,0, ',', '.') }} (Stock : {{ $product->stock }})</h5>
                        <div class="text-truncate-mine">
                            {!! $product->description !!}
                        </div>
                        <hr>
                        <div class="action-button d-flex justify-content-around">
                            <a href="/product/{{ $product->slug }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="/dashboard/products/{{ $product->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <form action="/dashboard/products/{{ $product->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- /List Product --}}
        </div>
    </div>
@else
    <center>
        <h1>Tidak ada Product!</h1>
    </center>
@endif

@endsection