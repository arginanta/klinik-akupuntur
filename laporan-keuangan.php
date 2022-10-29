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

$title = 'Laporan Keuangan';

include 'layout/header.php';

$laporan_keuangan = select("SELECT * FROM finance");
?>
<div class="container mt-5">
  <h1>Laporan Keuangan</h1>
  <hr>

  <a href="download-pdf-laporanKeuangan.php" class="btn btn-danger btn-sm mb-1"><i class="fas fa-file-pdf"></i> PDF</a>
  <a href="download-excel-laporanKeuangan.php" class="btn btn-success btn-sm mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>
  <table id="table-data" class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Rekam Medis</th>
        <th>Nama Pasien</th>
        <th>Jenis Pelayanan</th>
        <th>Biaya Pokok</th>
        <th>Biaya Layanan</th>
        <th>Total</th>
        <th>Tanggal Input</th>
        <th><i class="fas fa-cog"></i></th>
      </tr>
    </thead>

    <tbody>

      <?php $no = 1; ?>
      <?php foreach ($laporan_keuangan as $finance) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $finance["id_rm"]; ?></td>
          <td><?= $finance["nama_pasien"]; ?></td>
          <td><?= $finance["jenis_pelayanan"]; ?></td>
          <td>Rp. <?= number_format($finance["biaya_pokok"], 2, ',', '.'); ?></td>
          <td>Rp. <?= number_format($finance["biaya_layanan"], 2, ',', '.'); ?></td>
          <td>Rp. <?= number_format($finance["total"], 2, ',', '.'); ?></td>
          <td><?= date('d/m/y | H:i:s', strtotime($finance["created_at"])); ?></td>
          <td class="text-center" width="15%%">
            <a href="delete-laporanKeuangan.php?id_finance=<?= $finance['id_finance']; ?>" onclick="javascript:return confirm('Yakin Data Keuangan Akan Dihapus.?');"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

</div>

<?php include 'layout/footer.php'; ?>