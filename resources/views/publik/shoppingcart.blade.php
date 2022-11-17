@extends('publik.layouts.main')


@section('section')
    <!-- SECTION -->
		<div class="section" id="section" style="margin-top: 30px">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-7">
						{{-- Product --}}
						{{-- @foreach($products as $product)
						@for($i = 0; $i < count($product); $i++)
						<div class="product-cart">
							<img src="/images/{{ $product[$i]->thumb_img }}" width="100px" alt="">
							<div class="text-product">
								<h3 class="product-name">{{ $product[$i]->name }}</h3>
								<h4 class="product-price">Rp {{ number_format($product[$i]->price,0, ',', '.') }}</h4>
								<form action="">
									<div class="add-to-cart" style="display: flex; justify-content: space-between;">
										<div class="qty-label">
											<div class="input-number">
													Jumlah <input type="number" value="1" max="99" style="width: 100px !important;">
												<span class="qty-up">+</span>
												<span class="qty-down">-</span>
											</div>
										</div>
										<button type="submit" class="update-cart">Update</button>
									</div>
								</form>
							</div>
						</div>
						@endfor
						@endforeach --}}
						@if($orders->count() > 0)
						@foreach($orders as $order)
						<div class="product-cart">
							<div class="cancel-product">
								<form action="/cancel-order/{{ $order->id }}" method="POST">
									@csrf
									@method('DELETE')
									<input type="hidden" name="product_id" value="{{ $order->id }}">
									<button type="submit" class="cancel-product-btn"><i class="fa fa-times"></i> </button>
								</form>
							</div>
							<img src="/images/{{ $order->product->thumb_img }}" width="100px" alt="">
							<div class="text-product">
								<a href="/product/{{ $order->product->slug }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
								<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
								<form action="/order" method="POST">
									@csrf
									@method('PUT')
									<div class="add-to-cart" style="display: flex; justify-content: space-between;">
										<div class="qty-label">
											<div class="input-number">
												<input type="hidden" name="product_id" value="{{ $order->product->id }}">
													Jumlah <input type="number" name="quantity" value="{{ $order->quantity }}" min="1" max="{{ $order->product->stock }}" style="width: 100px !important;font-weight:bold;">
												<span class="qty-up">+</span>
												<span class="qty-down">-</span>
											</div>
										</div>
										<button type="submit" class="update-cart">Update</button>
									</div>
								</form>
							</div>
						</div>
						@endforeach
						@else
						<div class="product-cart">
							<h3 class="product-name" style="padding: 20px;">Keranjang Belanja Kosong</h3>
						</div>
						@endif
						{{-- /Product --}}
					</div>

					<!-- Order Details -->
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
						<div class="order-col">
							<div><strong>PAYMENT METHOD</strong></div>
						</div>
						<div class="payment-method">
							@foreach($methodPayments as $methodPayment)
							<div class="input-radio">
								<a href="">
									<i class="fa fa-info-circle"></i>
								</a>
								<input type="radio" name="payment" id="payment-{{ $methodPayment->id }}">
								<label for="payment-{{ $methodPayment->id }}">
									<span></span>
									{{ $methodPayment->name }}
								</label>
								{{-- <div class="caption">
									{!! $methodPayment->description !!}
								</div> --}}
							</div>
							@endforeach
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<form action="/checkout" method="POST">
							@csrf
							{{-- input orders --}}
							{{-- <input type="hidden" name="total_price" value="{{ $jml_order }}"> --}}
							{{-- /input orders --}}
							<center>
								<button type="submit" class="primary-btn order-submit">Checkout!</button>
							</center>
						</form>
					</div>
					<!-- /Order Details -->
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