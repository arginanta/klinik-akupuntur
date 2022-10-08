<?php

$title = 'Edit Data Pasien';

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
                        <h4>Edit Data Pasien
                            <a href="view-datapasien.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <form action="edit-prosesdatapasien.php" method="POST">
                        <div class="row">
                            <input type="hidden" name="no_rm" class="form-control" required="required" value="<?= $_GET['no_rm']; ?>" >
                            <div class="col-md-12 mb-3">
                                <label for="">Last Visit</label>
                                <input type="date" name="last_visit"  class="form-control" placeholder="Masukkan Last Visit Pasien" value="<?= $data_pasien['last_visit']; ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nama Pasien</label>
                                <input type="text" name="nama_pasien"  class="form-control" placeholder="Masukkan nama pasien" value="<?= $data_pasien['nama_pasien']; ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">NIK</label>
                                <input type="number" placeholder="Masukkan NIK " name="nik" class="form-control" value="<?= $data_pasien['nik']; ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Alamat</label>
                                <input type="text" placeholder="Masukkan alamat" name="alamat" class="form-control" value="<?= $data_pasien['alamat']; ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Usia</label>
                                <input type="number" placeholder="Masukkan Usia" name="usia"  class="form-control" value="<?= $data_pasien['usia']; ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <!-- <label for="">Jenis Kelamin</label> -->
                                <select name="jk" class="form-control" required>
                                    <option value="<?= $data_pasien['jk']; ?>"><?= $data_pasien['jk']; ?></option>
									<option value="#">Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
								</select>
                            </div>
                            <div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nomor Telpon</label>
                                <input type="number" placeholder="Masukkan nomor telpon" name="no_hp"  class="form-control" value="<?= $data_pasien['no_hp']; ?>">
                            </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button>
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