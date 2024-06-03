<!-- Start Header/Navigation -->
<nav id="navbarExample" class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top"
    arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/">Service-App<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsService"
            aria-controls="navbarsService" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsService">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('home') }}">Home</a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('post') ? 'active' : '' }} || {{ request()->routeIs('post.show') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('post') }}">Blog</a>
                </li>
                <li class="nav-item {{ request()->routeIs('order') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ route('order') }}">Order</a></li>
                @if (Auth::check())
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown text-decoration-none">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="me-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->username }}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                            aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item link-color" href="{{ route('user.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                    Profile
                                </a></li>
                            <li><a class="dropdown-item link-color" href="{{ route('user.OrderHistory') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                    Transaction History
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Logout
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            @if (!Auth::check())
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-secondary me-2 nav-link px-4 "><i
                                class="bi bi-person"></i> Login</a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</nav>
<!-- End Header/Navigation -->
