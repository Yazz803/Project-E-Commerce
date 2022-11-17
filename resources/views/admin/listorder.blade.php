@extends('admin.layouts.main')

@section('content')
  <nav class="navbar bg-light justify-content-around menu">
      <a href="#belumDibayar" class="menu-btn"><button class="btn btn-outline-danger me-2 font-weight-bold" type="button">Belum Transfer</button></a>
      <a href="#sudahDibayar" class="menu-btn"><button class="btn btn-outline-primary me-2 font-weight-bold" type="button">Sudah Transfer</button></a>
      <a href="#diproses" class="menu-btn"><button class="btn btn-outline-secondary me-2 font-weight-bold" type="button">Di proses</button></a>
      <a href="#done" class="menu-btn"><button class="btn btn-outline-success me-2 font-weight-bold" type="button">Done</button></a>
  </nav>
  <hr>
  <div class="container">
    <div class="menu-content belumDibayar">
      {{-- @if($) --}}
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Pengiriman</th>
            <th scope="col">Total Price</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach($orderUser as $order)
          <tr>
            @if($order->status == 'pending')
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ $order->user->no_hp }}</td>
            <td>Bank BRI</td>
            <td>COD</td>
            <td>{{ 'Rp '.number_format($order->total_price_checkout, 0, ',', '.') }}</td>
            <td class="d-flex justify-content-around">
              <a href="" class="btn btn-light"><i class="fa fa-eye"></i></a>
              <form action="/ubah-status" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="success">
                <button typep="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="menu-content sudahDibayar">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Total Price</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach($orderUser as $order)
          <tr>
            @if($order->status == 'success')
            <th scope="row">{{ $no }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ 'Rp '.number_format($order->total_price_checkout, 0, ',', '.') }}</td>
            <td class="d-flex justify-content-around">
              <a href="" class="btn btn-light"><i class="fa fa-eye"></i></a>
              <form action="/ubah-status" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="pending">
                <button typep="submit" class="btn btn-danger"><i class="fa fa-arrow-left"></i></button>
              </form>
              <form action="/ubah-status" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="process">
                <button typep="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="menu-content diproses">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Total Price</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach($orderUser as $order)
          <tr>
            @if($order->status == 'process')
            <th scope="row">{{ $no }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ 'Rp '.number_format($order->total_price_checkout, 0, ',', '.') }}</td>
            <td class="d-flex justify-content-around">
              <a href="" class="btn btn-light"><i class="fa fa-eye"></i></a>
              <form action="/ubah-status" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="done">
                <button typep="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="menu-content done">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Total Price</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach($orderUser as $order)
          <tr>
            @if($order->status == 'success')
            <th scope="row">{{ $no }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ 'Rp '.number_format($order->total_price_checkout, 0, ',', '.') }}</td>
            <td class="d-flex justify-content-around">
              <a href="" class="btn btn-light"><i class="fa fa-eye"></i></a>
              <form action="/ubah-status" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="checkout_id" value="{{ $order->id }}">
                {{-- <input type="hidden" name="status" value="process"> --}}
                {{-- <button typep="submit" class="btn btn-primary"><i class="fa fa-check"></i></button> --}}
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    var $content = $('.menu-content');

    function showContent(type) {
      $content.hide().filter('.' + type).show();
    }

    $('.menu').on('click', '.menu-btn', function(e) {
      showContent(e.currentTarget.hash.slice(1));
      e.preventDefault();
    }); 

    // show '...' content only on page load
    showContent('belumDibayar');
  </script>
@endsection