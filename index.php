<?php

$title = 'Dashboard';

include_once('includes/header.php');

$pasien = mysqli_query($dbconnect, "SELECT * FROM pasien");
$count_pasien = mysqli_num_rows($pasien);

$jenis_pelayanan = mysqli_query($dbconnect, "SELECT * FROM kategori");
$count_jenisPelayanan = mysqli_num_rows($jenis_pelayanan);


?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Data Pasien</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                <h2 class="text-bold-700 mt-1 mb-25"><?= $count_pasien; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Pelayanan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">  
                <h2 class="text-bold-700 mt-1 mb-25"><?= $count_jenisPelayanan; ?></h2>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> -->
    </div>

</div>
<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');

?>