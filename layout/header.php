<?php

include 'config/app.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets-tamplate/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets-tamplate/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets-tamplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets-tamplate/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets-tamplate/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets-tamplate/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets-tamplate/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets-tamplate/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- jQuery -->
  <script src="assets-tamplate/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="assets/img/aksata.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .7">
        <span class="brand-text font-weight-light">Aksata Care</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets-tamplate/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-header">Daftar Menu</li>

            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pasien
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="dokter.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Dokter
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="pelayanan.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Pelayanan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="rekammedis.php" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Rekammedis
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">1</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="laporan-keuangan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Laporan Keuangan
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="logout.php" onclick="return confirm('Yakin Ingin Keluar.?')" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Keluar
                </p>
              </a>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>