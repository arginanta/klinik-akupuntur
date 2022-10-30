<?php

session_start();

// Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
  echo "<script>
            alert('Login Dahulu');
            document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Data Pelayanan';

include 'layout/header.php';

//Check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (create_pelayanan($_POST) > 0) {
    echo "<script> 
                alert('Pelayanan Baru Berhasil Ditambahkan');
                document.location.href = 'pelayanan.php';
              </script>";
  } else {
    echo "<script> 
                alert('Pelayanan Baru Gagal Ditambahkan');
                document.location.href = 'pelayanan.php';
              </script>";
  }
}

//Ambil data tabel data kategori / query data kategori
$jenis_pelayanan = select("SELECT * FROM pelayanan ORDER BY id_pelayanan DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-users"></i> Data Pelayanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pelayanan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Data Pelayanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="" method="POST">
                <table>
                  <tr>
                    <td style="width:20pc;"><input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Masukkan Jenis Pelayanan..." required></td>
                    <td style="width:20pc;"><input type="text" class="form-control" id="biaya_pokok" name="biaya_pokok" placeholder="Masukkan Biaya Pokok..." required></td>
                    <td style="padding-left:10px;"><button type="submit" name="tambah" class="btn btn-primary">Tambah</button></td>
                  </tr>
                </table>
              </form>
              <br>

              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Pelayanan</th>
                    <th>Biaya Pokok</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1;  ?>
                  <?php foreach ($jenis_pelayanan as $pelayanan) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $pelayanan["jenis_pelayanan"]; ?></td>
                      <td>Rp. <?= number_format($pelayanan["biaya_pokok"], 2, ',', '.'); ?></td>
                      <td class="text-center" width="15%">
                        <a href="ubah-pelayanan.php?id_pelayanan=<?= $pelayanan['id_pelayanan']; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-user-cog"></i> Edit</button></a>
                        <a href="hapus-pelayanan.php?id=<?= $pelayanan['id_pelayanan']; ?>" onclick="javascript:return confirm('Yakin Data Jenis Pelayanan Akan Dihapus.?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>