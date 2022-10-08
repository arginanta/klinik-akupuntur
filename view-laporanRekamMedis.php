<?php

$title = 'Laporan Rekam Medis';

include_once('includes/header.php');

$data = select("SELECT * from rekammedis join kategori on kategori.id_kategori = rekammedis.id_kategori");

?>

<div class="container-fluid px-4">
  <h4 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item">Data Rekam Medis</li>
    </ol>
    <div class="row">
      <div class="col-md-12 main-chart">
        <?php
        include_once('massage.php');
        ?>
        <div class="card">
          <div class="card-header">
            <a href="view-laporanRekamMedis.php" style="margin-right :0.5pc;" class="btn btn-success btn-md float-end">
              <i class="fa fa-refresh"></i> Refresh Data</a>

            <h4>Data Rekam Medis
            </h4>
            <br />

          </div>

          <!-- view Rekam Medis -->
          <div class="card-body">
            <table class="table table-bordered table-striped" id="table">
              <thead>
                <tr style="background:#DFF0D8;color:#333;">
                  <th>No. RM</th>
                  <th>Nama Pasien</th>
                  <th>Keluhan</th>
                  <th>Terapi</th>
                  <th>Jenis Pelayanan</th>
                  <th>Biaya Pokok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                //Ambil data tabel data pasien / query data pasien
                $dataPasien = mysqli_query($dbconnect, "SELECT * FROM pasien");
                ?>
                <?php
                // Fetch data pasien dengan array assosiatif
                if ($dataPasien->num_rows > 0) :
                  foreach ($data as $row) :
                ?>
                    <tr>
                      <td><?php echo $row["no_rm"]; ?></td>
                      <td><?php echo $row["nama_pasien"]; ?></td>
                      <td><?php echo $row["keluhan"]; ?></td>
                      <td><?php echo $row["terapi"]; ?></td>
                      <td><?php echo $row["jenis_pelayanan"]; ?></td>
                      <td>Rp. <?= number_format($row["biaya_pokok"], 2, ',', '.'); ?></td>
                      <td>
                        <a href="tambah-laporanRekamMedis.php?id_rekammedis=<?php echo $row['id_rekammedis']; ?>" class="btn btn-success btn-xs">Tambah Harga</a>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                  ?>
                <?php else : ?>
                  <tr>
                    <td colspan="3" rowspan="1" headers"">Tidak ada data ditemukan!</td>
                  </tr>
                <?php endif; ?>

              </tbody>
            </table>

          </div>
          <!-- end view pasien -->
        </div>
      </div>
    </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>