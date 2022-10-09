<?php

$title = 'Tambah Data Pasien';

include_once('config/dbcon.php');
include_once('includes/header.php');

	// mengambil data pasien dengan id paling besar
	$query = mysqli_query($dbconnect, "SELECT max(no_rm) as kodeTerbesar FROM pasien");
	$data = mysqli_fetch_array($query);
	$noRm = $data['kodeTerbesar'];
 
	// mengambil angka dari no rm pasien terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($noRm, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan ++;
 
	// membentuk no rm baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PSN 
	$huruf = "PSN";
	$noRm = $huruf . sprintf("%03s", $urutan);
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
                        <h4><i class="fa fa-plus"></i> Tambah Data Pasien
                            <a href="view-datapasien.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <form action="add-prosesdatapasien.php" method="POST">
                        <div class="row">
                            
                            <div class="col-md-12 mb-3">
                                <label for="">No. RM</label>
                                <input type="text" name="no_rm"  class="form-control" placeholder="Masukkan no rm" required="required" value="<?php echo $noRm;   ?>" readonly >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Last Visit</label>
                                <input type="date" name="last_visit"  class="form-control" placeholder="Masukkan Last Visit Pasien">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nama Pasien</label>
                                <input type="text" name="nama_pasien"  class="form-control" placeholder="Masukkan nama pasien">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">NIK</label>
                                <input type="number" placeholder="Masukkan NIK " name="nik" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Alamat</label>
                                <input type="text" placeholder="Masukkan alamat" name="alamat" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Usia</label>
                                <input type="number" placeholder="Masukkan Usia" name="usia"  class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="form-control" required>
									<option value="#">Pilih Jenis Kelamin</option>
									<option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
								</select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nomor Telepon</label>
                                <input type="number" placeholder="Masukkan nomor telespon" name="no_hp"  class="form-control">
                            </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_datapasien" class="btn btn-primary"><i class="fa fa-plus"></i> Data Pasien</button>
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