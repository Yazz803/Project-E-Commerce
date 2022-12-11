@extends('publik.layouts.main')

@section('section')
<!-- SECTION -->
<div class="section" id="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row" style="display: flex;justify-content:center;flex-wrap: wrap;">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title"><i class="fa fa-circle" style="color: #06283D"></i> Categories</h3>
                </div>
            </div>
            <!-- /section title -->
            @foreach($category_products as $category)
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/images/{{ $category->thumb_img }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{ strtoupper($category->name) }}</h3>
                        <p style="color: white;">{{ $category->slogan }}</p>
                        <a href="{{ route('pages.category.product', $category->slug) }}" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($category_services as $category)
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/images/{{ $category->thumb_img }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{ strtoupper($category->name) }}</h3>
                        <p style="color: white;">{{ $category->slogan }}</p>
                        <a href="{{ route('pages.category.service', $category->slug) }}" class="cta-btn">Show More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
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
                                        <img src="{{ asset('/images/'. $product->thumb_img) }}" alt="" style="object-fit: cover;">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name text-truncate"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">Rp {{ number_format($product->price,0,',','.') }}</h4>
                                        <a href="{{ route('pages.category.product', $product->categoryProduct->slug) }}" class="font-weight-bold" style="font-size: 12px;">{{ strtoupper($product->categoryProduct->name) }}</a>
                                        <div class="text-truncate text-description-card">
                                            {!! $product->description !!}
                                        </div>
                                        <p style="margin-bottom: 20px;font-size:12px;color: red;" class="font-weight-bold">Sisa Stock : {{ $product->stock }} @if($product->stock > 1) pcs @else pc @endif</p>
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
                                        <img src="{{ asset('/images/'. $service->thumb_img) }}" alt="" style="object-fit: cover;">
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
    var section = document.getElementById("section")

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
        section.classList.add("sticky-margin-categories")
    } else {
        navbar.classList.remove("sticky");
        section.classList.remove("sticky-margin-categories")
    }
    }
</script>
@endsection