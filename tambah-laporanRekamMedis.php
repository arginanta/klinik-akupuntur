<?php

$title = 'Tambah Harga';

include_once('includes/header.php');

//jika tombol Save di tekan alankan script berikut
if (isset($_POST['tambah'])) {
  if (add_finance($_POST) > 0) {
      echo "<script>
              alert('Data Keuangan Berhasil Ditambahkan');
              document.location.href = 'view-laporanKeuangan.php';
            </script>";
  } else {
      echo "<script>
              alert('Data Keuangan Gagal Ditambahkan');
              document.location.href = 'view-laporanKeuangan.php';
            </script>";
  }
}

// ambil id mahasiswa dari url
$id_rekammedis = (int)$_GET['id_rekammedis'];

// $data = select("SELECT * from rekammedis join kategori on kategori.id_kategori = rekammedis.id_kategori where id_rekammedis = $id_rekammedis");
$data = mysqli_query($dbconnect, "SELECT * from rekammedis join kategori on kategori.id_kategori = rekammedis.id_kategori where id_rekammedis = $id_rekammedis");
?>

<div class="container-fluid px-4">
  <h4 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item">Laporan Rekam Medis </li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-plus"></i> Tambah Harga
              <a href="view-laporanRekamMedis.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body">


            <?php while ($rekammedis = mysqli_fetch_array($data)) { ?>
              <form action="" method="post">
                <input type="text" name="id_rekammedis" class="form-control" value="<?= $rekammedis['id_rekammedis'] ?>" readonly>
                <div class="mb-3">
                  <label for="no_rm">No RM</label>
                  <input type="text" name="no_rm" class="form-control" value="<?= $rekammedis['no_rm'] ?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="nama_pasien">Nama Pasien</label>
                  <input type="text" name="nama_pasien" class="form-control" value="<?= $rekammedis['nama_pasien'] ?>" readonly>
                </div>

                <div class="mb-3">
                  <label for="jenis_pelayanan">Jenis Pelayanan</label>
                  <input type="text" name="jenis_pelayanan" class="form-control" value="<?= $rekammedis['jenis_pelayanan'] ?>" readonly>
                </div>

                <div class="mb-3">
                  <label for="biaya_pokok">Biaya Pokok</label>
                  <input type="number" name="biaya_pokok" step="any" min="0" value="<?= $rekammedis['biaya_pokok'] ?>" id="biaya_pokok" class="form-control" placeholder="Masukkan biaya pokok" required="required">
                </div>

                <div class="mb-3">
                  <label for="biaya_layanan">Biaya Layanan</label>
                  <input type="number" name="biaya_layanan" step="any" min="0" value="0" id="biaya_layanan" class="form-control" placeholder="Masukkan biaya layanan">
                </div>
                <div class="mb-3">
                  <label for="total">Total</label>
                  <input type="number" name="total" id="total" value="0" readonly onchange="tryNumberFormat(this.form.thirdBox);" class="form-control" placeholder="Masukkan total">
                </div>
                <div>
                  <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

</div>


<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>