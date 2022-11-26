@extends('publik.layouts.main')

@section('section')
    <!-- HOT DEAL SECTION -->
    <style>
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
    </style>
	<div id="{{ str_replace('-', '', $category->slug) }}" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
						<h2 class="text-uppercase" style="color: white;">{{ $category->slogan }}</h2>
						<a class="primary-btn cta-btn" href="#lists">beli sekarang</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->
	

    <!-- SECTION -->
    <div class="section" style="padding-top: 0;" id="lists">
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
                    <div class="cards">
                        @foreach($category->products as $product)
                            <div class="card">
                                <div class="product category">
                                    <div class="product-img">
                                        <img src="/images/{{ $product->thumb_img }}" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">Rp. {{ number_format($product->price,0,',','.') }}</h4>
                                        <div class="text-truncate" style="margin-bottom: 20px;">
											{!! $product->description !!}
										</div>
                                        <a href="{{ route('product.show', $product->slug) }}" class="btn-detail font-weight-bold"> Detail</a>
                                    </div>
                                    <div class="add-to-cart category">
                                        <a href="{{ route('product.show', $product->slug) }}">
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

    <!-- SECTION -->
    <div class="section" id="new-product" style="padding-top: 0 !important;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Rekomendasi Buat Kamu</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            @php
                                $acak1 = uniqId();
                            @endphp
                            <!-- tab -->
                            <div id="tab{{ $acak1 }}" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-{{ $acak1 }}">
                                    <!-- product -->
                                    @foreach($products as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/images/{{ $product->thumb_img }}" alt="" style="object-fit: cover;">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
                                            <div class="text-truncate">
                                                {!! $product->description !!}
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('product.show', $product->slug) }}">
                                                <button class="add-to-cart-btn"><i class="fa fa-info-circle fa-lg"></i>Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-{{ $acak1 }}" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->

                <!-- Products tab & slick -->
                <div class="col-md-12" style="margin-top: 70px;">
                    <div class="row">
                        <div class="products-tabs">
                            @php
                                $acak2 = uniqId();
                            @endphp
                            <!-- tab -->
                            <div id="tab{{ $acak2 }}" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-{{ $acak2 }}">
                                    <!-- product -->
                                    @foreach($services as $service)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/images/{{ $service->thumb_img }}" alt="" style="object-fit: cover;">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
                                            <h4 class="product-price">Rp {{ number_format($service->price,0,',','.') }}</h4>
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
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-{{ $acak2 }}" class="products-slick-nav"></div>
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

	<script>
		// Sticky navbar
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var navbar = document.getElementById("navigation");
		var section = document.getElementById("{{ str_replace('-', '', $category->slug) }}")

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