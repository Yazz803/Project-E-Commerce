@extends('admin.layouts.main')

@section('content')
  <nav class="navbar bg-light justify-content-around menu">
      <a href="#belumDibayar" class="menu-btn"><button class="btn btn-danger me-2 font-weight-bold" type="button">Belum Transfer</button></a>
      <a href="#sudahDibayar" class="menu-btn"><button class="btn btn-primary me-2 font-weight-bold" type="button">Sudah Transfer</button></a>
      <a href="#diproses" class="menu-btn"><button class="btn btn-secondary me-2 font-weight-bold" type="button">Di proses</button></a>
      <a href="#done" class="menu-btn"><button class="btn btn-success me-2 font-weight-bold" type="button">Done</button></a>
  </nav>
  <hr>
  <div class="container">
    <div class="menu-content belumDibayar">
      <table class="table table-primary table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Total Price</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orderUser as $order)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ 'Rp '.number_format($order->total_price, 0, ',', '.') }}</td>
            <td class="d-flex justify-content-around">
              <a href="" class="btn btn-light"><i class="fa fa-eye"></i></a>
              <form action="">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="menu-content sudahDibayar">
      Sudah dibayar
    </div>
    <div class="menu-content diproses">
      Proses coy
    </div>
    <div class="menu-content done">
      Done
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