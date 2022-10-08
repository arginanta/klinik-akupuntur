<?php

// add-procesdatapasien.php

include_once('config/dbcon.php');

if (isset($_POST['add_datapasien']) > 0) {
    $no_rm = $_POST["no_rm"];
    $last_visit = $_POST["last_visit"];
    $nama_pasien = $_POST["nama_pasien"];
    $nik = $_POST["nik"];
    $alamat = $_POST["alamat"];
    $usia = $_POST["usia"];
    $jk = $_POST["jk"];
    $no_hp = $_POST["no_hp"];
    $created = date("Y-m-d");

    $query = "INSERT INTO pasien (no_rm, last_visit, nama_pasien, nik, alamat, usia, jk, no_hp, created) VALUES ('$no_rm', '$last_visit', '$nama_pasien', '$nik', '$alamat', '$usia', '$jk', '$no_hp', '$created')";

    if (mysqli_query($dbconnect, $query)) {
        $message = 1;
    } else {
        $message = 4;
    }
}

header("Location: view-datapasien.php?message=" . $message . "");