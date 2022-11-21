@extends('publik.layouts.main')

@section('section')
    
    <!-- SECTION -->
		<div class="section" id="section" style="margin-top: 30px">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" style="background-color: white; padding: 20px 0;">
					<!-- Service main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							{{-- Thumnail Image --}}
							<div class="product-preview">
								<img src="/images/{{ $service->thumb_img }}" alt="">
							</div>
							@foreach($imageServices as $image)
							<div class="product-preview">
								<img src="/images/{{ $image->name }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<!-- /Service main img -->

					<!-- Service thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							{{-- Thumnail Image --}}
							<div class="product-preview">
								<img src="/images/{{ $service->thumb_img }}" alt="">
							</div>
							@foreach($imageServices as $image)
							<div class="product-preview">
								<img src="/images/{{ $image->name }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<!-- /Service thumb imgs -->

					<!-- Service details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $service->name }}</h2>
							<div>
								<h3 class="product-price">Rp {{ number_format($service->price,0,',','.') }}++</h3>
							</div>
							<div class="text-truncate" style="text-align: left; margin-bottom:20px;">{!! $service->description !!}</div>

							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-whatsapp fa-lg"></i> Let's talk</button>
							</div>
							
							<ul class="product-links">
								<li style="font-weight: bold;">Category:</li>
								<li><a href="#">{{ $service->category }}</a></li>
							</ul>

							<ul class="product-links">
								<li style="font-weight: bold;">Penjual:</li>
								<li><a href="#">{{ $service->user->full_name }}</a></li>
							</ul>

							<ul class="product-links">
								<li style="font-weight: bold;">Nomor Seller:</li>
								<li><a href="#">{{ wordwrap($service->user->no_hp, 4, '-', true) }}</a></li>
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
										<div class="col-lg-8" style="font-size: 15px;">
											{!! $service->description !!}
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-8" style="font-size: 15px;">
											<p>{!! $service->detail !!}</p>
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
        <div class="container" style="border-top: 2px solid #8D99AE; background-color: white;">
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
									<img src="/images/{{ $food->thumb_img }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="{{ route('product.show', $food->slug) }}">{{ $food->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($food->price,0,',','.') }}</h4>
									<div class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">
										{!! $food->description !!}
									</div>
									
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
									<img src="/images/{{ $drink->thumb_img }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="{{ route('product.show', $drink->slug) }}">{{ $drink->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($drink->price,0,',','.') }}</h4>
									<div class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">
										{!! $drink->description !!}
									</div>
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
									<img src="/images/{{ $service->thumb_img }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($service->price,0,',','.') }}++</h4>
									<div class="text-truncate" style="text-align: left;-webkit-line-clamp:1;">
										{!! $service->description !!}
									</div>
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


	<script>
		// Sticky navbar
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var navbar = document.getElementById("navigation");
		var section = document.getElementById("section")

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