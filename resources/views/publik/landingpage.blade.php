@extends('publik.layouts.main')

@section('section')
	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3><img src="https://img.icons8.com/office/40/000000/kawaii-bread-1.png" loading="lazy"/></h3>
								</div>
							</li>
							<li>
								<div>
									<h3><img src="https://img.icons8.com/office/40/000000/kawaii-coffee.png"/></h3>
								</div>
							</li>
							<li>
								<div>
									<h3><img src="https://img.icons8.com/office/40/000000/technical-support--v2.png"/></h3>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase" style="color: white;">Selamat datang di Wikrama's shop</h2>
						<a class="primary-btn cta-btn" href="#new-product">Shop now</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->
	
    <!-- SECTION -->
		<div class="section" id="new-product">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"><i class="fa fa-circle" style="color: red"></i> New Products</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach($newest as $product)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/{{ $product->thumb_img }}" alt="" style="object-fit: cover;">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
												<div class="text-truncate">
													{!! $product->description !!}
												</div>
											</div>
											<div class="add-to-cart">
                                                <a href="/product/{{ $product->slug }}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                                </a>
											</div>
										</div>
										<!-- /product -->
                                        @endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
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

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row" style="display: flex;justify-content:center;flex-wrap: wrap;">

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="/assets/img/products(1).jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Products<br>Collection</h3>
                            <a href="/products" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="/assets/img/services.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Services<br>Collection</h3>
                            <a href="/services" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="/assets/img/services.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>About<br>Wikrama's Shop</h3>
                            <a href="/services" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Products</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										@foreach($products as $product)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/{{ $product->thumb_img }}" alt="" style="object-fit: cover;">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
												<div class="text-truncate">
													{!! $product->description !!}
												</div>
											</div>
											<div class="add-to-cart">
                                                <a href="/product/{{ $product->slug }}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                                </a>
											</div>
										</div>
										<!-- /product -->
                                        @endforeach
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

    <!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Services</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-6">
									@foreach($services as $service)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/{{ $service->thumb_img }}" alt="" style="object-fit: cover;">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $service->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($service->price,0,',','.') }}++</h4>
												<div class="text-truncate">
													{!! $service->description !!}
												</div>
											</div>
											<div class="add-to-cart">
                                                <a href="/service/{{ $service->slug }}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                                </a>
											</div>
										</div>
										<!-- /product -->
                                        @endforeach
								</div>
								<div id="slick-nav-6" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
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
		var section = document.getElementById("hot-deal")

		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;

		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
			section.classList.add("sticky-margin")
		} else {
			navbar.classList.remove("sticky");
			section.classList.remove("sticky-margin")
		}
		}
	</script>
@endsection