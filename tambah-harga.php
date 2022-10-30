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

$title = 'Tambah Harga';

include 'layout/header.php';

//Check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_finance($_POST) > 0) {
    echo "<script> 
              alert('Data Keuangan Berhasil Ditambahkan');
              document.location.href = 'rekammedis.php';
            </script>";
  } else {
    echo "<script> 
              alert('Data Keuangan Gagal Ditambahkan');
              document.location.href = 'rekammedis.php';
            </script>";
  }
}

// mengambil id pasien dari url
$id_rm = (int)$_GET['id_rm'];

$data = mysqli_query($db, "SELECT * FROM rekammedis
INNER JOIN pasien ON rekammedis.id_pasien = pasien.id_pasien
INNER JOIN dokter ON rekammedis.id_dokter = dokter.id_dokter
INNER JOIN pelayanan ON rekammedis.id_pelayanan = pelayanan.id_pelayanan WHERE id_rm = '" . $_GET["id_rm"] . "'");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-plus"></i> Tambah Harga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="rekammedis.php">Data Harga</a></li>
            <li class="breadcrumb-item active">Tambah Harga</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <?php while ($rekammedis = mysqli_fetch_array($data)) { ?>
        <form action="" method="post">
          <div class="mb-3">
            <label for="id_rm">Nomor Rekam Medis</label>
            <input type="text" name="id_rm" class="form-control" required="required" value="<?= $rekammedis['id_rm'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" value="<?= $rekammedis['nama_pasien'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="jenis_pelayanan">Jenis Pelayanan</label>
            <input type="text" name="jenis_pelayanan" class="form-control" value="<?= $rekammedis['jenis_pelayanan'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="biaya_pokok">Biaya Pokok</label>
            <input type="number" name="biaya_pokok" step="any" min="0" value="<?= $rekammedis['biaya_pokok'] ?>" id="biaya_pokok" class="form-control" placeholder="Masukkan biaya pokok" readonly>
          </div>
          <div class="mb-3">
            <label for="biaya_layanan">Biaya Layanan</label>
            <input type="number" name="biaya_layanan" step="any" min="0" value="0" id="biaya_layanan" class="form-control" placeholder="Masukkan biaya layanan">
          </div>
          <div class="mb-3">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" value="0" readonly onchange="tryNumberFormat(this.form.thirdBox);" class="form-control" placeholder="Masukkan total">
          </div>
          <button type="submit" name="tambah" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</button>
        </form>
      <?php } ?>
      
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>