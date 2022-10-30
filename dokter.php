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

$title = 'Data Dokter';

include 'layout/header.php';

$data_dokter = select("SELECT * FROM dokter ORDER BY id_dokter DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-users"></i> Data Dokter</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Dokter</li>
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
              <h3 class="card-title">Table Data Dokter</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambah-dokter.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_dokter as $dokter) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $dokter["nama_dokter"]; ?></td>
                      <td><?= $dokter["spesialis"]; ?></td>
                      <td><?= $dokter["alamat"]; ?></td>
                      <td><?= $dokter["no_telp"]; ?></td>
                      <td class="text-center" width="15%">
                        <a href="ubah-dokter.php?id_dokter=<?= $dokter['id_dokter']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-user-cog"></i> Edit</a>
                        <a href="hapus-dokter.php?id=<?= $dokter['id_dokter']; ?>" onclick="javascript:return confirm('Hapus Data Dokter ?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button></a>
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