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

$title = 'Ubah Data Pasien';

include 'layout/header.php';

// check apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
  if (update_pasien($_POST) > 0) {
    echo "<script>
                alert('Data Pasien Berhasil Diubah');
                document.location.href = 'index.php';
              </script>";
  } else {
    echo "<script>
                alert('Data Pasien Gagal Diubah');
                document.location.href = 'index.php';
              </script>";
  }
}

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
          <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Pasien</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Data Pasien</a></li>
            <li class="breadcrumb-item active">Ubah Pasien</li>
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

        <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">

        <div class="mb-3">
          <label for="">Nama Pasien</label>
          <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" value="<?= $pasien['nama_pasien']; ?>">
        </div>
        <div class="mb-3">
          <label for="">NIK</label>
          <input type="number" placeholder="Masukkan NIK " name="nik" class="form-control" value="<?= $pasien['nik']; ?>">
        </div>
        <div class="mb-3">
          <label for="">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"><?= $pasien['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="">Usia</label>
          <input type="number" placeholder="Masukkan Usia" name="usia" class="form-control" value="<?= $pasien['usia']; ?>">
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <div>
            <label class="radio-inline">
              <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki"<?= $pasien['jenis_kelamin'] == "Laki-Laki" ? "checked" : null ?>> Laki-Laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jenis_kelamin" value="Perempuan"<?= $pasien['jenis_kelamin'] == "Perempuan" ? "checked" : null ?>> Perempuan
            </label>
          </div>
        </div>
        <div class="mb-3">
          <label for="">Nomor Telepon</label>
          <input type="number" placeholder="Masukkan nomor telespon" name="no_telp" class="form-control" value="<?= $pasien['no_telp']; ?>">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Update</button>

      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>