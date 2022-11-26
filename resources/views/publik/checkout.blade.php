@extends('publik.layouts.main')

@section('section')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($checkouts->count() > 0)
				{{-- @dd($orders) --}}
					<!-- Product tab -->
					<div class="col-md-12" id="container">
						<div id="product-tab" style="margin-top: 0">
							<!-- section title -->
							<div>
								<div class="section-title">
									<center>
										<h3 class="title"><u>Daftar Transaksi</u></h3>
									</center>
								</div>
							</div>
							<!-- /section title -->
							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div style="font-size: 16px;list-style:circle !important;">
											@foreach($checkouts as $checkout)
											@php
												if($checkout->status == 'pending'){
													$status = 'Menunggu Pembayaran';
													$background = 'rgb(201, 201, 201)';
												}elseif($checkout->status == 'success'){
													$status = 'Pesanan Dikonfirmasi';
													$background = 'green';
												}elseif($checkout->status == 'process'){
													$status = 'Pesanan Sedang Diproses';
													$background = 'yellow';
												}elseif($checkout->status == 'done'){
													$status = 'Pesanan Selesai';
													$background = 'blue';
												}

											@endphp
											<div class="product-cart" style="width: 50%;margin-top: 10px;">
												<div class="text-product" style="width: 100%; position: relative;">
													<h3 class="product-name" style="margin-bottom: 20px;font-size: 20px !important;"><i class="fa fa-shopping-bag"></i> Pesanan kamu #{{ $loop->iteration }} <span style="color: white;position: absolute;right:-15px;top: -20px;background-color: {{ $background }};border-radius:10px;padding: 5px 10px;font-size:14px;">{{ $status }}</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p style="margin-bottom: 0;">Dipesan tanggal : <span style="font-weight: bold">{{ \Carbon\Carbon::parse($checkout->created_at)->format('j F Y |'). ' '. $checkout->created_at->format('H:i') }}</span></p>
													@if($checkout->status == 'success')
													<p style="margin-bottom: 0;">Dikonfirmasi tgl : <span style="font-weight: bold;color:green;">{{ \Carbon\Carbon::parse($checkout->updated_at)->format('j F Y |'). ' '. $checkout->updated_at->format('H:i') }}</span></p>
													@endif
													<p style="margin-bottom: 0;">Id Pemesanan : <span style="font-weight: bold">{{ $checkout->id_pemesanan }}</span></p>
													<p style="margin-bottom: 0;">Metode Pembayaran : <span style="font-weight: bold;">{{ $checkout->payment }}</span></p>
													<p style="margin-bottom: 20px;">Total Harga : <span style="font-weight: bold;">Rp {{ number_format($checkout->total_price_checkout, 0, ',', '.') }}</span></p>
													<div class="" style="margin-bottom: 10px">
														<a href="{{ route('checkout.show', $checkout->id) }}" style="background-color: #333;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-eye"></i> Lihat Pesanan</a>
														@if($checkout->status == 'pending')
														<a href="/checkout/{{ $checkout->id }}" style="background-color: red;font-weight:bold;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-close"></i> Cancel</a>
														@endif
													</div>
												</div>
											</div>
											{{-- <div class="product-cart">
												<img src="/images/{{ $order->product->thumb_img }}" width="100px" alt="">
												<div class="text-product">
													<a href="/product/{{ $order->product->slug }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
													<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
												</div>
											</div> --}}
											@endforeach
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
					@else
					<div class="product-cart">
						<h3 class="product-name" style="padding: 20px;">Belum ada Checkout!</h3>
					</div>
					@endif
            </div>
        </div>
    </div>

	<script>
		// Sticky navbar
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var navbar = document.getElementById("navigation");
		var section = document.getElementById("container")

		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;

		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
			section.classList.add("sticky-margin-checkout")
		} else {
			navbar.classList.remove("sticky");
			section.classList.remove("sticky-margin-checkout")
		}
		}
	</script>
@endsection