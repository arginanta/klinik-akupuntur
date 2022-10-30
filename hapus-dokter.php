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
$id_dokter = (int)$_GET['id_dokter'];

if (delete_dokter($id_dokter) > 0) {
    echo "<script> 
            alert('Data Dokter Berhasil Dihapus');
            document.location.href = 'dokter.php';
          </script>";
} else {
    echo "<script> 
            alert('Data Dokter Gagal Dihapus');
            document.location.href = 'dokter.php';
          </script>";
}

?>