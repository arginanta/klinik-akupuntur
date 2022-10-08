<?php

$title = 'Rekam Medis';

include_once('includes/header.php');

//Ambil data tabel data kategori / query data kategori
$rekammedis = select("SELECT * FROM jenis_pelayanan ORDER BY id_kategori DESC");
?>

<div class="container-fluid px-4">
  <h4 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item">Pelayanan</li>
    </ol>
    <div class="row">
      <div class="col-md-12 main-chart">

        <!-- view Rekam Medis -->
        <div class="card">

          <div class="card-header">

            <h4>Data Rekam Medis</h4>
          </div>
          <div class="card-body">
            <h5 style="margin: 10px;">Filter Berdasarkan Jenis Pelayanan</h5>
            <!-- Menampilkan Data Berdasarkan Dropdown Select Ke Daftar Tabel -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
              <select name="jenis_pelayanan" style="width:160px;">
                <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $jenis_pelayanan = select("SELECT * FROM jenis_pelayanan GROUP BY jenis_pelayanan ORDER BY jenis_pelayanan");
                ?>
                <?php foreach ($rekammedis as $data) : ?>
                  <option value="<?= $data['jenis_pelayanan']; ?>"><?php echo $data['jenis_pelayanan']; ?></option>

                <?php endforeach; ?>
              </select>
              <input type="submit" value="Pilih">
              <a href="view-rekamMedisNew.php" style="margin-left :0.3pc;" class="btn btn-success btn-md">
                <i class="fa fa-refresh"></i> Refresh Data</a>
            </form>
          </div>


          <div class="card-body">
            <table class="table table-bordered table-striped" id="table">
              <thead>
                <tr style="background:#DFF0D8;color:#333;">
                  <th>No.</th>
                  <th>No RM</th>
                  <th>Nama Pasien</th>
                  <th>Keluhan</th>
                  <th>Terapi</th>
                  <th>Jenis Pelayanan</th>
                  <th>Tanggal Input</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php
              if (isset($_GET['jenis_pelayanan'])) {
                $jenis_pelayanan = trim($_GET['jenis_pelayanan']);

                //menampilkan pegawai berdasarkan unit kerja yang dipilih pada combobox
                $rekammedis = mysqli_query($dbconnect, "SELECT * FROM rekammedis WHERE jenis_pelayanan= '$jenis_pelayanan' ORDER BY terapi DESC");

                $no = 1;
                while ($rm = mysqli_fetch_array($rekammedis)) {
                  $no++;
              ?>
                  <tbody>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $rm["no_rm"]; ?></td>
                      <td><?= $rm["nama_pasien"]; ?></td>
                      <td><?= $rm["keluhan"]; ?></td>
                      <td><?= $rm["terapi"]; ?></td>
                      <td><?= $rm["jenis_pelayanan"]; ?></td>
                      <td><?= date('d/m/y | H:i:s', strtotime($rm["tanggal"])); ?></td>
                      <td>
                        <a href="edit-rm.php?no_rm=<?= $rm['no_rm']; ?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="view-rm.php?no_rm=<?= $rm['no_rm']; ?>" onclick="javascript:return confirm('Yakin Data Jenis Pelayanan Akan Dihapus.?');"><button class="btn btn-danger">Hapus</button></a>
                      </td>
                    </tr>
                  </tbody>
              <?php
                }
              }
              ?>
            </table>
          </div>
        </div>
        <!-- end view Jenis Pelayanan -->

      </div>
    </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>