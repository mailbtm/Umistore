<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepend-style')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="/style/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
  @stack('addon-style')
</head>

<body>
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-header text-center">
          <img src="/images/admin.png" class="my-4" alt="">
        </div>
        <div class="list-group list-group-flush">
          <a href="{{ route('admin-dashboard') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('product.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/product') ? 'active' : '' }}">Product</a>
          <a href="{{ route('product-gallery.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/product-gallery*') ? 'active' : '' }}">Galleries</a>
          <a href="{{ route('category.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : '' }}">Categories</a>
          <a href="{{ route('transaction.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/transaction*') ? 'active' : '' }}">Transactions</a>
          <a href="{{ route('user.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }}">Users</a>
          <a href="" class="list-group-item list-group-item-action ">Sign Out</a>
        </div>
      </div>

      <!-- page content -->
      <div id="page-content-wrapper">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
          <div class="container-fluid">
            <button class="btn btn-secondary d-md-none" id="menu-toggle">
              &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <!-- desktop menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                  <a href="" class="nav-link" data-toggle="dropdown" role="button" id="navbarDropdown">
                    <img src="/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture">
                    Hi, Angga
                  </a>
                  <div class="dropdown-menu">
                    <a href="/dashboard" class="dropdown-item">Dashboard</a>
                    <a href="/dashboard-account" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item">Logout</a>
                  </div>
                </li>
              </ul>

              <!-- mobile menu -->
              <ul class="navbar-nav d-flex d-lg-none">
                <li class="nav-item">
                  <a href="" class="nav-link">Hi, Angga</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">Cart</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- page content -->
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="/script/navbar-scroll.js"></script>
  <script>
    $('#menu-toggle').click(function(e) {
      e.preventDefault();
      $('#wrapper').toggleClass('toggled');
    })
  </script>
  @stack('addon-script')
</body>

</html>
