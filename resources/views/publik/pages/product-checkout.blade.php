@extends('publik.layouts.main')


@section('section')

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

	.select-method-payment {
		width: 100%;
		padding: 5px 0;
	}
</style>
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
							<img src="{{ asset('/images/'. $order->product->thumb_img) }}" width="100px" alt="">
							<div class="text-product">
								<a href="{{ route('product.show', $order->product->slug) }}"><h3 class="product-name" style="font-size: 20px !important;">{{ strtoupper($order->product->name). ' (' . $order->quantity . 'x)' }}</h3></a>
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

						<div class="payment-method">
							<div class="payment">
								<li>
									<label for="payment-{{ $checkout->id }}" style="font-weight: bold;">
										{{ $checkout->payment }}
									</label>
								</li>
							</div>
							<div class="detail-payment">
								<div id="myBtn{{ $checkout->id }}" style="cursor: pointer;">
									<i class="fa fa-info-circle fa-lg"></i>
								</div>
							</div>

							<!-- The Modal -->
							<div id="myModal{{ $checkout->id }}" class="modal">
								<!-- Modal content -->
								<div class="modal-content">
									<div class="modal-header">
										<h2>Step By Step Pembayaran {{ $checkout->payment }}</h2>
									</div>
									<div class="modal-body">
										{!! $methodPayment->description !!}
									</div>
									<div class="modal-footer">
										<button type="button" id="close{{ $checkout->id }}">Close</button>
									</div>
								</div>
							</div>

							<script>
								// Get the modal
								var modal{{ $checkout->id }} = document.getElementById("myModal{{ $checkout->id }}");
								
								// Get the button that opens the modal
								var btn{{ $checkout->id }} = document.getElementById("myBtn{{ $checkout->id }}");
								
								// Get the <span> element that closes the modal
								var span{{ $checkout->id }} = document.getElementById("close{{ $checkout->id }}");
								
								// When the user clicks the button, open the modal 
								btn{{ $checkout->id }}.onclick = function() {
								  modal{{ $checkout->id }}.style.display = "block";
								}
								
								// When the user clicks on <span> (x), close the modal
								span{{ $checkout->id }}.onclick = function() {
								  modal{{ $checkout->id }}.style.display = "none";
								}
								
								// When the user clicks anywhere outside of the modal, close it
								window.onclick = function(event) {
								  if (event.target == modal{{ $checkout->id }}) {
									modal{{ $checkout->id }}.style.display = "none";
								  }
								}
							</script>
						</div>
                        <center>
                            <a href="https://wa.me/62{{ ltrim($nomor_admin->no_hp, $nomor_admin->no_hp[0]) }}" class="primary-btn order-submit" target="_blank">Chat Seller</a>
                        </center>
					</div>
					<!-- /Order Details -->
                    @else
				</div>
				<!-- /row -->
                <div class="product-cart" style="display: block;text-align:center;padding-top:10px;">
                    <img src="{{ asset('/assets/img/anime-sorry2-unscreen.gif') }}" alt="Gambar anime" width="200px">
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