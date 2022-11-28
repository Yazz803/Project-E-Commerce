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
            <th scope="col" class="text-center">Actions</th>
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
              <a href="{{ route('generateInvoicePDFAdmin', $order->id) }}" class="btn btn-light"><i class="fa fa-eye"></i></a>
              @if($order->status == 'pending')
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="success">
                <button type="submit" onclick="return confirm('Pesanan akan dikonfirmasi, tekan OK jika ingin melanjutkannya')" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
              @elseif($order->status == 'success')
              {{-- <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="pending">
                <button typep="submit" class="btn btn-danger"><i class="fa fa-arrow-left"></i></button>
              </form> --}}
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="estimasiTiba">Estimasi Tiba</label>
                <input type="date" name="estimasi_tiba">
                @error('estimasi_tiba')
                <script>alert('Harap isi Tanggal Estimasi Tiba')</script>
                @enderror
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="process">
                <button type="submit" onclick="return confirm('Pesanan akan diproses, tekan OK jika ingin melanjutkannya')" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
              @elseif($order->status == 'process')
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="estimasiTiba">Ubah Estimasi Tiba</label>
                <input type="hidden" name="status" value="{{ $order->status }}">
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="ubah" value="1">
                <input type="date" name="estimasi_tiba">
                @error('estimasi_tiba')
                <script>alert('{{ $message }}')</script>
                @enderror
                @if(session('ubah_estimasi'))
                <script>alert('{{ session('ubah_estimasi') }}')</script>
                @endif
                <button type="submit" onclick="return confirm('Tanggal Estimasi Tiba akan diubah, tekan OK jika ingin melanjutkannya')" class="btn btn-success"><i class="fa fa-edit"></i></button>
              </form>
              <form action="{{ route('status.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="done">
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <button type="submit" onclick="return confirm('Pesanan sampai di costumer, tekan OK jika ingin melanjutkannya')" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
        @endif
      </table>
    </div>
  </div>
@endsection