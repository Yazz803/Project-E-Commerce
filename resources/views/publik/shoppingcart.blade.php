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
						<div class="product-cart">
							<img src="/assets/img/animeduduk.jpg" width="100px" alt="">
							<div class="text-product">
								<h3 class="product-name">Es jeruk 2x</h3>
								<h4 class="product-price">Rp 5.000 &rarr; Rp 10.000</h4>
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
								<div class="order-col">
									<div>1x Product Name Goes Here</div>
									<div>$980.00</div>
								</div>
								<div class="order-col">
									<div>2x Product Name Goes Here</div>
									<div>$980.00</div>
								</div>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$2940.00</strong></div>
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