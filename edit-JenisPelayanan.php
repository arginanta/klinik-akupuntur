<?php

$title = ' Ubah Pelayanan';

include_once('includes/header.php');

//Mengambil id_kategori dari url
$id_kategori = (int)$_GET['id_kategori'];

$kategori = select("SELECT * FROM kategori WHERE id_kategori = $id_kategori")[0];

//Check apakah tombol tambah ditekan
if(isset($_POST['ubah'])) {
    if (update_jenisPelayanan($_POST) > 0) {
        echo "<script> 
                alert('Jenis Pelayanan Baru Berhasil Diubah');
                document.location.href = 'view-JenisPelayanan.php';
              </script>";
    } else {
        echo "<script> 
                alert('Jenis Pelayanan Baru Gagal Diubah');
                document.location.href = 'view-JenisPelayanan.php';
              </script>";
    }
}
?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Jenis Pelayanan</li>
        </ol>
        <div class="row">
            <div class="col-md-12 main-chart">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Jenis Pelayanan Baru
                            <a href="view-JenisPelayanan.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                        <br />
                    </div>

                    <!-- view ubah jenis pelayanan  -->
                    <div class="card-body">

                        <form action="" method="POST">

                            <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">

                            <div class="mb-3">
                                <label for="jenis_pelayanan" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Kategori Pelayanan..." required value="<?= $kategori['jenis_pelayanan']; ?>">
                                <br>
                                <label for="biaya_pokok" class="form-label">Biaya Pokok</label>
                                <input type="text" class="form-control" id="biaya_pokok" name="biaya_pokok" placeholder="Biaya Pokok..." required value="<?= $kategori['biaya_pokok']; ?>">
                            </div>

                            <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Update</button>

                        </form>

                    </div>
                    <!-- end view ubah jenis pelayanan  -->

                </div>
            </div>
        </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>