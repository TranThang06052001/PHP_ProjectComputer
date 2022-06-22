<?php

require "evConfig.php";

?>



<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="/Shop_Computer/admin"><img src="<?= $host ?>/public/images/logomini.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu" style="font-size:26px"></span>
    </button>
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          <input type="text" class="form-control" placeholder="Search products">
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">



      <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell"></i>
          <span class="count bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Event today</p>
              <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
              <p class="text-muted ellipsis mb-0"> Update dashboard </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-link-variant text-warning"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Launch Admin</p>
              <p class="text-muted ellipsis mb-0"> New admin wow! </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">See all notifications</p>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/131218997_100872191924634_8525373899159583810_n.jpg?stp=cp0_dst-jpg_p86x86&_nc_cat=105&ccb=1-7&_nc_sid=dbb9e7&_nc_ohc=Kg3IkuDk14sAX8776NY&_nc_ht=scontent.fhan2-4.fna&oh=00_AT9NExg9qEsFZA7ErnHnr6WgKRyqJXDk-FQxCMwg__aURw&oe=62D7DF4A" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo (isset($_SESSION["User"]) ? $_SESSION["User"][0]->full_name : ""); ?></p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <h6 class="p-3 mb-0">Profile</h6>
          <div class="dropdown-divider"></div>
          <a  href="/Shop_Computer/admin/ChangePassword" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-security text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Change password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/Shop_Computer/admin/logout" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-logout text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Log out</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">Advanced settings</p>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing" style="font-size:26px"></span>
    </button>
  </div>
</nav>