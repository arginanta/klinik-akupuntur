<?php

$title = 'Jenis Pelayanan';

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

//Ambil data tabel data kategori / query data kategori
$jenis_pelayanan = select("SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Pelayanan</li>
    </ol>
    <div class="row">
        <div class="col-md-12 main-chart">

            <!-- view Jenis Pelayanan -->	
            <div class="card">

                <div class="card-header">
                    <!-- <a href="add-JenisPelayanan.php" style="margin-right :0.5pc;"  
                            class="btn btn-primary float-end">
                            <i class="fa fa-plus"></i>Insert Data</a> -->
                    <a href="view-JenisPelayanan.php" style="margin-right :0.5pc;" 
							class="btn btn-success btn-md float-end">
							<i class="fa fa-refresh"></i> Refresh Data</a>
                        
                    <h4>Data jenis Pelayanan</h4>
                </div>
                <!-- view tambah jenis pelayanan  -->
                <div class="card-body">

                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td style="width:20pc;"><input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Masukkan Jenis Pelayanan..." required></td>
                                <td style="width:20pc;"><input type="text" class="form-control" id="biaya_pokok" name="biaya_pokok" placeholder="Masukkan Biaya Pokok..." required></td>
                                <td style="padding-left:10px;"><button type="submit" name="tambah" class="btn btn-primary" >Tambah</button></td>                               
                            </tr>
                        </table>
                    </form>

                    </div>
                    <!-- end view tambah jenis pelayanan  -->
                <!-- view Jenis Pelayanan -->	
                <div class="card-body">     
                        <table class="table table-bordered table-striped" id="table">
							<thead>
								<tr style="background:#DFF0D8;color:#333;">
									<th>No.</th>
									<th>Jenis Pelayanan</th>
                                    <th>Biaya Pokok</th>
									<th>Tanggal Input</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
                                <?php  $no = 1;  ?>
                                <?php foreach ($jenis_pelayanan as $pelayanan) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pelayanan["jenis_pelayanan"]; ?></td>
                                        <td>Rp. <?= number_format($pelayanan["biaya_pokok"],2,',','.') ; ?></td>
                                        <td><?= date('d/m/y | H:i:s', strtotime($pelayanan["tgl_input"])); ?></td>
                                        <td>
                                            <a href="edit-JenisPelayanan.php?id_kategori=<?= $pelayanan['id_kategori']; ?>"><button class="btn btn-warning">Edit</button></a>
                                            <a href="delete-JenisPelayanan.php?id_kategori=<?= $pelayanan['id_kategori']; ?>" onclick="javascript:return confirm('Yakin Data Jenis Pelayanan Akan Dihapus.?');"><button class="btn btn-danger">Hapus</button></a>
                                        </td>
                                    </tr>
							<?php endforeach; ?>
							</tbody>
						</table>

                </div>
                <!-- end view Jenis Pelayanan -->	

            </div>
        </div>
    </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>