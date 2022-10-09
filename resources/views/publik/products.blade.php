@extends('publik.layouts.main')

@section('section')

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal2" class="section">
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
						</ul>
						<h2 class="text-uppercase" style="color: white;">Nikmati Sesukamu!</h2>
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
                                        @foreach($products2 as $product)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/assets/img/products.png" alt="" style="object-fit: cover;">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
												<p class="text-truncate">{{ $product->description }}</p>
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
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Foods</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
                        <div class="cards">
                            @foreach($foods as $food)
                            <div class="card">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/assets/img/makanan.jpg" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{ $food->name }}</a></h3>
                                        <h4 class="product-price">Rp. {{ number_format($food->price,0,',','.') }}</h4>
                                        <p class="text-truncate">{{ $food->description }}</p>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="/product/{{ $food->slug }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
						{{ $foods->links() }}
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        
	<!-- HOT DEAL SECTION -->
	<div id="hot-deal3" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3><img src="https://img.icons8.com/office/40/000000/kawaii-coffee.png"/></h3>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase" style="color: white;">Teguk yang bagus untuk saat-saat yang menyenangkan</h2>
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
                        <h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Drinks</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="cards">
                        @foreach($drinks as $drink)
                            <div class="card">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/assets/img/bannerMinuman.jpg" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{ $drink->name }}</a></h3>
                                        <h4 class="product-price">Rp. {{ number_format($drink->price,0,',','.') }}</h4>
                                        <p class="text-truncate">{{ $drink->description }}</p>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="/product/{{ $drink->slug }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
						@endforeach
                    </div>
					{{ $drinks->links() }}
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection