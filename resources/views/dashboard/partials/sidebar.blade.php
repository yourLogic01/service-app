<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img style="width: 3rem" src="{{ asset('img/JAS_NoBg.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Service-app</div>
    </a>

    @if (Auth::user()->role->name == 'teknisi' || Auth::user()->role->name == 'admin')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Utama
        </div>

        <!-- Nav Item - Lapangan Collapse Menu -->
        

        <li class="nav-item ">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Order</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-file-invoice-dollar"></i>
                <span>Data Transaksi</span>
            </a>
        </li>

        @can('admin')
            
        
        <li class="nav-item {{ request()->routeIs('admin.itemIndex') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.itemIndex') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Barang / item</span>
            </a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            Menu Tambahan
        </div>
        <li class="nav-item {{ request()->routeIs('admin.userIndex') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.userIndex') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.postIndex') ? 'active' : '' }} || {{ request()->routeIs('admin.postDetail') ? 'active' : '' }} || {{ request()->routeIs('admin.postEdit') ? 'active' : '' }} || {{ request()->routeIs('admin.postCreate') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.postIndex') }}">
                <i class="fas fa-fw fa-upload"></i>
                <span>Postingan</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.indexData') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.indexData') }}">
                <i class="fas fa-fw fa-info-circle"></i>
                <span>Pengaturan Data</span>
            </a>
        </li>
        @endcan
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
