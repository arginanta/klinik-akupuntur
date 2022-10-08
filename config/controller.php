<?php

function select($query) {
    //Panggil koneksi database
    global $dbconnect;

    $result = mysqli_query($dbconnect, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    return $rows;
}

// Fungsi menambahkan jenis pelayanan
function create_jenisPelayanan($post)
{
    global $dbconnect;

    $jenis_pelayanan   = strip_tags($post['jenis_pelayanan']);
    $biaya_pokok   = strip_tags($post['biaya_pokok']);

    // Query menambahkan data
    $query = "INSERT INTO kategori VALUES(null, '$jenis_pelayanan', '$biaya_pokok', CURRENT_TIMESTAMP())";

    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi mengubah data jenis pelayanan
function update_jenisPelayanan($post)
{
    global $dbconnect;

    $id_kategori        = $post['id_kategori'];
    $jenis_pelayanan   = strip_tags($post['jenis_pelayanan']);
    $biaya_pokok   = strip_tags($post['biaya_pokok']);

    // Query ubah data
    $query = "UPDATE kategori SET jenis_pelayanan = '$jenis_pelayanan', biaya_pokok = '$biaya_pokok' WHERE id_kategori = $id_kategori";

    mysqli_query($dbconnect, $query);
 
    return mysqli_affected_rows($dbconnect);
}

// Fungsi menghapus data jenis pelayanan
function delete_jenisPelayanan($id_kategori)
{
    global $dbconnect;

    //Query hapus data barang
    $query = "DELETE FROM kategori WHERE id_kategori = $id_kategori";

    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function add_rm($post)
{
    global $dbconnect;

    $no_rm         = trim(mysqli_real_escape_string($dbconnect,$_POST['no_rm']));
    $nama_pasien   = trim(mysqli_real_escape_string($dbconnect,$_POST['nama_pasien']));
    $keluhan       = trim(mysqli_real_escape_string($dbconnect,$_POST['keluhan']));
    $terapi        = trim(mysqli_real_escape_string($dbconnect,$_POST['terapi']));
    $kategori      = trim(mysqli_real_escape_string($dbconnect,$_POST['kategori']));

   // Query tambah data
   $query = "INSERT INTO rekammedis (no_rm, nama_pasien, keluhan, terapi, jenis_pelayanan) VALUES ('$no_rm','$nama_pasien', '$keluhan', '$terapi', '$kategori')";
   mysqli_query($dbconnect, $query);

   return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function add_finance($post)
{
    global $dbconnect;

    $no_rm              = trim(mysqli_real_escape_string($dbconnect,$_POST['no_rm']));
    $nama_pasien        = trim(mysqli_real_escape_string($dbconnect,$_POST['nama_pasien']));
    $jenis_pelayanan    = trim(mysqli_real_escape_string($dbconnect,$_POST['jenis_pelayanan']));
    $biaya_pokok        = trim(mysqli_real_escape_string($dbconnect,$_POST['biaya_pokok']));
    $biaya_layanan      = trim(mysqli_real_escape_string($dbconnect,$_POST['biaya_layanan']));
    $total              = trim(mysqli_real_escape_string($dbconnect,$_POST['total']));

   // Query tambah data
   $query = "INSERT INTO finance VALUES (null, '$no_rm', '$nama_pasien', '$jenis_pelayanan', '$biaya_pokok', '$biaya_layanan', '$total', CURRENT_TIMESTAMP())";
   mysqli_query($dbconnect, $query);

   return mysqli_affected_rows($dbconnect);
}

// Fungsi Update Finance
function update_finance($post)
{
    global $dbconnect;

    $no_rm              = trim(mysqli_real_escape_string($dbconnect,$_POST['no_rm']));
    $nama_pasien        = trim(mysqli_real_escape_string($dbconnect,$_POST['nama_pasien']));
    $jenis_pelayanan    = trim(mysqli_real_escape_string($dbconnect,$_POST['jenis_pelayanan']));
    $biaya_pokok        = trim(mysqli_real_escape_string($dbconnect,$_POST['biaya_pokok']));
    $biaya_layanan      = trim(mysqli_real_escape_string($dbconnect,$_POST['biaya_layanan']));
    $total              = trim(mysqli_real_escape_string($dbconnect,$_POST['total']));

   // Query tambah data
//    $query = "UPDATE finance SET  WHERE id_finance = $id_finance";
//    mysqli_query($dbconnect, $query);

   return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function add_rekammedis($post)
{
    global $dbconnect;

    $no_rm          = trim(mysqli_real_escape_string($dbconnect,$_POST['no_rm']));
    $nama_pasien    = trim(mysqli_real_escape_string($dbconnect,$_POST['nama_pasien']));
    $keluhan        = trim(mysqli_real_escape_string($dbconnect,$_POST['keluhan']));
    $terapi         = trim(mysqli_real_escape_string($dbconnect,$_POST['terapi']));
    $kategori       = trim(mysqli_real_escape_string($dbconnect,$_POST['kategori'])); 

   // Query tambah data
   $query = "INSERT INTO rekammedis (no_rm, nama_pasien, keluhan, terapi, id_kategori) VALUES ('$no_rm', '$nama_pasien', '$keluhan', '$terapi', '$kategori')";

   mysqli_query($dbconnect, $query);

   return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function edit_rekammedis($post)
{
    global $dbconnect;

    $no_rm         = trim(mysqli_real_escape_string($dbconnect,$_POST['no_rm']));
    $nama_pasien         = trim(mysqli_real_escape_string($dbconnect,$_POST['nama_pasien']));
    $keluhan         = trim(mysqli_real_escape_string($dbconnect,$_POST['keluhan']));
    $terapi         = trim(mysqli_real_escape_string($dbconnect,$_POST['terapi']));
    $kategori         = trim(mysqli_real_escape_string($dbconnect,$_POST['kategori']));

   // Query tambah data
   $query = "UPDATE rekammedis SET nama_pasien = '$nama_pasien', keluhan = '$keluhan', terapi = '$terapi', id_kategori = '$kategori' WHERE no_rm = $no_rm";
   mysqli_query($dbconnect, $query);

   return mysqli_affected_rows($dbconnect);
}
