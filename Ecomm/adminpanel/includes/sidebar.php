<?php 
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" style="background: black;" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <!--<img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">-->
        <span class="ms-1 font-weight-bold text-white">Shea's Fashion Online Shop</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white<?= $page == "category.php"? 'active-bg-gradient-primary':''; ?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">content_copy</i>
            </div>
            <span class="nav-link-text ms-1">Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white<?= $page == "products.php"? 'active-bg-gradient-primary':''; ?>" href="products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">content_copy</i>
            </div>
            <span class="nav-link-text ms-1">Products</span>  
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white<?= $page == "orders.php"? 'active-bg-gradient-primary':''; ?>" href="orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">content_copy</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>  
          </a>
        </li>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-success mt-4 w-100" 
        href="../logout.php" type="button">Log Out</a>
      </div>
    </div>
  </aside>

  