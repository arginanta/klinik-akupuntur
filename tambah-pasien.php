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

$title = 'Tambah Data Pasien';

include 'layout/header.php';
include 'config/dbcon.php';

//Check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_pasien($_POST) > 0) {
    echo "<script> 
              alert('Data Pasien Berhasil Ditambahkan');
              document.location.href = 'index.php';
            </script>";
  } else {
    echo "<script> 
              alert('Data Pasien Gagal Ditambahkan');
              document.location.href = 'index.php';
            </script>";
  }
}

//koding menentukan Nomor Unik Registrasi

$kodingbuton = mysqli_query($db, "SELECT * FROM pasien");

$num = mysqli_num_rows($kodingbuton);

$jmlh = $num + 1;

$waktu = date('dmy');

$nounik = "PSN-" . $waktu . -$jmlh;
?>

<div class="container mt-5">
  <h1>Tambah Pasien</h1>
  <hr>

  <form action="" method="post">

    <div class="mb-3">
      <label for="id_pasien">Nomor Pasien</label>
      <input type="text" name="id_pasien" class="form-control" required="required" value="<?php echo $nounik; ?>" readonly>
    </div>
    <div class="mb-3">
      <label for="nama_pasien">Nama Pasien</label>
      <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" required>
    </div>
    <div class="mb-3">
      <label for="nik">NIK</label>
      <input type="number" placeholder="Masukkan NIK " name="nik" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="usia">Usia</label>
      <input type="number" placeholder="Masukkan Usia" name="usia" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <div>
        <label class="radio-inline">
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" required> Laki-Laki
        </label>
        <label class="radio-inline">
          <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label for="no_telp">Nomor Telepon</label>
      <input type="number" placeholder="Masukkan nomor telespon" name="no_telp" class="form-control" required>
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</button>
  </form>
</div>

<?php include 'layout/footer.php';  ?>