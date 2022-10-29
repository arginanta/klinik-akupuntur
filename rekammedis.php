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

?>
<div class="container mt-5">
  <h1>Data Rekam Medis</h1>
  <hr>

  <a href="tambah-rekammedis.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>Tambah Data</a>

  <table id="table-data" class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal Periksa</th>
        <th>Nama Pasien</th>
        <th>Keluhan</th>
        <th>Nama Dokter</th>
        <th>Diagnosa</th>
        <th>Terapi</th>
        <th>Jenis Pelayanan</th>
        <th><i class="fas fa-cog"></i></th>
      </tr>
    </thead>

    <tbody>
      <?php
      $no = 1;
      $query = "SELECT * FROM rekammedis
                INNER JOIN pasien ON rekammedis.id_pasien = pasien.id_pasien
                INNER JOIN dokter ON rekammedis.id_dokter = dokter.id_dokter
                INNER JOIN pelayanan ON rekammedis.id_pelayanan = pelayanan.id_pelayanan
                ";
      $sql_rm = mysqli_query($db, $query) or die(mysqli_error($con));
      while ($rm = mysqli_fetch_array($sql_rm)) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $rm["tgl_periksa"]; ?></td>
          <td><?= $rm["nama_pasien"]; ?></td>
          <td><?= $rm["keluhan"]; ?></td>
          <td><?= $rm["nama_dokter"]; ?></td>
          <td><?= $rm["diagnosa"]; ?></td>
          <td><?= $rm["terapi"]; ?></td>
          <td><?= $rm["jenis_pelayanan"]; ?></td>
          <td>
            <a href="hapus-rekammedis.php?id=<?= $rm['id_rm']; ?>" onclick="javascript:return confirm('Yakin Data Rekam Medis Akan Dihapus.?');"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
          </td>
        </tr>

      <?php  } ?>
    </tbody>

  </table>

</div>

<?php include 'layout/footer.php'; ?>