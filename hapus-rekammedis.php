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

include 'config/app.php';

//Menerima di mahasiswa yang dipilih pengguna
$id_rm = (int)$_GET['id_rm'];

if (delete_rekammedis($id_rm) > 0) {
    echo "<script> 
            alert('Data Rekam Medis Berhasil Dihapus');
            document.location.href = 'rekammedis.php';
          </script>";
} else {
    echo "<script> 
            alert('Data Rekam Medis Gagal Dihapus');
            document.location.href = 'rekammedis.php';
          </script>";
}

?>