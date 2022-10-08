<?php

// delete-prosesdatapasien.php

include_once('config/dbcon.php');

$no_rm = $_GET["no_rm"];

$query = "DELETE FROM pasien WHERE no_rm='" . $no_rm . "'";
if (mysqli_query($dbconnect, $query)) {
    $message = 3;
} else {
    $message = 4;
}
header("Location: view-datapasien.php?message=" . $message . "");