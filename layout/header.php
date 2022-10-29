<?php
include 'config/app.php';
?>


<!doctype html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

  <title><?= $title; ?></title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Aksata Care</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Data Pasien</a>
            <a class="nav-link" href="dokter.php">Data Dokter</a>
            <a class="nav-link" href="pelayanan.php">Pelayanan</a>
            <a class="nav-link" href="rekammedis.php">Rekam Medis</a>
            <a class="nav-link" href="laporan-rekammedis.php">Laporan Rekam Medis</a>
            <a class="nav-link" href="laporan-keuangan.php">Laporan Keuangan</a>
            <a class="nav-link" href="akun.php">Akun</a>
            <a class="nav-link" onclick="return confirm('Yakin Ingin Keluar.?')" href="logout.php">Keluar</a>
          </div>
        </div>

        <div>
          <a href="#" class="navbar-brand"><?= $_SESSION['nama']; ?></a>
        </div>
      </div>
    </nav>
  </div>