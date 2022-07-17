<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Top Up</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('template/assets/') ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('template/assets/') ?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('template/assets/') ?>css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('template/assets/') ?>images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index.html"><img src="<?= base_url('template/assets/') ?>images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="<?= base_url('template/assets/') ?>images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?= base_url('template/assets/images/profile/') . $user['gambar']; ?>">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?= $user['nama']; ?></h5>
                  <span><?= $user['email']; ?></span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          <?php
          if ($user['role'] == 'Admin') { ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Topup/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Game</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Royal/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Starlight</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Penjualan/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Penjualan</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Penjualan_royal/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Penjualan Starlight</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link collapsed" href="<?= site_url('Auth/logout') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-logout text-danger"></i>
              </span>
              <span class="menu-title">Logout</span>
            </a>
          </li>

          <?php } else {
          ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Profil/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Topup</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('Profil/royal') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Starlight</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link collapsed" href="<?= site_url('Auth/logout') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-logout text-danger"></i>
              </span>
              <span class="menu-title">Logout</span>
            </a>
          </li>

          <?php
            } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="<?= base_url('template/assets/') ?>images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">               
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <?php
                            if ($user['role'] == 'User') {
                        ?>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/pembelian')?>">
                                <i class="mdi mdi-email"></i>
                                    <!-- Counter - Alerts -->
                                    
                                        !
                                    </spam>
                                </a>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/detail') ?>">
                                <i class="mdi mdi-bell"></i>
                                    <!-- Counter - Alerts -->
                                    
                                      
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/pembelian_royal')?>">
                                    <i class="fas fa-history fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <spam class="badge badge-danger badge-counter">
                                        !
                                    </spam>
                                </a>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/detail_royal') ?>">
                                    <i class="fas fa-shopping-cart fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">
                            
                                    </span>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
              <li class="nav-item dropdown">
                <!-- <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="<?= base_url('template/assets/') ?>images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a> -->
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="<?= base_url('template/assets/images/profile/') . $user['gambar']; ?>">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $user['nama']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?= site_url('Auth/logout') ?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>