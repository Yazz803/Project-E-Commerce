@extends('admin.layouts.main')

@section('content')
<div class="form-add-product col-lg-6 m-auto">
    <form action="/dashboard/services" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="font-weight-bold @error('name') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Service Title</label>
            @error('name')
            <p class="text-danger font-weight-bold">
                {{ $message }}
            </p>
            @enderror
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Web Developer" value="{{ old('name') }}">
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="exampleInputPassword1" class="font-weight-bold @error('price') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Price</label>
            @error('price')
            <p class="text-danger font-weight-bold">
                {!! $message !!}
            </p>
            @enderror
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp. xxx.xxx (isi angkanya saja)" value="{{ old('price') }}">
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="exampleFormControlSelect1" class="font-weight-bold @error('category') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Category</label>
            @error('category')
            <p class="text-danger font-weight-bold">
                {!! $message !!}
            </p>
            @enderror
            <select class="form-control @error('category') is-invalid @enderror" name="category" id="exampleFormControlSelect1">
              <option value="progtech">Programming & Technology</option>
              <option value="design">Design Grafis</option>
            </select>
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label class="form-label @error('thumb_img') text-danger @enderror text-primary font-weight-bold"><i class="fa fa-circle"></i> Select Images Thumbnail:</label>
            <p>Direkomendasikan ukurannya 5:3 (Jika tidak maka akan di crop menjadi 5:3)</p>
            @error('thumb_img')
                <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input 
                type="file" 
                name="thumb_img"
                class="form-control @error('thumb_img') is-invalid @enderror">
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label class="form-label @error('images') text-danger @enderror text-primary font-weight-bold" for="inputImage"><i class="fa fa-circle"></i> Select Images (minimal 3 images):</label>
            <p>Direkomendasikan ukurannya 5:3 (Jika tidak maka akan di crop menjadi 5:3)</p>
            <p>Foto thumbnail tidak usah di upload ulang disini</p>
            @error('images')
                <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input 
                type="file" 
                name="images[]" 
                id="inputImage"
                multiple 
                class="form-control @error('images') is-invalid @enderror">

        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="body" class="form-label font-weight-bold @error('description') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Description</label>
            @error('description')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="description"></trix-editor>
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <label for="body" class="form-label font-weight-bold @error('detail') text-danger @enderror text-primary"><i class="fa fa-circle"></i> Detail</label>
            @error('detail')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
            <input id="detail" type="hidden" name="detail" value="{{ old('detail') }}">
            <trix-editor input="detail"></trix-editor>
        </div>
        {{-- code_service --}}
        @if($id_serv == NULL)
        <input type="hidden" name="code_service" value="P-1">
        @else
        <input type="hidden" name="code_service" value="{{ 'P-'.$id_serv->id+1 }}">
        @endif
        @error('code_service')
        <p class="text-danger ">
            {!! $message !!}
        </p>
        @enderror
        <input type="hidden" name="seller_name" value="{{ auth()->user()->username }}">
        @error('seller_name')
        <p class="text-danger ">
            {!! $message !!}
        </p>
        @enderror
        <input type="hidden" name="seller_num" value="{{ uniqId() }}">
        @error('seller_num')
        <p class="text-danger ">
            {!! $message !!}
        </p>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection