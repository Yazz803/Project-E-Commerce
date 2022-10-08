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
									<h3><img src="https://img.icons8.com/office/40/000000/kawaii-bread-1.png"/></h3>
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
						<a class="primary-btn cta-btn" href="#">Shop now</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->
	
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
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
										@for($i = 1; $i <= 10; $i++)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/assets/img/products.png" alt="" style="object-fit: cover;">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $products[mt_rand(0, count($products)-1)] }}</a></h3>
												<h4 class="product-price">Rp. {{ number_format(mt_rand(2000,5000),0, ',', '.') }}</h4>
												<p class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quae ratione omnis saepe similique, molestiae perferendis enim numquam nobis alias dignissimos beatae eaque deleniti rem ad fugit unde totam quo.</p>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
											</div>
										</div>
										<!-- /product -->
										@endfor
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
                            <a href="#" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
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
							<h3 class="title">Products</h3>
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
										@for($i = 1; $i <= 10; $i++)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/assets/img/products.png" alt="" style="object-fit: cover;">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $products[mt_rand(0, count($products)-1)] }}</a></h3>
												<h4 class="product-price">Rp. {{ number_format(mt_rand(2000,5000),0, ',', '.') }}</h4>
												<p class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quae ratione omnis saepe similique, molestiae perferendis enim numquam nobis alias dignissimos beatae eaque deleniti rem ad fugit unde totam quo.</p>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
											</div>
										</div>
										<!-- /product -->
										@endfor
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
						<h3 class="title">Services</h3>
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
									@for($i = 1; $i <= 10; $i++)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/assets/img/website.jpg" alt="" style="object-fit: cover;">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $services[mt_rand(0, count($products)-1)] }}</a></h3>
												<p class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quae ratione omnis saepe similique, molestiae perferendis enim numquam nobis alias dignissimos beatae eaque deleniti rem ad fugit unde totam quo.</p>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
											</div>
										</div>
										<!-- /product -->
										@endfor
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
@endsection