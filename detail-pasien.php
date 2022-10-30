<?php

session_start();

// Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
  echo "<script>
            alert('Login Dahulu');
            document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Detail Data Pasien';

include 'layout/header.php';

// mengambil id pasien dari url
$id_pasien = (int)$_GET['id_pasien'];

// query ambil data pasien
$pasien = select("SELECT * FROM pasien WHERE id_pasien = '" . $_GET["id_pasien"] . "'")[0];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas "></i> Detail <?= $pasien['nama_pasien']; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Data Pasien</a></li>
            <li class="breadcrumb-item active">Detail Pasien</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Data Pasien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table class="table table-bordered table-striped">
                <tr>
                  <td>Nomor Pasien</td>
                  <td>: <?= $pasien['id_pasien']; ?></td>
                </tr>
                <tr>
                  <td>Nama pasien</td>
                  <td>: <?= $pasien['nama_pasien']; ?></td>
                </tr>
                <tr>
                  <td>NIK</td>
                  <td>: <?= $pasien['nik']; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>: <?= $pasien['alamat']; ?></td>
                </tr>
                <tr>
                  <td>Usia</td>
                  <td>: <?= $pasien['usia']; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>: <?= $pasien['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                  <td>No Telpon</td>
                  <td>: <?= $pasien['no_telp']; ?></td>
                </tr>
              </table>
              <a href="index.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>