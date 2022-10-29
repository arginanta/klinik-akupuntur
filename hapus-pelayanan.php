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

//Menerima di pelayanan yang dipilih pengguna
$id_pelayanan = (int)$_GET['id_pelayanan'];

if (delete_pelayanan($id_pelayanan) > 0) {
    echo "<script> 
            alert('Pelayanan Berhasil Dihapus');
            document.location.href = 'pelayanan.php';
          </script>";
} else {
    echo "<script> 
            alert('Pelayanan Gagal Dihapus');
            document.location.href = 'pelayanan.php';
          </script>";
}

?>