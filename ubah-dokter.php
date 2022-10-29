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

$title = 'Ubah Data Dokter';

include 'layout/header.php'; 

// check apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
  if (update_dokter($_POST) > 0) {
    echo "<script>
                alert('Data Dokter Berhasil Diubah');
                document.location.href = 'dokter.php';
              </script>";
  } else {
    echo "<script>
                alert('Data Dokter Gagal Diubah');
                document.location.href = 'dokter.php';
              </script>";
  }
}

// mengambil id dokter dari url
$id_dokter = (int)$_GET['id_dokter'];

// query ambil data dokter
$dokter = select("SELECT * FROM dokter WHERE id_dokter = '" . $_GET["id_dokter"] . "'")[0];
?>

<div class="container mt-5">
  <h1>Ubah Data Dokter</h1>
  <hr>

  <form action="" method="post">

    <input type="hidden" name="id_dokter" value="<?= $dokter['id_dokter']; ?>">
    <div class="mb-3">
      <label for="nama_dokter">Nama dokter</label>
      <input type="text" name="nama_dokter" class="form-control" placeholder="Masukkan nama dokter" value="<?= $dokter['nama_dokter']; ?>">
    </div>
    <div class="mb-3">
      <label for="spesialis">Spesialis</label>
      <input type="text" placeholder="Masukkan Usia" name="spesialis" class="form-control" value="<?= $dokter['spesialis']; ?>">
    </div>
    <div class="mb-3">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat"><?= $dokter['alamat']; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="">Nomor Telepon</label>
      <input type="number" placeholder="Masukkan nomor telespon" name="no_telp" class="form-control" value="<?= $dokter['no_telp']; ?>">
    </div>

    <button type="submit" name="ubah" class="btn btn-primary" style="float: right;"> Ubah</button>
  </form>
</div>

<?php include 'layout/footer.php';  ?>