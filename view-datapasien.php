<?php

$title = 'Data Pasien';

include_once('config/dbcon.php');
include_once('includes/header.php');
//jika tombol Save di tekan alankan script berikut
if (isset($_POST['add'])){
    if (add_rekammedis($_POST) > 0){
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
        <li class="breadcrumb-item">Data Pasien</li>
    </ol>
    <div class="row">
        <div class="col-md-12 main-chart">
            <?php
                include_once ('massage.php');
            ?>
            <div class="card">
                <div class="card-header">
                    
                    <a href="add-datapasien.php" style="margin-right :0.5pc;"  
                            class="btn btn-primary float-end">
                            <i class="fa fa-plus"></i>Insert Data</a>
                    <a href="view-datapasien.php" style="margin-right :0.5pc;" 
							class="btn btn-success btn-md float-end">
							<i class="fa fa-refresh"></i> Refresh Data</a>
                    
                    <h4>Data Pasien
                    </h4>
                    <br/>
                    
                </div>
                
                <!-- view pasien -->	
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr style="background:#DFF0D8;color:#333;">
                                <th>No.</th>
                                <th>No. RM</th>
                                <th>Last Visit</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telpon</th>
                                <th colspan='2'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  
                                //Ambil data tabel data pasien / query data pasien
                                $dataPasien = mysqli_query($dbconnect, "SELECT * FROM pasien");
                            ?>
                            <?php
                                // Fetch data pasien dengan array assosiatif
                                if ($dataPasien->num_rows > 0): 
                                $no = 1; 
                                foreach ($dataPasien as $pasien) :
                            ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $pasien["no_rm"]; ?></td>
                                        <td><?php echo $pasien["last_visit"]; ?></td>                                        
                                        <td><?php echo $pasien["nama_pasien"]; ?></td>
                                        <td><?php echo $pasien["nik"];?></td>
                                        <td><?php echo $pasien["usia"];?></td>
                                        <td><?php echo $pasien["jk"];?></td>
                                        <td><?php echo $pasien["no_hp"];?></td>
                                        <td>
                                            <a href="view-detailsDataPasien.php?no_rm=<?php echo $pasien['no_rm']; ?>"><button class="btn btn-primary btn-xs">Details Pasien</button></a>
                                            <a href="edit-datapasien.php?no_rm=<?php echo $pasien['no_rm']; ?>" class="btn btn-warning btn-xs">Edit</a>
                                            <a href="delete-prosesdatapasien.php?no_rm=<?php echo $pasien['no_rm']; ?>" onclick="javascript:return confirm('Hapus Data pasien ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                                            <a href="tambah-rekamMedis.php?no_rm=<?php echo $pasien['no_rm']; ?>" class="btn btn-success btn-xs">Add Rekam Medis</a>
                                        </td>
                                    </tr>
                            <?php
                                $no++; 
                                endforeach;
                            ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" rowspan="1" headers"">Tidak ada data ditemukan!</td>
                                </tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>

                </div>
                <!-- end view pasien -->	 
            </div>
        </div>
    </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>