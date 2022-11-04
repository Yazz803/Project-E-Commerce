@extends('publik.layouts.main')


@section('section')
    <!-- SECTION -->
		<div class="section">
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
								<h3 class="product-name">{{ $order->product->name }}</h3>
								<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }}</h4>
								<form action="/order" method="POST">
									@csrf
									@method('PUT')
									<div class="add-to-cart" style="display: flex; justify-content: space-between;">
										<div class="qty-label">
											<div class="input-number">
												<input type="hidden" name="product_id" value="{{ $order->product->id }}">
													Jumlah <input type="number" name="quantity" value="1" max="99" style="width: 100px !important;">
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
									<div>{{ $order->quantity . 'x ' . $order->product->name }}</div>
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
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit">Place order</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection