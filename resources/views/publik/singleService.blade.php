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
								<li><a href="#">{{ $service->categoryService->name }}</a></li>
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

							<div class="diskusi">
								<!-- section title -->
								<div class="col-md-12">
									<div class="section-title col-md-8" style="display: flex;justify-content:space-between;align-items:center;">
										<h4 class="title"><i class="fa fa-circle" style="color: #059fff"></i> Diskusi</h4>
										<a href="#"><u>Total Diskusi</u>({{ $service->commentServices->count() }})</a>
									</div>
								</div>
								@foreach($service->commentServices()->orderBy('created_at', 'desc')->get() as $comment)
								<!-- /section title -->
								<div class="col-md-8">
									<div class="diskusi-head">
										<div class="diskusi-profile">
											<img src="/images/{{ $comment->user->photo_profile }}" width="50px" alt="">
											<div class="diskusi-profile-text">
												<p class="font-weight-bold" style="margin-bottom: 0;">{{ $comment->user->full_name }} <span style="color: gray;font-size:10px;"><i class="fa fa-circle"></i> {{ $comment->created_at->diffForHumans() }}</span></p>
												@if($comment->user->role == 'admin')
												<p style="color: red">Seller</p>
												@else
												<p>Costumer</p>
												@endif
											</div>
											@if(auth()->check())
												@if($comment->user->id == auth()->user()->id)
												<form action="{{ route('comment.service.destroy', $comment->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button class="chat-delete">
														<p><i class="fa fa-trash fa-lg"></i> </p>
													</button>
												</form>
												@endif
											@endif
										</div>
										@php
											$chatToggle = $comment->user->username . mt_rand(1,999);
											$chatInput = $comment->user->username . mt_rand(1,999);
										@endphp
										<p style="margin-top: 8px;">{{ $comment->message }}</p>
										@foreach($comment->commentReplyServices()->get() as $reply)
										<div class="diskusi2" >
											<div class="col-md-12" style="border-left: 3px solid gray !important; margin-left:15px;margin-bottom: 10px;padding-right: 0 !important">
												<div class="diskusi-head">
													<div class="diskusi-profile">
														<img src="/images/{{ $reply->user->photo_profile }}" width="50px" alt="">
														<div class="diskusi-profile-text">
															<p class="font-weight-bold" style="margin-bottom: 0;">{{ $reply->user->full_name }} <span style="color: gray;font-size:10px;"><i class="fa fa-circle"></i> {{ $reply->created_at->diffForHumans() }}</span></p>
															@if($reply->user->role == 'admin')
															<p style="color:red;">Seller</p>
															@else
															<p>Costumer</p>
															@endif
														</div>
														@if(auth()->check())
															@if($reply->user->id == auth()->user()->id)
															<form action="{{ route('comment.service.reply.destroy', $reply->id) }}" method="POST">
																@csrf
																@method('DELETE')
																<button class="chat-delete">
																	<p><i class="fa fa-trash fa-lg"></i> </p>
																</button>
															</form>
															@endif
														@endif
													</div>
													<p style="margin-top:8px;">{{ $reply->message }}</p>
												</div>
											</div>
										</div>
										@endforeach
										@if(auth()->check())
										<button class="chat-toggle" @if(!auth()->check()) onclick="return loginDulu()" @else id="{{ $chatToggle }}" @endif>
											<p><i class="fa fa-comments-o fa-lg"></i> Reply</p>
										</button>
										<form action="{{ route('comment.service.reply.store', $comment->id) }}" method="POST" style="margin-bottom: 10px;">
											@csrf
											<div class="chat-input" id="{{ $chatInput }}">
												<input type="hidden" name="service_id" value="{{ $service->id }}">
												<input type="text" name="message" placeholder="Masukan Komentar" autocomplete="off">
												<button type="submit">
													<i class="fa fa-send icon-chat"></i>
												</button>
											</div>
										</form>
										@endif
										{{-- Chat Box --}}
										<script>
											var {{ $chatToggle }} = document.getElementById('{{ $chatToggle }}')
											var {{ $chatInput }} = document.getElementById('{{ $chatInput }}')

											{{ $chatToggle }}.addEventListener('click', evt => {
											{{ $chatInput }}.classList.toggle('show-chat-input')
											})
										</script>
									</div>
								</div>

									
								@endforeach
							</div>

							</div>



							<div class="chat-box">
								<div class="col-md-8">
									<button class="chat-toggle" @if(!auth()->check()) onclick="return loginDulu()" @else id="chat-toggle-send" @endif>
										<p><i class="fa fa-plus-square-o fa-lg"></i> Tambahkan Diskusi</p>
									</button>
									@auth
									<form action="{{ route('comment.service.store', $service->id) }}" method="POST">
										@csrf
										<div class="chat-input" id="chat-input-send">
											<input type="text" name="message" placeholder="Masukan Pertanyaan/Komentar" autocomplete="off">
											<button type="submit">
												<i class="fa fa-send icon-chat"></i>
											</button>
										</div>
									</form>
									@endif
									{{-- Chat Box --}}
									<script>
										var chatToggle = document.getElementById('chat-toggle-send')
										var chatInput = document.getElementById('chat-input-send')

										chatToggle.addEventListener('click', evt => {
										chatInput.classList.toggle('show-chat-input')
										})
									</script>
								</div>
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
			<div class="section" id="new-product" style="padding-top: 0 !important;">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Rekomendasi Untuk Kamu</h3>
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
											@foreach($products as $product)
											<!-- product -->
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