<?php

$title = 'Data Dokter';

include_once('includes/header.php');

$data = select("SELECT * FROM dokter");

?>


<div class="container-fluid px-4">
  <h4 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item">Data Dokter</li>
    </ol>
    <div class="row">
      <div class="col-md-12 main-chart">
        <?php
        include_once('massage.php');
        ?>
        <div class="card">
          <div class="card-header">

            <a href="tambah-dataDokter.php" style="margin-right :0.5pc;" class="btn btn-primary float-end">
              <i class="fa fa-plus"></i>Insert Data</a>
            <a href="view-dataDokter.php" style="margin-right :0.5pc;" class="btn btn-success btn-md float-end">
              <i class="fa fa-refresh"></i> Refresh Data</a>

            <h4>Data Dokter
            </h4>
            <br />

          </div>

          <!-- view dokter -->
          <div class="card-body">
            <table class="table table-bordered table-striped" id="table">
              <thead>
                <tr style="background:#DFF0D8;color:#333;">
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Spesialis</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th colspan='2'>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($data as $dokter) :
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $dokter["nama_dokter"]; ?></td>
                    <td><?php echo $dokter["spesialis"]; ?></td>
                    <td><?php echo $dokter["alamat"]; ?></td>
                    <td><?php echo $dokter["no_hp"]; ?></td>
                    <td>
                      <a href="view-detailsDatadokter.php?id_dokter=<?php echo $dokter['id_dokter']; ?>"><button class="btn btn-primary btn-xs">Details</button></a>
                      <a href="edit-dataDokter.php?id_dokter=<?php echo $dokter['id_dokter']; ?>" class="btn btn-warning btn-xs">Edit</a>
                      <a href="delete-dataDokter.php?id_dokter=<?php echo $dokter['id_dokter']; ?>" onclick="javascript:return confirm('Hapus Data Dokter ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                    </td>
                  </tr>
                <?php
                  $no++;
                endforeach;
                ?>
              </tbody>
            </table>

          </div>
          <!-- end view dokter -->
        </div>
      </div>
    </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>