@extends('publik.layouts.main')


@section('section')
    <!-- SECTION -->
	<style>
		/* The Modal (background) */
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		padding-top: 5%;
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		z-index: 1010101010;
		}

		@media (max-width: 764px) {
			.modal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 95% !important;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
			}
		}
		/* Modal Content */
		.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: auto;
		padding: 0;
		border: 1px solid #888;
		width: 50%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		-webkit-animation-name: animatetop;
		-webkit-animation-duration: 0.4s;
		animation-name: animatetop;
		animation-duration: 0.4s
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
		from {top:-300px; opacity:0} 
		to {top:0; opacity:1}
		}

		@keyframes animatetop {
		from {top:-300px; opacity:0}
		to {top:0; opacity:1}
		}

		/* The Close Button */
		.close {
		color: white;
		float: right;
		font-size: 28px;
		font-weight: bold;
		}

		.close:hover,
		.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
		}

		.modal-header {
		padding: 2px 16px;
		background-color: #06283D;
		color: white;
		}

		.modal-header h2 {
			color: white !important;
			font-size: 20px !important;
			padding-top: 10px;
		}

		.modal-body {padding: 2px 16px;}

		.modal-footer {
		padding: 2px 16px;
		color: white;
		}

		.modal-footer button {
			background-color: red;
			color: white;
			border: none;
			padding: 5px 10px;
			font-weight: bold;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>

		<div class="section" id="section" style="margin-top: 30px">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-7">
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
								<a href="{{ route('product.show', $order->product->slug) }}"><h3 class="product-name" style="font-size: 14px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
								<h4 class="product-price">Rp {{ number_format($order->product->price,0, ',', '.') }} <span style="color: #D10024;font-size:12px;">(STOCK: {{ $order->product->stock }})</span> </h4>
								<form action="/order" method="POST">
									@csrf
									@method('PUT')
									<div class="add-to-cart" style="display: flex; justify-content: space-between;">
										<div class="qty-label">
											<div class="input-number">
												<input type="hidden" name="product_id" value="{{ $order->product->id }}">
													Jumlah <input type="number" name="quantity" value="{{ $order->quantity }}" min="1" max="{{ $order->product->stock }}" style="width: 70px !important;font-weight:bold;">
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
										<a href="{{ route('product.show', $order->product->slug) }}">
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
						@foreach($methodPayments as $methodPayment)
						<div class="payment-method">
							<div class="payment">
								<div class="input-radio">
									<a href="">
										<i class="fa fa-info-circle"></i>
									</a>
									<input type="radio" name="payment" id="payment-{{ $methodPayment->id }}">
									<label for="payment-{{ $methodPayment->id }}">
										<span></span>
										{{ $methodPayment->name }}
									</label>
								</div>
							</div>
							<div class="detail-payment">
								<div id="myBtn{{ $methodPayment->id }}" style="cursor: pointer;">
									<i class="fa fa-info-circle fa-lg"></i>
								</div>
							</div>

							<!-- The Modal -->
							<div id="myModal{{ $methodPayment->id }}" class="modal">
								<!-- Modal content -->
								<div class="modal-content">
									<div class="modal-header">
										<h2>Step By Step Pembayaran {{ $methodPayment->name }}</h2>
									</div>
									<div class="modal-body">
										{!! $methodPayment->description !!}
									</div>
									<div class="modal-footer">
										<button id="close{{ $methodPayment->id }}">Close</button>
									</div>
								</div>
							</div>

							<script>
								// Get the modal
								var modal{{ $methodPayment->id }} = document.getElementById("myModal{{ $methodPayment->id }}");
								
								// Get the button that opens the modal
								var btn{{ $methodPayment->id }} = document.getElementById("myBtn{{ $methodPayment->id }}");
								
								// Get the <span> element that closes the modal
								var span{{ $methodPayment->id }} = document.getElementById("close{{ $methodPayment->id }}");
								
								// When the user clicks the button, open the modal 
								btn{{ $methodPayment->id }}.onclick = function() {
								  modal{{ $methodPayment->id }}.style.display = "block";
								}
								
								// When the user clicks on <span> (x), close the modal
								span{{ $methodPayment->id }}.onclick = function() {
								  modal{{ $methodPayment->id }}.style.display = "none";
								}
								
								// When the user clicks anywhere outside of the modal, close it
								window.onclick = function(event) {
								  if (event.target == modal{{ $methodPayment->id }}) {
									modal{{ $methodPayment->id }}.style.display = "none";
								  }
								}
							</script>
						</div>
						@endforeach
						{{-- <div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div> --}}
						<form action="{{ route('checkout.store') }}" method="POST">
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