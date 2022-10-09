<?php

include_once('config/dbcon.php');

$id_finance = $_GET["id_finance"];

$query = "DELETE FROM finance WHERE id_finance='" . $id_finance . "'";
if (mysqli_query($dbconnect, $query)) {
    $message = 3;
} else {
    $message = 4;
}
header("Location: view-laporanKeuangan.php?message=" . $message . "");