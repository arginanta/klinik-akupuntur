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

$kodingbuton = mysqli_query($db, "SELECT * FROM rekammedis");

$num = mysqli_num_rows($kodingbuton);

$jmlh = $num + 1;

$waktu = date('dmy');

$nounik = "RM-" . $waktu . -$jmlh;
?>

<div class="container mt-5">
  <h1>Tambah Rekam Medis</h1>
  <hr>

  <form action="" method="post">

    <div class="mb-3">
      <label for="id_rm">Nomor Rekam Medis</label>
      <input type="text" name="id_rm" class="form-control" required="required" value="<?php echo $nounik; ?>" readonly>
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
      <label form="diagnosa">Diagnosa</label>
      <textarea name="diagnosa" id="diagnosa" class="form-control" required></textarea>
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

    <div class="pull-right">
      <input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
      <input type="reset" name="reset" value="Reset" class="btn btn-default">
    </div>
  </form>
</div>

<?php include 'layout/footer.php';  ?>