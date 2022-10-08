<?php

$title = 'Edit Rekam Medis';

include_once('includes/header.php');

//Mengambil no rm dari URL
$no_rm = (int)$_GET['no_rm'];

// //Fetch data from the table pasien
// $query = mysqli_query($dbconnect, "SELECT * FROM rekammedis WHERE no_rm='" . $_GET["no_rm"] . "'");
// $rm = mysqli_fetch_assoc($query);

// $query = mysqli_query($dbconnect, "SELECT * FROM rekammedis WHERE no_rm = '$no_rm'");
// Ambil id mahasiswa dari url
// $no_rm = $_GET['no_rm'];

// // Query ambil data mahasiswa
// $rekammedis = select("SELECT * FROM rekammedis WHERE no_rm = $no_rm");

//jika tombol Save di tekan alankan script berikut
if (isset($_POST['edit_rekamMedis'])) {
    if (edit_rekammedis($_POST) > 0) {
        echo "<script>
                alert('Data Rekam Medis Berhasil Di Edit');
                document.location.href = 'view-rekamMedis2.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Rekam Medis Gagal Di Edit');
                document.location.href = 'view-rekamMedis2.php';
              </script>";
    }
}

?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Edit Rekam Medis</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-plus"></i> Edit Rekam Medis
                            <a href="view-rekamMedis.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">

                                <?php

                                // ambil id mahasiswa dari url
                                // $no_rm = $_GET['no_rm'];

                                //Fetch data from the table pasien
                                $query = mysqli_query($dbconnect, "SELECT * FROM rekammedis WHERE no_rm='" . $_GET["no_rm"] . "'");
                                $rekammedis = mysqli_fetch_assoc($query);
                                ?>

                                <div class="mb-3">
                                    <label for="keluhan">No RM</label>
                                    <input type="text" name="no_rm" class="form-control" value="<?= $_GET['no_rm']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" class="form-control" value="<?= $rekammedis['nama_pasien']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan">Keluhan</label>
                                    <input type="text" name="keluhan" class="form-control" placeholder="Masukkan keluhan" value="<?= $rekammedis['keluhan']; ?>" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="terapi">Terapi yang diberikan</label>
                                    <input type="text" name="terapi" class="form-control" placeholder="Masukkan terapi yang diberikan" value="<?= $rekammedis['terapi']; ?>" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori">Jenis Pelayanan yang diberikan</label>
                                    <select name="kategori" class="form-control" value="<?= $rekammedis['kategori']; ?>" required>
                                        <option value="#">Pilih Kategori</option>

                                        <?php $query_kategori = select("SELECT * FROM kategori") ?>
                                        <?php foreach ($query_kategori as $ktg) : ?>

                                            <?php echo '<option value="'.$ktg['id_kategori'].'">'.$ktg['jenis_pelayanan'].'</opti on>'; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="edit_rekamMedis" class="btn btn-success">Save</button>
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