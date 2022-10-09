@extends('publik.layouts.main')

@section('section')
    
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="/assets/img/peakpx.jpg" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/products.png" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/bannerMakanan.jpg" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/bannerMinuman.jpg" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="/assets/img/peakpx.jpg" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/products.png" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/bannerMakanan.jpg" alt="">
							</div>

							<div class="product-preview">
								<img src="/assets/img/bannerMinuman.jpg" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $service->name }}</h2>
							<div>
								<h3 class="product-price">Rp {{ number_format($service->price,0,',','.') }}++</h3>
							</div>
							<p class="text-truncate" style="text-align: left">{{ $service->description }}</p>

							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-whatsapp fa-lg"></i> Let's talk</button>
							</div>
							
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">{{ $service->category }}</a></li>
							</ul>

							<ul class="product-links">
								<li>Penjual:</li>
								<li><a href="#">{{ $service->seller_name }}</a></li>
							</ul>

							<ul class="product-links">
								<li>Social Media Seller:</li>
								<li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
							</ul>

							<ul class="product-links">
								<li>Nomor Seller:</li>
								<li><a href="#">{{ $service->seller_num }}</a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $service->description }}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $service->detail }}</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container" style="border-top: 2px solid #8D99AE;">
            <!-- row -->
            <div class="row" style="margin-top: 50px">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Foods</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
							<!-- product widget -->
							@foreach($foods as $food)
                            <div class="product-widget" style="border-bottom: 1px solid #ccc">
                                <div class="product-img">
									<img src="/assets/img/products.png" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="/product/{{ $food->slug }}">{{ $food->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($food->price,0,',','.') }}</h4>
									<p class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">{{ $food->description }}</p>
                                </div>
                            </div>
							@endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Drinks</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
							<!-- product widget -->
							@foreach($drinks as $drink)
                            <div class="product-widget" style="border-bottom: 1px solid #ccc">
                                <div class="product-img">
									<img src="/assets/img/bannerMinuman.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="/product/{{ $drink->slug }}">{{ $drink->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($drink->price,0,',','.') }}</h4>
									<p class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">{{ $drink->description }}</p>
                                </div>
                            </div>
							@endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Services</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
							<!-- product widget -->
							@foreach($services as $service)
                            <div class="product-widget" style="border-bottom: 1px solid #ccc">
                                <div class="product-img">
									<img src="/assets/img/animeduduk.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="/service/{{ $service->slug }}">{{ $service->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($service->price,0,',','.') }}++</h4>
									<p class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">{{ $service->description }}</p>
                                </div>
                            </div>
							@endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection