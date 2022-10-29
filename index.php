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

$title = 'Data Pasien';

include 'layout/header.php'; 

$data_pasien = select("SELECT * FROM pasien ORDER BY id_pasien DESC");
?>
  <div class="container mt-5">
    <h1><i class="fas fa-users"></i> Data Pasien</h1>
    <hr>

    <a href="tambah-pasien.php" class="btn btn-primary">
      <i class="fa fa-plus"></i> Tambah Data Pasien</a>

    <table id="table-data" class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nomor Pasien</th>
          <th>Nama Pasien</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>No Telpon</th>
          <th><i class="fas fa-cog"></i></th>
        </tr>
      </thead>

      <tbody>

        <?php $no = 1; ?>
        <?php foreach ($data_pasien as $pasien) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pasien["id_pasien"]; ?></td>
            <td><?php echo $pasien["nama_pasien"]; ?></td>
            <td><?php echo $pasien["jenis_kelamin"]; ?></td>
            <td><?php echo $pasien["alamat"]; ?></td>
            <td><?php echo $pasien["no_telp"]; ?></td>
            <td class="text-center" width="25%%">
              <a href="detail-pasien.php?id_pasien=<?php echo $pasien['id_pasien']; ?>"><button class="btn btn-secondary btn-xs"><i class="fas fa-user"></i></button></a>
              <a href="ubah-pasien.php?id_pasien=<?php echo $pasien['id_pasien']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-user-cog"></i></a>
              <a href="hapus-pasien.php?id_pasien=<?php echo $pasien['id_pasien']; ?>" onclick="javascript:return confirm('Hapus Data pasien ?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>

  </div>

<?php include 'layout/footer.php'; ?>