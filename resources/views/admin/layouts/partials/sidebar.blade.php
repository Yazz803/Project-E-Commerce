<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('/assets/img/logo-wk.png') }}" width="50px" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>WK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.index') }}">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Landing Page</span>
        </a>
    </li>
    <!-- Nav Item - Product Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/products*', 'dashboard/category-products*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Product:</h6>
                <a class="collapse-item" href="{{ route('products.create') }}"><i class="fas fa-fw fa-plus"></i> Add Product</a>
                <a class="collapse-item" href="{{ route('category-products.index') }}"><i class="fas fa-fw fa-plus"></i> Category Products</a>
                <a class="collapse-item" href="{{ route('products.index') }}"><i class="fas fa-fw fa-eye"></i> List Products</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Product Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/services*', 'dashboard/category-services*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Service</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Service:</h6>
                <a class="collapse-item" href="{{ route('services.create') }}"><i class="fas fa-fw fa-plus"></i> Service</a>
                <a class="collapse-item" href="{{ route('category-services.index') }}"><i class="fas fa-fw fa-plus"></i> Category Service</a>
                <a class="collapse-item" href="{{ route('services.index') }}"><i class="fas fa-fw fa-eye"></i> List Services</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('dashboard/method-payments*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('method-payments.index') }}">
            <i class="fas fa-fw fa-duotone fa-money-bill"></i>
            <span>Method Payments</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/list-orders*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>List Orders</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/all-users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('allusers.index') }}">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>All Users</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->