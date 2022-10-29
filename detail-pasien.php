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

$title = 'Detail Data Pasien';

include 'layout/header.php';

// mengambil id pasien dari url
$id_pasien = (int)$_GET['id_pasien'];

// query ambil data pasien
$pasien = select("SELECT * FROM pasien WHERE id_pasien = '" . $_GET["id_pasien"] . "'")[0];

?>

<div class="container mt-5">

  <h1>Details Data <?= $pasien['nama_pasien'] ?></h1>
  <hr>

  <table class="table table-bordered table-striped mt-3">
    <tr>
      <td>Nomor Pasien</td>
      <td>: <?= $pasien['id_pasien']; ?></td>
    </tr>
    <tr>
      <td>Nama pasien</td>
      <td>: <?= $pasien['nama_pasien']; ?></td>
    </tr>
    <tr>
      <td>NIK</td>
      <td>: <?= $pasien['nik']; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>: <?= $pasien['alamat']; ?></td>
    </tr>
    <tr>
      <td>Usia</td>
      <td>: <?= $pasien['usia']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>: <?= $pasien['jenis_kelamin']; ?></td>
    </tr>
    <tr>
      <td>No Telpon</td>
      <td>: <?= $pasien['no_telp']; ?></td>
    </tr>
  </table>

  <a href="index.php" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
</div>

<?php include 'layout/footer.php';  ?>