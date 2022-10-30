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

$title = 'Laporan Rekam Medis';

include 'layout/header.php';

$laporan_rekammedis = select("SELECT * FROM rekammedis
INNER JOIN pasien ON rekammedis.id_pasien = pasien.id_pasien
INNER JOIN dokter ON rekammedis.id_dokter = dokter.id_dokter
INNER JOIN pelayanan ON rekammedis.id_pelayanan = pelayanan.id_pelayanan");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-users"></i> Laporan Rekammedis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Laporan Rekammedis</li>
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
              <h3 class="card-title">Table Rekammedis</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No. Rekammedis</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Terapi</th>
                    <th>Pelayanan</th>
                    <th>Biaya Pokok</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($laporan_rekammedis as $laporan_rm) : ?>
                    <tr>
                      <td><?= $laporan_rm["id_rm"]; ?></td>
                      <td><?= $laporan_rm["nama_pasien"]; ?></td>
                      <td><?= $laporan_rm["keluhan"]; ?></td>
                      <td><?= $laporan_rm["terapi"]; ?></td>
                      <td><?= $laporan_rm["jenis_pelayanan"]; ?></td>
                      <td>Rp. <?= number_format($laporan_rm["biaya_pokok"], 2, ',', '.'); ?></td>
                      <td class="text-center" width="10%%">
                        <a href="tambah-harga.php?id_rm=<?= $laporan_rm['id_rm']; ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Harga</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>