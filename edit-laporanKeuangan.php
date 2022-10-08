<?php

$title = 'Edit Laporan Keuangan';

include_once('includes/header.php');

$id_finance = (int)$_GET['id_finance'];

$data = mysqli_query($dbconnect, "SELECT * FROM finance WHERE id_finance = $id_finance");

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
                            <a href="view-laporanKeuangan.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php while ($finance = mysqli_fetch_array($data)) { ?>
                    <form action="" method="POST">
                        <div class="row">
                            <input type="hidden" name="no_rm" class="form-control" required="required" value="<?= $finance['id_finance'] ?>" >
                            <div class="col-md-12 mb-3">
                                <label for="">No. RM</label>
                                <input type="text" name="no_rm"  class="form-control" value="<?= $finance['no_rm']; ?>" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nama Pasien</label>
                                <input type="text" name="nama_pasien"  class="form-control" value="<?= $finance['nama_pasien']; ?>" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Jenis Pelayanan</label>
                                <input type="text" name="jenis_pelayanan" class="form-control" value="<?= $finance['jenis_pelayanan']; ?>" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Biaya Pokok</label>
                                <input type="text" name="biaya_pokok" class="form-control" value="<?= number_format($finance["biaya_pokok"], 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Biaya Layanan</label>
                                <input type="text" name="biaya_layanan" class="form-control" value="<?= number_format($finance["biaya_layanan"], 0, ',', '.'); ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Total</label>
                                <input type="number" name="total" class="form-control" value="<?= $finance['total']; ?>">
                            </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button>
                                </div>
                            </div>
                    </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>

</div>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>