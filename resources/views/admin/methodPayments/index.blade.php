@extends('admin.layouts.main')

@section('content')
<div class="container">
    <a href="/dashboard/method-payments/create" class="btn btn-primary mb-4">Add Method Payments</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Description</th>
            <th scope="col" width="200px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($methodPayments as $methodPayment)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $methodPayment->name }}</td>
            <td style="-webkit-line-clamp: 2;display: -webkit-box; -webkit-box-orient:vertical; overflow:hidden; height:60px;">
                {!! $methodPayment->description !!}
            </td>
            <td>
              <form action="/dashboard/method-payments/{{ $methodPayment->id }}" method="POST">
                <a href="/dashboard/method-payments/{{ $methodPayment->id }}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
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