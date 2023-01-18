<!-- HEADER -->
<header>
    <!-- MAIN HEADER -->
    <div id="header">
        {{-- LOGO --}}
        {{-- /LOGO --}}
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3" style="margin-top: 20px">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="{{ asset('/assets/img/logo-wk.png') }}" alt="" class="logo-wk">
                            <h2 style="color: #DDD;font-size: 2rem;">Wikrama Shop</h2>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <center>
                            <form action="{{ route('search.user') }}">
                                <input type="text" class="input" placeholder="Cari produk / service..." name="q" id="search" autocomplete="off" value="{{ request('q') }}">
                                <button class="search-btn" style="border-radius: 0 2px 2px 0;"><i class="fa fa-search"></i></button>
                            </form>
                        </center>
                    </div>
                </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
                </script>
                <script type="text/javascript">
                    var route = "{{ url('autocomplete-search') }}";
                    $('#search').typeahead({
                        source: function (query, process) {
                            return $.get(route, {
                                query: query
                            }, function (data) {
                                return process(data);
                            });
                        }
                    });
                </script>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-lg-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        @php
                            function isAdminMain(){
                                if(auth()->check()){
                                    $userIsAdmin = auth()->user();
                                    return $userIsAdmin->role;
                                }
                                return;
                            }
                        @endphp
                        <div>
                        @if(isAdminMain() != 'admin')
                            @if(!auth()->check())
                                <a href="#" onclick="return loginDulu()" data-toggle="modal" data-target="#largeModal">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            @else
                            <a href="{{ route('pages.shoppingcart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                @php
                                    auth()->check() == true ? $ttl_orders = \App\Models\Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
                                @endphp
                                @if($ttl_orders > 0)
                                <div class="qty">{{ $ttl_orders }}</div>
                                @endif
                            </a>
                            @endif
                        @endif
                        </div>
                        <!-- /Cart -->

                        {{-- Checkout --}}
                        <div class="dropdown">
                            @if(isAdminMain() == 'admin')
                            <a href="{{ route('dashboard.index') }}">
                                <i class="fa fa-server"></i>
                            </a>
                            @else
                            <a @if(!auth()->user()) href="#" onclick="return loginDulu()" @else href="{{ route('checkout.index') }}" @endif>
                                @php
                                    auth()->check() == true ? $ttl_checkouts = \App\Models\Checkout::where('user_id', auth()->user()->id)->count() : $ttl_checkouts = 0;
                                @endphp
                                <i class="fa fa-file-text"></i>
                                @if($ttl_checkouts > 0)
                                <div class="qty">{{ $ttl_checkouts }}</div>
                                @endif
                            </a>
                            @endif
                        </div>
                        {{-- /checkot --}}

                        {{-- Account --}}
                        <div class="dropdown">
                            @if(!auth()->check())
                            <a href="{{ route('login.index') }}">
                                <i class="fa fa-user-circle"></i>
                            </a>
                            @else

                            @endif
                        </div>
                        {{-- /Account --}}

                        @if(auth()->check())
                        {{-- List --}}
                        <div class="dropdown">
                            <a href="{{ route('menu.utama') }}">
                                <i class="fa fa-user-circle"></i>
                            </a>
                        </div>
                        {{-- /List --}}
                        @endif

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->