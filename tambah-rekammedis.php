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

$title = 'Tambah Rekam Medis';

include 'layout/header.php';

//Check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_rekammedis($_POST) > 0) {
    echo "<script> 
              alert('Data Rekam Medis Berhasil Ditambahkan');
              document.location.href = 'rekammedis.php';
            </script>";
  } else {
    echo "<script> 
              alert('Data Rekam Medis Gagal Ditambahkan');
              document.location.href = 'rekammedis.php';
            </script>";
  }
}

//koding menentukan Nomor Unik Registrasi

// $kodingbuton = mysqli_query($db, "SELECT * FROM rekammedis");

// $num = mysqli_num_rows($kodingbuton);

// $jmlh = $num + 1;

// $waktu = date('dmy');

// $nounik = "RM-" . $waktu . -$jmlh;

// mengambil id pasien dari url
$id_pasien = (int)$_GET['id_pasien'];

// query ambil data pasien
$pasien = select("SELECT * FROM pasien WHERE id_pasien = '" . $_GET["id_pasien"] . "'")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-plus"></i> Tambah Rekammedis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="rekammedisphp">Rekammedis</a></li>
            <li class="breadcrumb-item active">Tambah Rekammedis</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="id_rm">Nomor Rekammedis</label>
          <input type="text" name="id_rm" class="form-control" required="required" value="<?= $pasien['id_pasien'];  ?>" readonly>
        </div>

        <div class="mb-3">
          <label for="pasien">Pasien</label>
          <select name="pasien" id="pasien" class="form-control" required>
            <option value="">- Pilih </option>
            <?php
            $sql_pasien = select("SELECT * FROM pasien");
            foreach ($sql_pasien as $data_pasien) :
              echo '<option value="' . $data_pasien['id_pasien'] . '">' . $data_pasien['nama_pasien'] . '</option>';
            ?>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="">Keluhan</label>
          <input type="text" name="keluhan" class="form-control" placeholder="Masukkan keluhan" required="required">
        </div>

        <div class="mb-3">
          <label for="dokter">Dokter</label>
          <select name="dokter" id="dokter" class="form-control" required>
            <option value="">- Pilih </option>
            <?php
            $sql_dokter = mysqli_query($db, "SELECT * FROM dokter") or die(mysqli_error($db));
            while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
              echo '<option value="' . $data_dokter['id_dokter'] . '">' . $data_dokter['nama_dokter'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="">Terapi yang diberikan</label>
          <input type="text" name="terapi" class="form-control" placeholder="Masukkan terapi yang diberikan">
        </div>

        <div class="mb-3">
          <label for="pelayanan">Jenis Pelayanan yang diberikan</label>
          <select name="pelayanan" class="form-control" required>
            <option value="#">- Pilih Pelayanan</option>

            <?php $query_pelayanan = select("SELECT * FROM pelayanan") ?>
            <?php foreach ($query_pelayanan as $pelayanan) : ?>

              <?php echo '<option value="' . $pelayanan['id_pelayanan'] . '">' . $pelayanan['jenis_pelayanan'] . '</option>'; ?>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label form="tgl_periksa">Tanggal Periksa</label>
          <input type="date" name="tgl_periksa" id="tgl_periksa" value="<?= date('Y-m-d') ?>" class="form-control" required autofocus>
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
        <input type="reset" name="reset" value="Reset" class="btn btn-default" style="float: right;">

      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>