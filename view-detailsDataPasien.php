<?php

$title = 'Detail Data Pasien';

include_once('config/dbcon.php');
include_once('includes/header.php');

//Fetch data from the table pasien
$query = mysqli_query($dbconnect, "SELECT * FROM pasien WHERE no_rm='" . $_GET["no_rm"] . "'");
$data_pasien = mysqli_fetch_assoc($query);
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Data Pasien</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Details Data Pasien
                            <a href="view-datapasien.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-striped">
                                <tr>
									<td>No. RM</td>
									<td><?php echo $data_pasien['no_rm'];?></td>
								</tr>
								<tr>
									<td>Last Visit</td>
									<td><?php echo $data_pasien['last_visit'];?></td>
								</tr>
								<tr>
									<td>Nama pasien</td>
									<td><?php echo $data_pasien['nama_pasien'];?></td>
								</tr>
								<tr>
									<td>NIK</td>
									<td><?php echo $data_pasien['nik'];?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $data_pasien['alamat'];?></td>
								</tr>
								<tr>
									<td>Usia</td>
									<td><?php echo $data_pasien['usia'];?></td>
								</tr>
								<tr>
									<td>JK</td>
									<td><?php echo $data_pasien['jk'];?></td>
								</tr>
								<tr>
									<td>No HP</td>
									<td><?php echo $data_pasien['no_hp'];?></td>
								</tr>
								<tr>
									<td>Tanggal Pembuatan</td>
									<td><?php echo $data_pasien['created'];?></td>
								</tr>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
                    </div>
                </div>
            </div>
        </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>