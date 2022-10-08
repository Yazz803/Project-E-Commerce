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
                            @for($k=1;$k<=8;$k++)
                            <div class="card">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/assets/img/3.jpg" alt="" style="object-fit: cover;">
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
                            </div>
                            @endfor
                        </div>
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
                        @for($k=1;$k<=8;$k++)
                        <div class="card">
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
                        </div>
                        @endfor
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    
{{-- 
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Foods</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        @for($i=1;$i<=9/3;$i++)
                        <div>
                            @for($j=1;$j<=3;$j++)
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="/assets/img/products.png" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="#">{{ $products[mt_rand(0, count($products)-1)] }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format(mt_rand(2000,10000),0,',','.') }}</h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                            @endfor
                        </div>
                        @endfor
                    </div>
                </div>
                
                
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Drinks</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        @for($i=1;$i<=9/3;$i++)
                        <div>
                            @for($j=1;$j<=3;$j++)
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="/assets/img/products.png" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="#">{{ $products[mt_rand(0, count($products)-1)] }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format(mt_rand(2000,10000),0,',','.') }}</h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                            @endfor
                        </div>
                        @endfor
                    </div>
                </div>
                
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Services</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        @for($i=1;$i<=9/3;$i++)
                        <div>
                            @for($j=1;$j<=3;$j++)
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="/assets/img/products.png" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="#">{{ $products[mt_rand(0, count($products)-1)] }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format(mt_rand(2000,10000),0,',','.') }}</h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                            @endfor
                        </div>
                        @endfor
                    </div>
                </div>
                
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION --> --}}

@endsection