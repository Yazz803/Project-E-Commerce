@extends('publik.layouts.main')


@section('section')
    <!-- SECTION -->
    <div class="section" id="section" style="margin-top: 30px; padding-top:0;padding-bottom:0;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
					<div class="col-md-7">
						@if($orders->count() > 0)
						@foreach($orders as $order)
						<div class="product-cart">
							<img src="/images/{{ $order->product->thumb_img }}" width="100px" alt="">
							<div class="text-product">
								<a href="/product/{{ $order->product->slug }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
								<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
								<div class="text-truncate" style="text-align: left" >
                                    {!! $order->product->description !!}
                                </div>
							</div>
						</div>
						@endforeach
						@endif
						{{-- /Product --}}
					</div>

					<!-- Order Details -->
                        @if($orders->count() > 0)
                        <div class="col-md-5 order-details" style="background-color:white;">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php $jml_order = 0;?>
								@foreach($orders as $order)
								<div class="order-col">
									<div>
										<a href="/product/{{ $order->product->slug }}">
											{{ $order->quantity . 'x ' . $order->product->name }}
										</a>
									</div>
									<div>{{ 'Rp '. number_format($order->product->price * $order->quantity, 0, ',', '.') }}</div>
									<?php
										$jml_order += $order->product->price * $order->quantity;
									?>
								</div>
								@endforeach
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">{{ 'Rp '. number_format($jml_order, 0, ',', '.') }}</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" checked="checked" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
                        <center>
                            <button type="submit" class="primary-btn order-submit">Chat Seller</button>
                        </center>
					</div>
					<!-- /Order Details -->
                    @else
				</div>
				<!-- /row -->
                <div class="product-cart" style="display: block;text-align:center;padding-top:10px;">
                    <img src="/assets/img/anime-sorry2-unscreen.gif" alt="Gambar anime" width="200px">
                    <h1>Tidak ada Pesanan</h1>
                </div>
                @endif
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
            var section = document.getElementById("section")
    
            // Get the offset position of the navbar
            var sticky = navbar.offsetTop;
    
            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
                section.classList.add("sticky-margin-items")
            } else {
                navbar.classList.remove("sticky");
                section.classList.remove("sticky-margin-items")
            }
            }
        </script>
@endsection