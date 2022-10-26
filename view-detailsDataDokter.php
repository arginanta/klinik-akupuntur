<?php

$title = 'Detail Data Dokter';

include_once('includes/header.php');

//Fetch data from the table pasien
$query = mysqli_query($dbconnect, "SELECT * FROM dokter WHERE id_dokter='" . $_GET["id_dokter"] . "'");
$data_dokter = mysqli_fetch_assoc($query);

?>

<div class="container-fluid px-4">
	<h4 class="mt-4">Admin Panel</h4>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Dashboard</li>
		<li class="breadcrumb-item">Data Dokter</li>
	</ol>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Details Data Pasien
						<a href="view-dataDokter.php" class="btn btn-danger float-end">BACK</a>
					</h4>
				</div>

				<!-- /.card-header -->

				<table class="table table-striped">
					<tr>
						<td>Nama Dokter</td>
						<td><?php echo $data_dokter['nama_dokter']; ?></td>
					</tr>
					<tr>
						<td>Spesialis</td>
						<td><?php echo $data_dokter['spesialis']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo $data_dokter['alamat']; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo $data_dokter['jk']; ?></td>
					</tr>
					<tr>
						<td>Nomor Telepon</td>
						<td><?php echo $data_dokter['no_hp']; ?></td>
					</tr>
					<tr>
						<td widyh="50%">Foto</td>
						<td>
							<a href="assets/img/<?= $data_dokter['foto']; ?>">
								<img src="assets/img/<?= $data_dokter['foto']; ?>" alt="foto" width="50%">
							</a>
						</td>
					</tr>
				</table>
				<div class="clearfix" style="padding-top:16%;"></div>
			</div>
		</div>
	</div>
</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>