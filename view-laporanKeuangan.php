<?php

$title = 'Laporan Keuangan';

include_once('includes/header.php');

$data = select("SELECT * FROM finance");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Data Keuangan</li>
        </ol>
        <div class="row">
            <div class="col-md-12 main-chart">
                <?php
                include_once('massage.php');
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="view-laporanKeuangan.php" style="margin-right :0.5pc;" class="btn btn-success btn-md float-end">
                            <i class="fa fa-refresh"></i> Refresh Data</a>

                        <h4>Data Keuangan</h4>
                        <a href="download-excel-laporanKeuangan.php" class="btn btn-success btn-sm mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>
                        <br />

                    </div>

                    <!-- view Rekam Medis -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr style="background:#DFF0D8;color:#333;">
                                    <th>No. RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Biaya Pokok</th>
                                    <th>Biaya Layanan</th>
                                    <th>Total</th>
                                    <th>Tanggal Input</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $finance) : ?>
                                    <tr>
                                        <td><?php echo $finance["no_rm"]; ?></td>
                                        <td><?php echo $finance["nama_pasien"]; ?></td>
                                        <td><?php echo $finance["jenis_pelayanan"]; ?></td>
                                        <td>Rp. <?= number_format($finance["biaya_pokok"], 2, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($finance["biaya_layanan"], 2, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($finance["total"], 2, ',', '.'); ?></td>
                                        <td><?= date('d/m/y | H:i:s', strtotime($finance["tanggal_input"])); ?></td>
                                        <td>
                                            <!-- <a href="edit-laporanKeuangan.php?id_finance=<?= $finance['id_finance']; ?>"><button class="btn btn-warning">Edit</button></a> -->
                                            <a href="delete-laporanKeuangan.php?id_finance=<?= $finance['id_finance']; ?>" onclick="javascript:return confirm('Yakin Data Keuangan Akan Dihapus.?');"><button class="btn btn-danger">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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