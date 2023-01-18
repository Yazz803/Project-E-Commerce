<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav" style="align-items: center">
                @if(Request::is('checkout/*') || Request::is('product/*') || Request::is('service/*') || Request::is('shopping-cart'))
                {{-- <li class="back">
                    <a href="@if(Request::is('checkout/*')) /checkout @endif @if(Request::is('product/*')) /products @endif @if(Request::is('service/*')) /services @endif @if(Request::is('shopping-cart')) {{ url()->previous() }} @endif" style="background-color:red;color:white;padding:10px;border-radius:10px;font-weight:bold;"><i class="fa fa-arrow-left"></i> Back</a>
                </li> --}}
                @endif
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('pages.index') }}" class="navbar-icon" style="font-weight: bold;">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="{{ Request::is('products') ? 'active' : '' }}">
                    <a href="{{ route('pages.products') }}" class="navbar-icon" style="font-weight: bold;">
                        <i class="fa fa-shopping-bag"></i> 
                        <p>Products</p>
                    </a>
                </li>
                <li class="{{ Request::is('services') ? 'active' : '' }}">
                    <a href="{{ route('pages.services') }}" class="navbar-icon" style="font-weight: bold;">
                        <i class="fa fa-group"></i> 
                        <p>Services</p>
                    </a>
                </li>
                <li class="{{ Request::is('categories') ? 'active' : '' }}">
                    <a href="{{ route('pages.categories') }}" class="navbar-icon" style="font-weight: bold;">
                        <i class="fa fa-caret-square-o-down"></i>
                        <p>Categories</p>
                    </a>
                </li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->