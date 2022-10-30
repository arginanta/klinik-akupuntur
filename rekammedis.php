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

$title = 'Rekam Medis';

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
          <h1 class="m-0"><i class="fas fa-users"></i> Rekammedis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Rekammedis</li>
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
              <!-- <a href="tambah-rekammedis.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a> -->

              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No. Rekammedis</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Keluhan</th>
                    <th>Terapi</th>
                    <th>Pelayanan</th>
                    <th>Biaya Pokok</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $query = "SELECT * FROM rekammedis
                            INNER JOIN pasien ON rekammedis.id_pasien = pasien.id_pasien
                            INNER JOIN dokter ON rekammedis.id_dokter = dokter.id_dokter
                            INNER JOIN pelayanan ON rekammedis.id_pelayanan = pelayanan.id_pelayanan
                            ";

                  $sql_rm = mysqli_query($db, $query) or die(mysqli_error($con));
                  while ($rm = mysqli_fetch_array($sql_rm)) { ?>
                    <tr>
                      <td><?= $rm["id_rm"]; ?></td>
                      <td><?= $rm["nama_pasien"]; ?></td>
                      <td><?= $rm["nama_dokter"]; ?></td>
                      <td><?= $rm["keluhan"]; ?></td>
                      <td><?= $rm["terapi"]; ?></td>
                      <td><?= $rm["jenis_pelayanan"]; ?></td>
                      <td>Rp. <?= number_format($rm["biaya_pokok"], 0, ',', '.'); ?></td>
                      <td class="text-center" width="10%">
                        <a href="tambah-harga.php?id_rm=<?= $rm['id_rm']; ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Harga</a>
                        <a href="hapus-rekammedis.php?id=<?= $rm['id_rm']; ?>" onclick="javascript:return confirm('Yakin Data Rekam Medis Akan Dihapus.?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button></a>
                      </td>
                    </tr>

                  <?php  } ?>
                </tbody>
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