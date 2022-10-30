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

$title = ' Ubah Pelayanan';

include 'layout/header.php';

//Mengambil id_pelayanan dari url
$id_pelayanan = (int)$_GET['id_pelayanan'];

$jenis_pelayanan = select("SELECT * FROM pelayanan WHERE id_pelayanan = $id_pelayanan")[0];

//Check apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
  if (update_pelayanan($_POST) > 0) {
    echo "<script> 
                alert('Pelayanan Baru Berhasil Diubah');
                document.location.href = 'pelayanan.php';
              </script>";
  } else {
    echo "<script> 
                alert('Pelayanan Baru Gagal Diubah');
                document.location.href = 'pelayanan.php';
              </script>";
  }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Pelayanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="pelayanan.php">Data Pelayanan</a></li>
            <li class="breadcrumb-item active">Ubah Pelayanan</li>
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

        <input type="hidden" name="id_pelayanan" value="<?= $jenis_pelayanan['id_pelayanan']; ?>">

        <div class="mb-3">
          <label for="jenis_pelayanan" class="form-label">Pelayanan</label>
          <input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Jenis Pelayanan..." required value="<?= $jenis_pelayanan['jenis_pelayanan']; ?>">
          <br>
          <label for="biaya_pokok" class="form-label">Biaya Pokok</label>
          <input type="text" class="form-control" id="biaya_pokok" name="biaya_pokok" placeholder="Biaya Pokok..." required value="<?= $jenis_pelayanan['biaya_pokok']; ?>">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Update</button>

      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>