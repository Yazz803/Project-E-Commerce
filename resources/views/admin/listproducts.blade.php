@extends('admin.layouts.main')

@section('content')
    
@if($products->count())
    <div class="container">
        <style>
            .pagination{
                justify-content: center;
            }
        </style>
        {{ $products->links() }}
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
                            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
        {{ $products->links() }}
    </>
@else
    <center>
        <h1>Tidak ada Product!</h1>
    </center>
@endif

@endsection