@extends('admin.layouts.main')

@section('content')

  <div class="container">
    <style>
      .pagination{
          justify-content: center;
      }
    </style>
    {{ $orderUser->links() }}
    <div class="menu-content mt-4">
      <table class="table table-light table-striped-columns ">
        <thead>
          <tr class="table-active">
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Preview</th>
          </tr>
        </thead>
      @if($orderUser->count())
        <tbody>
          @foreach($orderUser as $order)
          @php
              if($order->status == 'pending'){
                  $status = 'menunggu konfirmasi';
                  $text = 'text-danger';
                }elseif($order->status == 'success'){
                  $status = 'dikonfirmasi';
                  $text = 'text-primary';
                }elseif($order->status == 'process'){
                  $status = 'sedang dikirim';
                  $text = 'text-info';
                }elseif($order->status == 'done'){
                  $status = 'Sudah Diterima';
                  $text = 'text-success';
                }else{
                  $status = 'Dibatalkan';
                  $text = 'text-danger';
              }
          @endphp
          <tr>
            <th scope="row">{{ $orderUser->firstItem() + $loop->index }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ $order->user->no_hp }}</td>
            <td>{{ $order->payment }}</td>
            <td>{{ 'Rp '.number_format($order->total_price_checkout, 0, ',', '.') }}</td>
            <td class="{{ $text }} font-weight-bold">{{ ucfirst($status) }}</td>
            <td class="d-flex justify-content-around">
              <a href="{{ route('order.show', $order->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
        @endif
      </table>
    </div>
  </div>
@endsection