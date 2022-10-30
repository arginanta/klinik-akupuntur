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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Keuangan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Laporan Keuangan</li>
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
              <h3 class="card-title">Table Keuangan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <a href="download-pdf-laporanKeuangan.php" class="btn btn-danger btn-sm mb-1"><i class="fas fa-file-pdf"></i> PDF</a>
              <a href="download-excel-laporanKeuangan.php" class="btn btn-success btn-sm mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Tanggal Input</th>
                    <th>No. Rekammedis</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Pelayanan</th>
                    <th>Biaya Pokok</th>
                    <th>Biaya Layanan</th>
                    <th>Total</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($laporan_keuangan as $finance) : ?>
                    <tr>
                      <td><?= date('d/m/y | H:i:s', strtotime($finance["created_at"])); ?></td>
                      <td><?= $finance["id_rm"]; ?></td>
                      <td><?= $finance["nama_pasien"]; ?></td>
                      <td><?= $finance["jenis_pelayanan"]; ?></td>
                      <td>Rp. <?= number_format($finance["biaya_pokok"], 0, ',', '.'); ?></td>
                      <td>Rp. <?= number_format($finance["biaya_layanan"], 0, ',', '.'); ?></td>
                      <td>Rp. <?= number_format($finance["total"], 0, ',', '.'); ?></td>
                      <td class="text-center" width="10%%">
                        <a href="hapus-laporanKeuangan.php?id=<?= $finance['id_finance']; ?>" onclick="javascript:return confirm('Yakin Data Keuangan Akan Dihapus.?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button></a>
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