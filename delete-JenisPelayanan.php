<?php

include 'config/app.php';

//Menerima di barang yang dipilih pengguna
$id_kategori = (int)$_GET['id_kategori'];

if (delete_jenisPelayanan($id_kategori) > 0) {
    echo "<script> 
            alert('Jenis Pelayanan Berhasil Dihapus');
            document.location.href = 'view-JenisPelayanan.php';
          </script>";
} else {
    echo "<script> 
            alert('Jenis Pelayanan Gagal Dihapus');
            document.location.href = 'view-JenisPelayanan.php';
          </script>";
}

?>