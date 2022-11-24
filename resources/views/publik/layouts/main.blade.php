<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Wikrama's Shop | {{ $title }}</title>

		{{-- Icon --}}
		<link rel="icon" href="/assets/img/logo-wk.png">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/assets/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/assets/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/assets/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css"/>
		<link rel="stylesheet" href="/assets/css/login.css">

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style>
			body{
				font-weight: 500;
			}
			body::before {
				content: '';
				background-image: linear-gradient(
					rgba(255, 255, 255, 0.9),
					rgba(255, 255, 255, 0.9)
				),
				url(/assets/img/bg.jpg) ;
				background-repeat: no-repeat;
				background-size: cover;
				height: 100%;
				width: 100%;
				background-position: center;
				position: fixed;
				top: 0;
				left: 0;
				bottom: 0;
				z-index: -1;
			}

			/* HOT DEAL */
			
			#hot-deal.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url('/assets//img/GedungWikrama.jpg');
			background-position: center;
			background-repeat: no-repeat;
			}

			#hot-deal4.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url('/assets/img/pplg.jpg');
			background-position: center;
			background-repeat: no-repeat;
			}

			#hot-deal5.section {
			padding: 60px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url('/assets/img/animeduduk.jpg');
			background-position: center;
			background-repeat: no-repeat;
			}

		</style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				{{-- LOGO --}}
				{{-- /LOGO --}}
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3" style="margin-top: 20px">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="/assets/img/logo-wk.png" alt="" class="logo-wk">
									<h2 style="color: #DDD">Wikrama's Shop</h2>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
                                <center>
                                    <form>
                                        <input type="text" class="input" placeholder="Search here" name="search" id="search" autocomplete="off">
                                        <button class="search-btn" style="border-radius: 0 2px 2px 0;"><i class="fa fa-search"></i></button>
                                    </form>
                                </center>
							</div>
						</div>
						<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
						</script>
						<script type="text/javascript">
							var route = "{{ url('autocomplete-search') }}";
							$('#search').typeahead({
								source: function (query, process) {
									return $.get(route, {
										query: query
									}, function (data) {
										return process(data);
									});
								}
							});
						</script>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-lg-3 clearfix">
							<div class="header-ctn">
								{{-- <!-- Notification -->
								<div>
									@if(!auth()->check())
									<a href="#" onclick="return loginDulu()" data-toggle="modal" data-target="#largeModal">
										<i class="fa fa-bell"></i>
									</a>
									@else
									<a href="/notification">
										<i class="fa fa-bell"></i>
										@php
											auth()->check() == true ? $ttl_orders = \App\Models\Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
										@endphp
										@if($ttl_orders > 0)
										<div class="qty">{{ $ttl_orders }}</div>
										@endif
									</a>
									@endif
								</div>
								<!-- /Notification --> --}}

								<!-- Cart -->
								<div>
									@if(!auth()->check())
									<a href="#" onclick="return loginDulu()" data-toggle="modal" data-target="#largeModal">
										<i class="fa fa-shopping-cart"></i>
									</a>
									@else
									<a href="/shopping-cart">
										<i class="fa fa-shopping-cart"></i>
										@php
											auth()->check() == true ? $ttl_orders = \App\Models\Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
										@endphp
										@if($ttl_orders > 0)
										<div class="qty">{{ $ttl_orders }}</div>
										@endif
									</a>
									@endif
								</div>
								<!-- /Cart -->

                                {{-- Checkout --}}
                                <div class="dropdown">
									<a @if(!auth()->user()) href="#" onclick="return loginDulu()" @else href="/checkout" @endif>
										<i class="fa fa-file-text"></i>
									</a>
								</div>
                                {{-- /checkot --}}

                                {{-- Account --}}
                                <div class="dropdown">
									@if(!auth()->check())
									<a href="/login">
										<i class="fa fa-user-circle"></i>
									</a>
									@else

									@endif
								</div>
                                {{-- /Account --}}

								@if(auth()->check())
                                {{-- List --}}
                                <div class="dropdown">
									<a href="{{ route('menu.utama') }}">
										<i class="fa fa-list"></i>
									</a>
								</div>
                                {{-- /List --}}
								@endif

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="{{ route('profile.index') }}">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav" style="align-items: center">
						@if(Request::is('checkout/*') || Request::is('product/*') || Request::is('service/*') || Request::is('shopping-cart'))
						{{-- <li class="back">
							<a href="@if(Request::is('checkout/*')) /checkout @endif @if(Request::is('product/*')) /products @endif @if(Request::is('service/*')) /services @endif @if(Request::is('shopping-cart')) {{ url()->previous() }} @endif" style="background-color:red;color:white;padding:10px;border-radius:10px;font-weight:bold;"><i class="fa fa-arrow-left"></i> Back</a>
						</li> --}}
						@endif
						<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('pages.index') }}" style="font-weight: bold;"><i class="fa fa-home"></i> Home</a></li>
						<li class="{{ Request::is('products') ? 'active' : '' }}"><a href="{{ route('pages.products') }}" style="font-weight: bold;"><i class="fa fa-shopping-bag"></i> Products</a></li>
						<li class="{{ Request::is('services') ? 'active' : '' }}"><a href="{{ route('pages.services') }}" style="font-weight: bold;"><i class="fa fa-group"></i> Services</a></li>
						<li class="{{ Request::is('categories') ? 'active' : '' }}"><a href="{{ route('pages.categories') }}" style="font-weight: bold;"><i class="fa fa-group"></i> Categories</a></li>
						{{-- @if(Request::is('service/*') || Request::is('product/*'))
						<li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
						<li><a href="#" style="font-weight: bold;">{{ strtoupper(str_replace('-',' ',basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) }}</a></li>
						@endif --}}
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        {{-- SECTION --}}
        @yield('section')
        {{-- /SECTION --}}

        
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Wikrama' Shop menyediakan product dan jasa untuk masyarakat sekitar</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						{{-- <div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Foods</a></li>
									<li><a href="#">Drinks</a></li>
									<li><a href="#">Services</a></li>
								</ul>
							</div>
						</div> --}}

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://instagram.com/yazz_803" target="_blank">M. Yazid Akbar</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		{{-- Sweet Alert --}}
		@include('sweetalert::alert')

		<!-- jQuery Plugins -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/slick.min.js"></script>
		<script src="/assets/js/nouislider.min.js"></script>
		<script src="/assets/js/jquery.zoom.min.js"></script>
		<script src="/assets/js/main.js"></script>
		<script src="/assets/js/login.js"></script>
		<script>
			function loginDulu(){
				Swal.fire({
					title: 'Kamu Harus Login Dulu',
					backgroundOpacity: .5,
					position: 'left-start',
					// width: 300,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Login',
					cancelButtonText: 'Tidak'
					}).then((result) => {
					if (result.isConfirmed) {
						window.location.href= '{{ route("login.index") }}'
					}
				})
			}
		</script>
	</body>
</html>
