<?php

$title = 'Rekam Medis';

include_once('includes/header.php');

//Ambil data tabel data kategori / query data kategori
$rekammedis = select("SELECT * from rekammedis join kategori on kategori.id_kategori = rekammedis.id_kategori");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Rekam Medis</li>
        </ol>
        <div class="row">
            <div class="col-md-12 main-chart">

                <!-- view Rekam Medis -->
                <div class="card">

                    <div class="card-header">
                        <!-- <a href="tambah-rekamMedis.php" style="margin-right :0.5pc;" class="btn btn-primary float-end">
                            <i class="fa fa-plus"></i>Tambah Rekam Medis</a> -->
                        <a href="view-rekamMedis.php" style="margin-right :0.5pc;" class="btn btn-success btn-md float-end">
                            <i class="fa fa-refresh"></i> Refresh Data</a>

                        <h4>Data Rekam Medis</h4>
                    </div>
                    <div class="card-body">
                    </div>
                    <!-- view Rekam Medis -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr style="background:#DFF0D8;color:#333;">
                                    <th>No.</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Terapi</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Tanggal Input</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;  ?>
                                <?php foreach ($rekammedis as $rm) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $rm["no_rm"]; ?></td>
                                        <td><?= $rm["nama_pasien"]; ?></td>
                                        <td><?= $rm["keluhan"]; ?></td>
                                        <td><?= $rm["terapi"]; ?></td>
                                        <td><?= $rm["jenis_pelayanan"]; ?></td>
                                        <td><?= date('d/m/y | H:i:s', strtotime($rm["tanggal"])); ?></td>
                                        <td>
                                            <!-- <a href="edit-rm.php?no_rm=<?= $rm['no_rm']; ?>"><button class="btn btn-warning">Edit</button></a> -->
                                            <a href="delete-rekamMedis.php?id_rekammedis=<?= $rm['id_rekammedis']; ?>" onclick="javascript:return confirm('Yakin Data Jenis Pelayanan Akan Dihapus.?');"><button class="btn btn-danger">Hapus</button></a>
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