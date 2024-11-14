<!-- resources/views/layouts/header.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Employee</title>
  
  <!-- Favicons -->
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('./images/logo2.png') }}" alt="">
        <span class="d-none d-lg-block">Customer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if(session('userpic'))
              <img src="{{ session('userpic') }}" alt="Profile" class="rounded-circle">
            @else
              <img src="{{ asset('assets/img/default-profile.png') }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('username') ?? 'user' }}</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ session('username') ?? 'User' }}</h6>
              <span>{{ session('userlname') ?? 'Last Name' }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->






  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#emp-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-journal-text"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="emp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-order.php">
              <i class="bi bi-circle"></i><span>Add Order</span>
            </a>
          </li>

          <li>
            <a href="view-orders.php">
              <i class="bi bi-circle"></i><span>View Orders</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#de-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Order Details</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="de-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="view_details.php">
              <i class="bi bi-circle"></i><span>View Order Details</span>
            </a>
          </li>
          <li>
            <a href="add-details.php">
              <i class="bi bi-circle"></i><span>Add Order Details</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pat-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Deliveries</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="add-deliverie.php">
              <i class="bi bi-circle"></i><span>Add Deliveries</span>
            </a>
          </li>

          <li>
            <a href="view-deliverie.php">
              <i class="bi bi-circle"></i><span>View Deliveries</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dis-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-product.php">
              <i class="bi bi-circle"></i><span>Add Product</span>
            </a>
          </li>
          <li>
            <a href="view-product.php">
              <i class="bi bi-circle"></i><span>View Products</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#st-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Stock</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="st-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-stock.php">
              <i class="bi bi-circle"></i><span>Add Stock</span>
            </a>
          </li>
          <li>
            <a href="view-stock.php">
              <i class="bi bi-circle"></i><span>View Stocks</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#feed" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>FeedBack</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="feed" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="view_feedback.php">
              <i class="bi bi-circle"></i><span>View FeedBack</span>
            </a>
          </li>

        </ul>
      </li>
      <!-- End Forms Nav -->





  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main>








