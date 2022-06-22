<?php

require "evConfig.php";

?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="/Shop_Computer/admin"><img src="<?= $host ?>/public/images/Logo.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="/Shop_Computer/admin"><img src="<?= $host ?>/public/images/logomini.png" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item menu-items">
      <a class="nav-link" href="/Shop_Computer/admin">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer" style="font-size:18px;"></i>
        </span>
        <span class="menu-title">Overview</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Dashboard</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="/Shop_Computer/admin/Category">
              <i class="mdi mdi-book-multiple pr-2 text-danger" style="font-size:18px;"></i>
              Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Shop_Computer/admin/ProductManagement">
              <i class="mdi mdi-chart-bar text-warning pr-2" style="font-size:18px;"></i>
              Product</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/Shop_Computer/admin/EmployeeManager">
              <i class="mdi mdi-account-settings text-success pr-2" style="font-size:20px;"></i>
              Employee
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Shop_Computer/admin/OrderManagement">
              <i class="mdi mdi-clipboard-text pr-2 text-primary" style="font-size:20px;"></i>
              Order
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Shop_Computer/admin/CreateOrder">
              <i class="mdi mdi-tab-plus pr-2 text-warning" style="font-size:18px;"></i>
              Create order
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/Shop_Computer">
        <span class="menu-icon">
          <i class="mdi mdi-web " style="font-size:18px;"></i>
        </span>
        <span class="menu-title">Go to website</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="/Shop_Computer/admin/Trash">
        <span class="menu-icon">
          <i class="mdi mdi-delete text-danger" style="font-size:18px;"></i>
        </span>
        <span class="menu-title">Trash</span>
      </a>
    </li>
  </ul>
</nav>