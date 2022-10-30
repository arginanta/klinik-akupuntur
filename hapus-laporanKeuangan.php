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
$id_finance = (int)$_GET['id_finance'];

if (delete_keuangan($id_finance) > 0) {
    echo "<script> 
            alert('Laporan Keuangan Berhasil Dihapus');
            document.location.href = 'laporan-keuangan.php';
          </script>";
} else {
    echo "<script> 
            alert('Laporan Keuangan Gagal Dihapus');
            document.location.href = 'laporan-keuangan.php';
          </script>";
}

?>