@extends('publik.layouts.main')

@section('section')
    <!-- SECTION -->
		<div class="section" id="section" style="margin-top: 30px">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" style="background-color:white;padding-top:20px;">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							{{-- Thumnail Image --}}
							<div class="product-preview">
								<img src="/images/{{ $product->thumb_img }}" alt="">
							</div>
							@foreach($images as $image)
							<div class="product-preview">
								<img src="/images/{{ $image->name }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							{{-- Thumnail Image --}}
							<div class="product-preview">
								<img src="/images/{{ $product->thumb_img }}" alt="">
							</div>
							@foreach($images as $image)
							<div class="product-preview">
								<img src="/images/{{ $image->name }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $product->name }}</h2>
							<div id="here">
								<h3 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h3>
								<span class="product-available">Stock : {{ $product->stock }}</span>
							</div>
							<div class="text-truncate" style="text-align: left; margin-bottom:20px;">{!! $product->description !!}</div>

							{{-- <form action="/order" method="POST">
								@csrf
								<div class="add-to-cart">
									<div class="qty-label">
										Qty
										<div class="input-number">
												<input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
												<input type="hidden" name="product_id" value="{{ $product->id }}">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</form> --}}
							<form action="/order" method="POST">
								@csrf
								@foreach($check as $c)
								@if($c->product_id == $product->id && $c->user_id == auth()->user()->id)
									@method('PUT')
								@endif
								@endforeach
								<div class="add-to-cart">
									<div class="qty-label">
										Qty
										<div class="input-number">
												<input type="number" name="quantity" value="{{ $quantity }}" min="1" max="{{ $product->stock }}" style="font-weight: bold;">
												<input type="hidden" name="product_id" value="{{ $product->id }}">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									@if(!auth()->check())
									<a href="#" onclick="return loginDulu()">
										<button type="button" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</a>
									<script>
										function loginDulu(){
											Swal.fire({
												title: 'Kamu Harus Login Dulu',
												backgroundOpacity: .5,
												position: 'left-start',
												// width: 300,
												icon: 'warning',
												showCancelButton: true,
												confirmButtonColor: '#3085d6',
												cancelButtonColor: '#d33',
												confirmButtonText: 'Login',
												cancelButtonText: 'Tidak'
												}).then((result) => {
												if (result.isConfirmed) {
													window.location.href= '{{ route("login.index") }}'
												}
											})
										}
									</script>
									@else
									<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									@endif
								</div>
							</form>
							
							<ul class="product-links">
								<li style="font-weight: bold;">Category:</li>
								<li><a href="#">{{ $product->category }}</a></li>
							</ul>

							<ul class="product-links">
								<li style="font-weight: bold;">Penjual:</li>
								<li><a href="#">{{ $product->user->full_name }}</a></li>
							</ul>

							<ul class="product-links">
								<li style="font-weight: bold;">Nomor Seller:</li>
								<li><a href="#">{{ $product->user->no_hp }}</a></li>
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
							<div class="tab-content" style="background-color: white;">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div style="text-align: justify; font-size: 16px; margin: 20px 20px;padding: 10px;list-style:circle !important;">
											{!! $product->description !!}
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div style="text-align: justify; font-size: 16px; margin: 0 20px;padding: 10px;">
											<p>{!! $product->detail !!}</p>
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
        <div class="container" style="border-top: 2px solid #8D99AE;background-color: white;">
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
									<div class="text-truncate" style="text-align: left; -webkit-line-clamp: 1;">
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
                                    <h3 class="product-name"><a href="{{ route('product.show', $drink->slug) }}}">{{ $drink->name }}</a></h3>
                                    <h4 class="product-price">Rp. {{ number_format($drink->price,0,',','.') }}</h4>
									<div class="text-truncate" style="text-align: left; -webkit-line-clamp: 1;">
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
									<div class="text-truncate" style="text-align: left; -webkit-line-clamp: 1;">
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