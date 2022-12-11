@extends('publik.layouts.main')

@section('section')
<div class="container edit-profile">
    <h3 style="margin-top: 20px;border-bottom: 2px solid gray;" id="section">Menu Utama</h3>
    <div class="col-lg-6 menu-user">
        <div class="diskusi-profile">
            <img src="{{ asset('/images/'.$user->photo_profile) }}" width="50px" alt="">
            <div class="diskusi-profile-text">
                <p class="font-weight-bold" style="margin-bottom: 0;">{{ $user->full_name }}</p>
                @if($user->no_hp != NULL)
                <p>{{ $user->no_hp }}</p>
                @else
                <p style="color:red;">Ayo lengkapi No.HP dan Alamat</p>
                @endif
            </div>
        </div>
        <br>
        <h4>Aktifitas Saya</h4>
        <div class="aktifitas-saya">
            @if($user->role != 'admin')
            <a href="{{ route('checkout.index') }}">
                <div class="menu">
                    <i class="fa fa-file-text-o fa-lg"></i> Daftar Transaksi
                </div>
            </a>
            <a href="{{ route('pages.shoppingcart') }}">
                <div class="menu">
                    <i class="fa fa-shopping-cart fa-lg"></i> Lihat Orderan kamu
                </div>
            </a>
            @endif
            @if($user->role == 'admin')
            <a href="{{ route('dashboard.index') }}">
                <div class="menu">
                    <i class="fa fa-server fa-lg"></i>Dashboard
                </div>
            </a>
            @endif
            <a href="{{ route('profile.edit') }}">
                <div class="menu">
                    <i class="fa fa-pencil-square-o fa-lg"></i>Ubah Profile
                </div>
            </a>
            {{-- <a href="#">
                <div class="menu">
                    <i class="fa fa-bell-o fa-lg"></i> Notification
                </div>
            </a> --}}
            <a href="{{ route('login.logout') }}">
                <div class="menu">
                    <i class="fa fa-sign-out fa-lg"></i> Logout
                </div>
            </a>
        </div>
        <h4>Pusat Bantuan</h4>
        <div class="pusat-bantuan">
            <a href="#">
                <div class="menu">
                    <i class="fa fa-bullhorn fa-lg"></i> Costumer Service
                </div>
            </a>
        </div>
    </div>

    
</div>
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
        section.classList.add("sticky-margin-product")
    } else {
        navbar.classList.remove("sticky");
        section.classList.remove("sticky-margin-product")
    }
    }
</script>
@endsection