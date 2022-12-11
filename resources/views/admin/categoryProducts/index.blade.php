@extends('admin.layouts.main')

@section('content')
<div class="container">
    <a href="{{ route('category-products.create') }}" class="btn btn-primary mb-4">Add Category Product</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name Category</th>
            <th scope="col">Thumb Image</th>
            <th scope="col" width="200px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($category_products as $category)
          <tr>
            <th scope="row" width="5%">{{ $loop->iteration }}</th>
            <td width="15%">{{ $category->name }}</td>
            <td width="60%">
                <img src="{{ asset('/images/'. $category->thumb_img) }}" width="300px" alt="" class="img-fluid">
            </td>
            <td>
              <form action="{{ route('category-products.destroy', $category->id) }}" method="POST">
                <a href="{{ route('category-products.edit', $category->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection