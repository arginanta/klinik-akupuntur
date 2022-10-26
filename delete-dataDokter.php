<?php

include 'config/app.php';

//Menerima di barang yang dipilih pengguna
$id_dokter = (int)$_GET['id_dokter'];

if (delete_dataDokter($id_dokter) > 0) {
    echo "<script> 
            alert('Data Dokter Berhasil Dihapus');
            document.location.href = 'view-dataDokter.php';
          </script>";
} else {
    echo "<script> 
            alert('Data Dokter Gagal Dihapus');
            document.location.href = 'view-dataDokter.php';
          </script>";
}

?>