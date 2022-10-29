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

$title = 'Tambah Data Dokter';

include 'layout/header.php';

//Check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_dokter($_POST) > 0) {
    echo "<script> 
              alert('Data Dokter Berhasil Ditambahkan');
              document.location.href = 'dokter.php';
            </script>";
  } else {
    echo "<script> 
              alert('Data Dokter Gagal Ditambahkan');
              document.location.href = 'dokter.php';
            </script>";
  }
}

//koding menentukan Nomor Unik Registrasi

$kodingbuton = mysqli_query($db, "SELECT * FROM dokter");

$num = mysqli_num_rows($kodingbuton);

$jmlh = $num + 1;

$waktu = date('dmy');

$nounik = "DOKTER-" . $waktu . -$jmlh;

?>

<div class="container mt-5">
  <h1>Tambah Dokter</h1>
  <hr>

  <form action="" method="post">

    <div class="mb-3">
      <label for="id_dokter">Nomor Dokter</label>
      <input type="text" name="id_dokter" class="form-control" required="required" value="<?php echo $nounik; ?>" readonly autofocus>
    </div>
    <div class="mb-3">
      <label for="nama_dokter">Nama Dokter</label>
      <input type="text" name="nama_dokter" class="form-control" placeholder="Masukkan Nama..." required="required" autofocus>
    </div>
    <div class="mb-3">
      <label for="spesialis">Spesialis</label>
      <input type="text" placeholder="Masukkan Spesialis" name="spesialis" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label for="">Nomor Telepon</label>
      <input type="number" placeholder="Masukkan Nomor Telepon..." name="no_telp" class="form-control" required autofocus>
    </div>
    <button type="submit" name="tambah" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</button>
  </form>
</div>

<?php include 'layout/footer.php';  ?>