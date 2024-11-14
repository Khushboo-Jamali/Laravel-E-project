<?php
session_start();
include "config.php";
ob_start();

if (!isset($_SESSION['userId'])) {
  header('location:login.php');
  exit();
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Customer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./images/logo2.png" rel="icon">
  <link href="./images/logo2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="./images/logo2.png" alt="">
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

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php if (isset($_SESSION['userpic'])) {
                        echo $_SESSION['userpic'];
                      } ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php if (isset($_SESSION['username'])) {
                                                                    echo $_SESSION['username'];
                                                                  } ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                  } ?></h6>
              <span><?php if (isset($_SESSION['userlname'])) {
                      echo $_SESSION['userlname'];
                    } ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="">
            <i class="bi bi-box-arrow-right"></i>
            <span>Go Back</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
        <a class="nav-link collapsed" href="dashboard.php">
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