<?php

include_once('config/dbcon.php');

// $id_rekammedis = $_GET["id_rekammedis"];
$id_rekammedis = (int)$_GET['id_rekammedis'];

$query = "DELETE FROM rekammedis WHERE id_rekammedis = $id_rekammedis";
if (mysqli_query($dbconnect, $query)) {
    $message = 3;
} else {
    $message = 4;
}
header("Location: view-rekamMedis.php?message=" . $message . "");