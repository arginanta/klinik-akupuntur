<?php 

// sesuaikan dengan server anda
$host 	= 'localhost'; // host server
$user 	= 'root';  // username server
$pass 	= ''; // password server, kalau pakai xampp kosongin saja
$dbname = 'db_akupuntur1'; // nama database anda

$dbconnect = mysqli_connect($host, $user, $pass, $dbname);

if($dbconnect-> connect_error) {
    echo "Koneksi Gagal -> ".$dbconnect->connect_error;
}

?>