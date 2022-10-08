<?php

// edit-processdatapasien.php

include_once('config/dbcon.php');

if (count($_POST) > 0) {
    // ambil no_rm dari pasien sebagai penanda
    $no_rm = $_POST["no_rm"];

    $last_visit = $_POST["last_visit"];
    $nama_pasien = $_POST["nama_pasien"];
    $nik = $_POST["nik"];
    $alamat = $_POST["alamat"];
    $usia = $_POST["usia"];
    $jk = $_POST["jk"];
    $no_hp = $_POST["no_hp"];

    $query =

        // update form data from the database
        "UPDATE pasien set no_rm='" .
        $no_rm .
        "', last_visit='" .
        $last_visit .
        "', nama_pasien='" .
        $nama_pasien .
        "', nik='" .
        $nik .
        "', alamat='" .
        $alamat .
        "', usia='" .
        $usia .
        "', jk='" .
        $jk .
        "', no_hp='" .
        $no_hp .
        "' WHERE no_rm='" .
        $no_rm .
        "'"; 

    if (mysqli_query($dbconnect, $query)) {
        $message = 2;
    } else {
        $message = 4;
    }
}
header("Location: view-datapasien.php?message=" . $message . "");