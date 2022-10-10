<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Wikrama's Shop | {{ $title }}</title>

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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
                                        <input class="input" placeholder="Search here">
                                        <button class="search-btn" style="border-radius: 0 2px 2px 0;"><i class="fa fa-search"></i></button>
                                    </form>
                                </center>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-lg-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<div>
									@if(!auth()->check())
									<a href="#" data-toggle="modal" data-target="#largeModal">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">0</div>
									</a>
									@else
									<a href="/shopping-cart">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">0</div>
									</a>
									@endif
								</div>
								<!-- /Cart -->

                                {{-- Account --}}
                                <div class="dropdown">
									@if(!auth()->check())
									<a href="#" data-toggle="modal" data-target="#largeModal">
										<i class="fa fa-user-o"></i>
										<span>My Account</span>
									</a>
									@else
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
											<i class="fa fa-user-o"></i>
											<span>{{ strtoupper(auth()->user()->username) }}</span>
										</a>

										<div class="cart-dropdown">
											<div class="cart-list">
												<h5 style="margin-bottom: 0;"><a href="/edit/" style="font-weight: bold;"><i class="fa fa-user-o fa-lg" style="padding-right:10px;"></i> My Profile</a></h5>
											</div>
											<div class="cart-list">
												<h5 style="margin-bottom: 0;"><a href="/dashboard" style="font-weight: bold;"><i class="fa fa-server fa-lg" style="padding-right:10px;"></i> Admin Dashoard</a></h5>
											</div>
											<div class="cart-list">
												<h5 style="margin-bottom: 0;"><a href="/statuspesanan/" style="font-weight: bold;"><i class="fa fa-check-square fa-lg" style="padding-right:10px;"></i> Status Orders</a></h5>
											</div>
											<div class="cart-list">
												<h5 style="margin-bottom: 0;"><a href="/logout" style="font-weight: bold;"><i class="fa fa-sign-out fa-lg" style="padding-right:10px;"></i> Logout</a></h5>
											</div>
										</div>

									@endif
								</div>
                                {{-- /Account --}}

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
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
					<ul class="main-nav nav navbar-nav">
						<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/" style="font-weight: bold;">Home</a></li>
						<li class="{{ Request::is('products') ? 'active' : '' }}"><a href="/products" style="font-weight: bold;">Products</a></li>
						<li class="{{ Request::is('services') ? 'active' : '' }}"><a href="/services" style="font-weight: bold;">Services</a></li>
						@if(Request::is('service/*') || Request::is('product/*'))
						<li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
						<li><a href="#" style="font-weight: bold;">{{ strtoupper(str_replace('-',' ',basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) }}</a></li>
						@endif
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		{{-- LOGIN --}}
		
		<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="main">  	
						<button type="button" class="close tombol-close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
						<input type="checkbox" id="chk" aria-hidden="true">
				
							<div class="signup">
								<form class="login-form" action="/register" method="POST">
									@csrf
									<label for="chk" aria-hidden="true">Sign up</label>
									<input type="text" name="username" placeholder="Username" required="">
									<input type="email" name="email" placeholder="Email" required="">
									<input type="password" name="password" placeholder="Password" required="">
									<button type="submit">Sign up</button>
								</form>
							</div>
				
							<div class="login">
								<form class="login-form" action="/login" method="POST">
									@csrf
									<label for="chk" aria-hidden="true">Login</label>
									<input type="email" name="email" placeholder="Email" required="">
									<input type="password" name="password" placeholder="Password" required="">
									{{-- Remember me --}}
									<input type="hidden" name="remember" value="1" required>
									<button type="submit">Login</button>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
  
		{{-- /LOGIN --}}

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
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

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
									<li><a href="#">Wishlist</a></li>
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
	</body>
</html>
