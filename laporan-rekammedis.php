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
<div class="container mt-5">
  <h1>Laporan Rekam Medis</h1>
  <hr>

  <table id="table-data" class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>No. </th>
        <th>Rekam Medis</th>
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
          <td><?= $no++ ?></td>
          <td><?= $laporan_rm["id_rm"]; ?></td>
          <td><?= $laporan_rm["nama_pasien"]; ?></td>
          <td><?= $laporan_rm["keluhan"]; ?></td>
          <td><?= $laporan_rm["terapi"]; ?></td>
          <td><?= $laporan_rm["jenis_pelayanan"]; ?></td>
          <td>Rp. <?= number_format($laporan_rm["biaya_pokok"], 2, ',', '.'); ?></td>
          <td class="text-center" width="25%%">
            <a href="tambah-harga.php?id_rm=<?= $laporan_rm['id_rm']; ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Harga</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

</div>

<?php include 'layout/footer.php'; ?>