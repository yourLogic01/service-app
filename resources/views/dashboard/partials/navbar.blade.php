<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}
        @php
            $unconfirmedOrders = App\Models\Order::select('id', 'name', 'status', 'created_at')
                ->where('status', 1)
                ->get();
            $unconfirmedOrdersCount = $unconfirmedOrders->count();
        @endphp
        <!-- Nav Item - Order Notifications Dropdown -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="orderDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Orders -->
                @if ($unconfirmedOrdersCount > 0)
                    <span class="badge badge-danger badge-counter">{{ $unconfirmedOrdersCount }}</span>
                @endif
            </a>
            <!-- Dropdown - Orders -->
            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="orderDropdown">
                <h6 class="dropdown-header">
                    Order Notifications
                </h6>
                @if ($unconfirmedOrders->isEmpty())
                    <a class="dropdown-item text-center small text-gray-500" href="#">No new orders</a>
                @else
                    @foreach ($unconfirmedOrders as $order)
                        {{-- {{ route('admin.orders.show', $order->id) }} --}}
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">{{ $order->created_at->diffForHumans() }}</div>
                                <span class="font-weight-bold">Order #{{ $order->id }} from
                                    {{ $order->name }}</span>
                            </div>
                        </a>
                    @endforeach
                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.orderIndex') }}">View
                        all orders</a>
                @endif
            </ul>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                @if (Auth::user()->avatar == null)
                    <img class="img-profile rounded-circle" src="{{ asset('images/undraw_profile.svg') }}"
                        alt="Profile Picture">
                @else
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . Auth::user()->avatar) }}"
                        alt="{{ Auth::user()->username }}">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                        Profile
                    </a></li>
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

</nav>
