<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- togglebutton -->
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/logo2.png" class="navbar-brand-img" style="margin:-50px 0px 0px -50px;" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-app text-orange"></i>
                        Products
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="createcategory.php">Create Category</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="addproduct.php">Add Products</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="map.php">View Products</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="map.php">Create New Offers</a></li>
                </div>
            </div>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-cart text-primary"></i>
                        Orders
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="profile.php">Pending Orders</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="profile.php">Completed Orders</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="profile.php">Cancelled Orders</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="profile.php">Generate Invoice</a></li>
                </div>
            </div>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-archive-2 text-yellow"></i>
                        Services
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="tables.php">Active Services</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="tables.php">Expired Services</a></li>
                </div>
            </div>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-single-02 text-default"></i>
                        Users
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="#">All User List</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="#">Create New User</a></li>
                </div>
            </div>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-chat-round text-info"></i>
                        Blog
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="#">Add New Blog</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="#">View Blogs</a></li>
                </div>
            </div>
            <div class="dropdown">
                <div class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-circle-08 text-pink"></i>
                        Accounts
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a class="dropdown-item" href="#">Update Company Info</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="#">Change Security Questions</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="#">Change Password</a></li>
                </div>
            </div>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6> -->
          <!-- Navigation -->
          <!-- <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
          </ul> -->
        </div>
      </div>
    </div>
  </nav>
  