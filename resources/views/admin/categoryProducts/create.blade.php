@extends('admin.layouts.main')

@section('content')

<div class="form-add-product col-lg-6 m-auto">
    <a href="{{ route('category-products.index') }}" class="btn btn-outline-info mb-4 font-weight-bold"><i class="fa fa-arrow-left"></i> Back</a>
    <form action="{{ route('category-products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="font-weight-bold @error('name') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Nama Kategori Product</label>
            @error('name')
            <p class="text-danger font-weight-bold">
                {{ $message }}
            </p>
            @enderror
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Kategori" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="slogan" class="font-weight-bold @error('slogan') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Kata Slogan</label>
            @error('slogan')
            <p class="text-danger font-weight-bold">
                {{ $message }}
            </p>
            @enderror
            <input type="text" name="slogan" class="form-control @error('slogan') is-invalid @enderror" id="slogan" placeholder="Masukan Kata-kata Slogan" value="{{ old('slogan') }}">
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="body" class="form-label font-weight-bold @error('thumb_img') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Thumbnail Image</label>
            @error('thumb_img')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input type="file" name="thumb_img" class="form-control @error('thumb_img') is-invalid @enderror">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection