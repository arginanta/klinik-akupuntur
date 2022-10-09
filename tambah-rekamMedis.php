<?php

$title = 'Tambah Rekam Medis';

include_once('includes/header.php');

//jika tombol Save di tekan alankan script berikut
if (isset($_POST['tambah_rekamMedis'])) {
    if (add_rekammedis($_POST) > 0) {
        echo "<script>
                alert('Data Rekam Medis Berhasil Ditambahkan');
                document.location.href = 'view-datapasien.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Rekam Medis Gagal Ditambahkan');
                document.location.href = 'view-datapasien.php';
              </script>";
    }
}

?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Data Pasien </li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-plus"></i> Tambah Rekam Medis
                            <a href="view-datapasien.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">

                                <?php

                                // ambil id mahasiswa dari url
                                $no_rm = (int)$_GET['no_rm'];

                                //Fetch data from the table pasien
                                $query = mysqli_query($dbconnect, "SELECT * FROM pasien WHERE no_rm='" . $_GET["no_rm"] . "'");
                                $data_pasien = mysqli_fetch_assoc($query);
                                ?>

                                <div class="mb-3">
                                    <label for="keluhan">No RM</label>
                                    <input type="text" name="no_rm" class="form-control" value="<?= $_GET['no_rm']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" class="form-control" value="<?= $data_pasien['nama_pasien']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan">Keluhan</label>
                                    <input type="text" name="keluhan" class="form-control" placeholder="Masukkan keluhan" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="terapi">Terapi yang diberikan</label>
                                    <input type="text" name="terapi" class="form-control" placeholder="Masukkan terapi yang diberikan">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori">Jenis Pelayanan yang diberikan</label>
                                    <select name="kategori" class="form-control" required>
                                        <option value="#">Pilih Kategori</option>

                                        <?php $query_kategori = select("SELECT * FROM kategori") ?>
                                        <?php foreach ($query_kategori as $ktg) : ?>

                                            <?php echo '<option value="'.$ktg['id_kategori'].'">'.$ktg['jenis_pelayanan'].'</option>'; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="tambah_rekamMedis" class="btn btn-success">Tambah</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

</div>


<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>