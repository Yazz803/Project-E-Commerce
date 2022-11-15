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
							<!-- product tab nav -->
							<ul class="" style="display:flex; list-style:none;justify-content:center;gap: 20px;flex-wrap:wrap;margin: 30px 0;">
								<li class="active"><a data-toggle="tab" href="#tab1" style="background-color:red;padding:5px 15px;border-radius:5px;color:white;"><i class="fa fa-exclamation"></i> Belum Bayar</a></li>
								<li><a data-toggle="tab" href="#tab2" style="background-color:green;padding:5px 10px;border-radius:5px;color:white;"><i class="fa fa-money"></i> Sudah Bayar</a></li>
								<li><a data-toggle="tab" href="#tab3" style="background-color:gray;padding:5px 10px;border-radius:5px;color:white;"><i class="fa fa-spinner"></i> Diproses</a></li>
								<li><a data-toggle="tab" href="#tab4" style="background-color:greenyellow;padding:5px 10px;border-radius:5px;color:white;"><i class="fa fa-check"> Done</i></a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div style="font-size: 16px;list-style:circle !important;">
											@foreach($checkouts as $checkout)
											@if($checkout->status == 'pending')
											<div class="product-cart" style="width: 50%;">
												<div class="text-product" style="width: 100%; position: relative;">
													<h3 class="product-name" style="margin-bottom: 20px;font-size: 20px !important;">Pesanan kamu #{{ $loop->iteration }} <span style="color: white;position: absolute;right:10px;background-color:red;border-radius:10px;padding: 5px 10px;font-size:14px;">{{ ucfirst($checkout->status) }}</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p style="margin-bottom: 0;">Dipesan tanggal : <span style="font-weight: bold">{{ $checkout->created_at->format('d/m/Y'). ' '. $checkout->created_at->format('H:i:s') }}</span></p>
													<p style="margin-bottom: 0;">Metode Pembayaran : <span style="font-weight: bold;">Bank BRI</span></p>
													<p style="margin-bottom: 20px;">Total Harga : <span style="font-weight: bold;">Rp {{ number_format($checkout->total_price_checkout, 0, ',', '.') }}</span></p>
													<div class="" style="margin-bottom: 10px">
														<a href="/checkout/{{ $checkout->id }}" style="background-color: #333;font-weight:bold;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-eye"></i> Lihat Pesanan</a>
														<a href="/checkout/{{ $checkout->id }}" style="background-color: red;font-weight:bold;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-close"></i> Cancel</a>
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
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										@php
											
										@endphp
										<div style="font-size: 16px;list-style:circle !important;">
											@foreach($checkouts as $checkout)
											@if($checkout->status == 'success')
											<div class="product-cart" style="width: 50%;">
												<div class="text-product" style="width: 100%; position: relative;">
													<h3 class="product-name" style="margin-bottom: 20px;font-size: 20px !important;">Pesanan kamu #{{ $loop->iteration }} <span style="color: white;position: absolute;right:10px;background-color:green;border-radius:10px;padding: 5px 10px;font-size:14px;">{{ ucfirst($checkout->status) }}</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p style="margin-bottom: 0;">Dipesan tanggal : <span style="font-weight: bold">{{ $checkout->created_at->format('d/m/Y'). ' '. $checkout->created_at->format('H:i:s') }}</span></p>
													<p style="margin-bottom: 0;">Metode Pembayaran : <span style="font-weight: bold;">Bank BRI</span></p>
													<p style="margin-bottom: 20px;">Total Harga : <span style="font-weight: bold;">Rp {{ number_format($checkout->total_price_checkout, 0, ',', '.') }}</span></p>
													<div class="" style="margin-bottom: 10px">
														<a href="/checkout/{{ $checkout->id }}" style="background-color: #333;font-weight:bold;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-eye"></i> Lihat Pesanan</a>
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
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<div style="font-size: 16px;list-style:circle !important;">
											@foreach($checkouts as $checkout)
											@if($checkout->status == 'process')
											<div class="product-cart" style="width: 50%;">
												<div class="text-product" style="width: 100%; position: relative;">
													<h3 class="product-name" style="margin-bottom: 20px;font-size: 20px !important;">Pesanan kamu #{{ $loop->iteration }} <span style="color: white;position: absolute;right:10px;background-color:gray;border-radius:10px;padding: 5px 10px;font-size:14px;">{{ ucfirst($checkout->status) }}</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p style="margin-bottom: 0;">Dipesan tanggal : <span style="font-weight: bold">{{ $checkout->created_at->format('d/m/Y'). ' '. $checkout->created_at->format('H:i:s') }}</span></p>
													<p style="margin-bottom: 0;">Metode Pembayaran : <span style="font-weight: bold;">Bank BRI</span></p>
													<p style="margin-bottom: 20px;">Total Harga : <span style="font-weight: bold;">Rp {{ number_format($checkout->total_price_checkout, 0, ',', '.') }}</span></p>
													<div class="" style="margin-bottom: 10px">
														<a href="/checkout/{{ $checkout->id }}" style="background-color: #333;font-weight:bold;padding: 10px;border-radius:5px;color:white;"><i class="fa fa-eye"></i> Lihat Pesanan</a>
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
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<!-- /tab3  -->

								<!-- tab4  -->
								<div id="tab4" class="tab-pane fade in">
									<div class="row">
										<div style="font-size: 16px;list-style:circle !important;">
											@foreach($checkouts as $checkout)
											@if($checkout->status == 'done')
											<div class="product-cart">
												<div class="text-product" style="width: 100%">
													<h3 class="product-name" style="font-size: 20px !important;">Pesanan kamu #{{ $loop->iteration }} <span style="color:green;">(Sudah Bayar)</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p>Dipesan tanggal : {{ $checkout->created_at->format('d/m/Y'). ' '. $checkout->created_at->format('H:i:s') }}</p>
													<a href="/checkout/{{ $checkout->id }}" style="border: 2px solid #dd7082;padding:3px 5px;border-radius:5px;">Lihat Pesanan</a>
												</div>
											</div>
											{{-- <div class="product-cart">
												<img src="/images/{{ $order->product->thumb_img }}" width="100px" alt="">
												<div class="text-product">
													<a href="/product/{{ $order->product->slug }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
													<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
												</div>
											</div> --}}
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<!-- /tab4  -->
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