<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top" arial-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="/">Service-App<span>.</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsService" aria-controls="navbarsService" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsService">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link " href="/">Home</a>
          </li>
          <li class="nav-item {{ request()->routeIs('post') ? 'active' : '' }} || {{ request()->routeIs('post.show') ? 'active' : '' }}"><a class="nav-link " href="/post">Blog</a></li>
          <li class="nav-item {{ request()->routeIs('order') ? 'active' : '' }}"><a class="nav-link " href="/order">Order</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li class="nav-item">
            <a href="/login" class="btn btn-secondary me-2 nav-link px-4 "><i class="bi bi-person"></i> Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Header/Navigation -->