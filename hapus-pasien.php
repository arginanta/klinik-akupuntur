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
$id_pasien = (int)$_GET['id_pasien'];

if (delete_pasien($id_pasien) > 0) {
    echo "<script> 
            alert('Data Pasien Berhasil Dihapus');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script> 
            alert('Data Pasien Gagal Dihapus');
            document.location.href = 'index.php';
          </script>";
}

?>