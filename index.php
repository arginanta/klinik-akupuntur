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

$title = 'Data Pasien';

include 'layout/header.php';

$data_pasien = select("SELECT * FROM pasien");

$pasien = mysqli_query($db, "SELECT * FROM pasien");
$count_pasien = mysqli_num_rows($pasien);

$dokter = mysqli_query($db, "SELECT * FROM dokter");
$count_dokter = mysqli_num_rows($dokter);

$pelayanan = mysqli_query($db, "SELECT * FROM pelayanan");
$count_pelayanan = mysqli_num_rows($pelayanan);

$rekammedis = mysqli_query($db, "SELECT * FROM rekammedis");
$count_rekammedis = mysqli_num_rows($rekammedis);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pasien</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pasien</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $count_pelayanan; ?></h3>

              <p>Pelayanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $count_dokter; ?></h3>

              <p>Dokter</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $count_pasien; ?></h3>

              <p>Pasien</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $count_rekammedis; ?></h3>

              <p>Rekammedis</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table Data Pasien</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <a href="tambah-pasien.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

                  <table id="table-data" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nomor Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th><i class="fas fa-cog"></i></th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $no = 1; ?>
                      <?php foreach ($data_pasien as $pasien) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $pasien["id_pasien"]; ?></td>
                          <td><?php echo $pasien["nama_pasien"]; ?></td>
                          <td><?php echo $pasien["jenis_kelamin"]; ?></td>
                          <td><?php echo $pasien["alamat"]; ?></td>
                          <td><?php echo $pasien["no_telp"]; ?></td>
                          <td class="text-center" width="20%">
                            <a href="detail-pasien.php?id_pasien=<?php echo $pasien['id_pasien']; ?>"><button class="btn btn-secondary btn-xs"><i class="fas fa-user"></i> Details</button></a>
                            <a href="ubah-pasien.php?id_pasien=<?php echo $pasien['id_pasien']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-user-cog"></i> Edit</a>
                            <a href="hapus-pasien.php?id=<?php echo $pasien['id_pasien']; ?>" onclick="javascript:return confirm('Hapus Data pasien ?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button></a>
                            <a href="tambah-rekammedis.php?id_pasien=<?php echo $pasien['id_pasien']; ?>" class="btn btn-success btn-xs"><i class="fas fa-plus"></i> Rekammedis</a>
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

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>