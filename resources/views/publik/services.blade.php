@extends('publik.layouts.main')

@section('section')
    
	<!-- HOT DEAL SECTION -->
	<div id="hot-deal4" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3><img src="data:image/png;base64,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"></h3>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase" style="color: white;">Wajib ngulik!</h2>
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
							<h3 class="title"><i class="fa fa-circle" style="color: red"></i> New Services</h3>
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
                                        @foreach($services as $service)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/{{ $service->thumb_img }}" alt="" style="object-fit: cover;">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($service->price,0,',','.') }}++</h4>
												<div class="text-truncate">
													{!! $service->description !!}
												</div>
											</div>
											<div class="add-to-cart">
                                                <a href="{{ route('service.show', $service->slug) }}">
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
							<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Programming & Technology</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
                        <div class="cards">
                            @foreach($progtechs as $progtech)
                            <div class="card">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/images/{{ $progtech->thumb_img }}" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="{{ route('service.show', $progtech->slug) }}">{{ $progtech->name }}</a></h3>
                                        <h4 class="product-price">Rp. {{ number_format($progtech->price,0,',','.') }}</h4>
										<div class="text-truncate">
											{!! $service->description !!}
										</div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('service.show', $progtech->slug) }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
						{{ $progtechs->links() }}
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        
	<!-- HOT DEAL SECTION -->
	<div id="hot-deal5" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3><img src="https://img.icons8.com/office/60/000000/windows10-personalization.png"/></h3>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase" style="color: white;">Design grafis! bukan design gratis!</h2>
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
                        <h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Design Grafis</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="cards">
                        @foreach($designs as $design)
                            <div class="card">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/images/{{ $design->thumb_img }}" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="{{ route('service.show', $design->slug) }}">{{ $design->name }}</a></h3>
                                        <h4 class="product-price">Rp. {{ number_format($design->price,0,',','.') }}</h4>
										<div class="text-truncate">
											{!! $design->description !!}
										</div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('service.show', $design->slug) }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
						@endforeach
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
		var section = document.getElementById("hot-deal4")

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