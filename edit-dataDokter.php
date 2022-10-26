<?php

$title = 'Edit Data Dokter';

include_once('includes/header.php');

//Fetch data from the table Dokter
$query = mysqli_query($dbconnect, "SELECT * FROM dokter WHERE id_dokter='" . $_GET["id_dokter"] . "'");
$data_dokter = mysqli_fetch_assoc($query);

//jika tombol Save di tekan alankan script berikut
if (isset($_POST['ubah'])) {
    if (edit_dataDokter($_POST) > 0) {
        echo "<script>
              alert('Data Dokter Berhasil Ditambahkan');
              document.location.href = 'view-dataDokter.php';
            </script>";
    } else {
        echo "<script>
              alert('Data Dokter Gagal Ditambahkan');
              document.location.href = 'view-dataDokter.php';
            </script>";
    }
}
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Data Dokter</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Dokter
                            <a href="view-dataDokter.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="row">
                                <input type="hidden" name="id_dokter" class="form-control" value="<?= $_GET['id_dokter']; ?>">
                                <input type="hidden" name="fotoLama" value="<?= $data_dokter['foto']; ?>">

                                <div class="col-md-12 mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama_dokter" class="form-control" placeholder="Masukkan Nama Dokter" value="<?= $data_dokter['nama_dokter']; ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk" class="form-control" required>
                                        <option value="<?= $data_dokter['jk']; ?>"><?= $data_dokter['jk']; ?></option>
                                        <option value="#">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Spesialis</label>
                                    <input type="text" name="spesialis" class="form-control" placeholder="Masukkan Spesialis Dokter " value="<?= $data_dokter['spesialis']; ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Alamat</label>
                                    <input type="text" placeholder="Masukkan alamat" name="alamat" class="form-control" value="<?= $data_dokter['alamat']; ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Nomor Telpon</label>
                                    <input type="number" placeholder="Masukkan nomor telpon" name="no_hp" class="form-control" value="<?= $data_dokter['no_hp']; ?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="file">Foto</label><br>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
                                        <label class="custom-file-label" for="file">Pilih ulang gambar...</label>
                                    </div>
                                    <div class="mt-1">
                                        <img src="assets/img/<?= $data_dokter['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>

<!-- preview image -->
<script>
  function previewImg() {
    const gambar = document.querySelector('#foto');
    const gambarLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    gambarLabel.textContent = gambar.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
</script>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>