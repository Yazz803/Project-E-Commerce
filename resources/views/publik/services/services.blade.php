@extends('publik.layouts.main')

@section('section')

	<style>
		@foreach($category_services as $category)
			#{{ str_replace('-', '', $category->slug) }}.section {
			padding: 120px 0px;
			margin: 30px 0px;
			background-color: #E4E7ED;
			background-image: 
			linear-gradient(
				rgba(44, 44, 44, 0.322),
				rgba(51, 51, 51, 0.349)
			)
			,url('/images/{{ $category->thumb_img }}');
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			}
			@endforeach
	</style>

    @foreach($category_services as $category)
	<!-- HOT DEAL SECTION -->
	<div id="{{ str_replace('-', '', $category->slug) }}" class="section" style="margin: 30px 0 0 0">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<h2 class="text-uppercase" style="color: white;">{{ $category->slogan }}</h2>
						<a class="primary-btn cta-btn" href="{{ route('pages.category.service', $category->slug) }}">More products</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->
	
    <!-- SECTION -->
		<div class="section" id="new-product" style="padding-top: 0 !important;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> {{ $category->name }}</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab{{ $category->id }}" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-{{ $category->id }}">
										@foreach($category->services->shuffle() as $service)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/{{ $service->thumb_img }}" alt="" style="object-fit: cover;">
											</div>
											<div class="product-body">
												<h3 class="product-name text-truncate"><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
												<h4 class="product-price">Rp {{ number_format($service->price,0,',','.') }}</h4>
												<a href="{{ route('pages.category.service', $service->categoryService->slug) }}" class="font-weight-bold" style="font-size: 12px;">{{ strtoupper($service->categoryService->name) }}</a>
												<div class="text-truncate text-description-card">
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
									<div id="slick-nav-{{ $category->id }}" class="products-slick-nav"></div>
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
    @endforeach
    
    @foreach($category_services as $category)
	<script>
        // Sticky navbar
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};
        
		// Get the navbar
		var navbar = document.getElementById("navigation");
		var {{ str_replace('-', '', $category->slug) }} = document.getElementById("{{ str_replace('-', '', $category->slug) }}");

		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;

		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
			{{ str_replace('-', '', $category->slug) }}.classList.add("sticky-margin-product")
		} else {
			navbar.classList.remove("sticky");
			{{ str_replace('-', '', $category->slug) }}.classList.remove("sticky-margin-product")
		}
		}
        </script>
        @php
            break;
        @endphp
    @endforeach
@endsection