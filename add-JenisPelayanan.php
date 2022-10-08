<?php

$title = 'Tambah Jenis Pelayanan';

include_once('includes/header.php');

//Check apakah tombol tambah ditekan
if(isset($_POST['tambah'])) {
    if (create_jenisPelayanan($_POST) > 0) {
        echo "<script> 
                alert('Jenis Pelayanan Baru Berhasil Ditambahkan');
                document.location.href = 'view-JenisPelayanan.php';
              </script>";
    } else {
        echo "<script> 
                alert('Jenis Pelayanan Baru Gagal Ditambahkan');
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
                        <h4>Tambah Jenis Pelayanan Baru
                            <a href="view-JenisPelayanan.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                        <br />
                    </div>

                    <!-- view tambah jenis pelayanan  -->
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="jenis_pelayanan" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Kategori Pelayanan..." required>
                            </div>

                            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>

                        </form>

                    </div>
                    <!-- end view tambah jenis pelayanan  -->

                </div>
            </div>
        </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>