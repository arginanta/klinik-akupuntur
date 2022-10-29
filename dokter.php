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

$data_dokter = select("SELECT * FROM dokter");

?>
<div class="container mt-5">
  <h1><i class="fas fa-users"></i> Data Dokter</h1>
  <hr>

  <a href="tambah-dokter.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>Tambah Data</a>

  <table id="table-data" class="table table-bordered table-striped mt-3">
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
          <td>
            <a href="ubah-dokter.php?id_dokter=<?= $dokter['id_dokter']; ?>" class="btn btn-warning btn-xs">Edit</a>
            <a href="hapus-dokter.php?id=<?= $dokter['id_dokter']; ?>" onclick="javascript:return confirm('Hapus Data Dokter ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

</div>

<?php include 'layout/footer.php'; ?>