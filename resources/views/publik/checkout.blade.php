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
													$background = 'rgb(0, 66, 128)';
												}elseif($checkout->status == 'process'){
													$status = 'Pesanan Diproses';
													$background = '#36b9cc';
												}elseif($checkout->status == 'done'){
													$status = 'Pesanan Selesai';
													$background = 'green';
												}

											@endphp
											<div class="product-cart" style="width: 50%;margin-top: 10px;">
												<div class="text-product" style="width: 100%; position: relative;">
													<h3 class="product-name" style="margin-bottom: 20px;font-size: 20px !important;"><i class="fa fa-shopping-bag"></i> Pesanan kamu #{{ $loop->iteration }} <span style="color: white;position: absolute;right:-15px;top: -20px;background-color: {{ $background }};border-radius:10px;padding: 5px 10px;font-size:14px;">{{ $status }}</span></h3>
													{{-- <p>{{ $order->created_at->hour. ':' . $order->created_at->minute . ':' . $order->created_at->second }}</p> --}}
													<p style="margin-bottom: 0;">Dipesan tanggal : <span style="font-weight: bold">{{ \Carbon\Carbon::parse($checkout->created_at)->format('j F Y |'). ' '. $checkout->created_at->format('H:i') }}</span></p>
													@if($checkout->status == 'success' || $checkout->status == 'process')
													<p style="margin-bottom: 0;">Dikonfirmasi tgl : <span style="font-weight: bold;color:green;">{{ \Carbon\Carbon::parse($checkout->tgl_konfirmasi)->format('j F Y | H:i') }}</span></p>
													@endif
													@if($checkout->status == 'process')
													<p style="margin-bottom: 0;">Estimasi Tiba : <span style="font-weight: bold;color:#01869b;">{{ \Carbon\Carbon::parse($checkout->estimasi_tiba)->format("j F Y") }}</span></p>
													@endif
													@if($checkout->status == 'done')
													<p style="margin-bottom: 0;">Dikonfirmasi tgl : <span style="font-weight: bold;color:rgb(0, 66, 128);">{{ \Carbon\Carbon::parse($checkout->tgl_konfirmasi)->format('j F Y | H:i') }}</span></p>
													<p style="margin-bottom: 0;">Estimasi Tiba : <span style="font-weight: bold;color:#01869b;">{{ \Carbon\Carbon::parse($checkout->estimasi_tiba)->format("j F Y") }}</span></p>
													<p style="margin-bottom: 0;">Pesanan Tiba di Costumer : <span style="font-weight: bold;color:green;">{{ \Carbon\Carbon::parse($checkout->pesanan_sampai)->format("j F Y | H:i") }}</span></p>
													@endif
													<p style="margin-bottom: 0;">Id Pemesanan : <span style="font-weight: bold">{{ $checkout->id_pemesanan }}</span></p>
													<p style="margin-bottom: 0;">Metode Pembayaran : <span style="font-weight: bold;">{{ $checkout->payment }}</span></p>
													<p style="margin-bottom: 20px;">Total Harga : <span style="font-weight: bold;">Rp {{ number_format($checkout->total_price_checkout, 0, ',', '.') }}</span></p>
													<div class="btn-checkout-lihat-pesanan" style="margin-bottom: 10px">
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

	<!-- SECTION -->
    <div class="section" id="new-product" style="padding-top: 0 !important;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Rekomendasi Buat Kamu</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            @php
                                $acak1 = uniqId();
                            @endphp
                            <!-- tab -->
                            <div id="tab{{ $acak1 }}" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-{{ $acak1 }}">
                                    <!-- product -->
                                    @foreach($products as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/images/{{ $product->thumb_img }}" alt="" style="object-fit: cover;">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name text-truncate"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
                                            <a href="{{ route('pages.category.product', $product->categoryProduct->slug) }}" class="font-weight-bold" style="font-size: 12px;">{{ strtoupper($product->categoryProduct->name) }}</a>
                                            <div class="text-truncate text-description-card">
                                                {!! $product->description !!}
                                            </div>
                                            <p style="margin-bottom: 20px;font-size:12px;color: red;" class="font-weight-bold">Sisa Stock : {{ $product->stock }} @if($product->stock > 1) pcs @else pc @endif</p>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('product.show', $product->slug) }}">
                                                <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-{{ $acak1 }}" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->

                <!-- Products tab & slick -->
                <div class="col-md-12" style="margin-top: 70px;">
                    <div class="row">
                        <div class="products-tabs">
                            @php
                                $acak2 = uniqId();
                            @endphp
                            <!-- tab -->
                            <div id="tab{{ $acak2 }}" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-{{ $acak2 }}">
                                    <!-- product -->
                                    @foreach($services as $service)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/images/{{ $service->thumb_img }}" alt="" style="object-fit: cover;">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name text-truncate"><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
                                            <h4 class="product-price">Rp {{ number_format($service->price,0,',','.') }}</h4>
                                            <a href="{{ route('pages.category.service', $service->categoryService->slug) }}" class="font-weight-bold" style="font-size: 12px;">{{ strtoupper($service->categoryService->name) }}</a>
                                            <div class="text-truncate text-description-card">
                                                {!! $service->description !!}
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('service.show', $service->slug) }}">
                                                <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-{{ $acak2 }}" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
<!-- /SECTION -->

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