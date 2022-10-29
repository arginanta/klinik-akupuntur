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

<div class="container mt-5">
  <h1>Data Pelayanan</h1>
  <hr>

  <form action="" method="POST">
    <table>
      <tr>
        <td style="width:20pc;"><input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Masukkan Jenis Pelayanan..." required></td>
        <td style="width:20pc;"><input type="text" class="form-control" id="biaya_pokok" name="biaya_pokok" placeholder="Masukkan Biaya Pokok..." required></td>
        <td style="padding-left:10px;"><button type="submit" name="tambah" class="btn btn-primary">Tambah</button></td>
      </tr>
    </table>
  </form>

<div class="card-body">
  <table class="table table-bordered table-striped" id="table">
    <thead>
      <tr style="background:#DFF0D8;color:#333;">
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
          <td class="text-center" width="10%">
            <a href="ubah-pelayanan.php?id_pelayanan=<?= $pelayanan['id_pelayanan']; ?>"><button class="btn btn-warning"><i class="fa fa-user-cog"></i></button></a>
            <a href="hapus-pelayanan.php?id=<?= $pelayanan['id_pelayanan']; ?>" onclick="javascript:return confirm('Yakin Data Jenis Pelayanan Akan Dihapus.?');"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</div>

<?php include 'layout/footer.php'; ?>