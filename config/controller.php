<?php

function select($query)
{
  //Panggil koneksi database
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Fungsi menambahkan data dokter
function create_dokter($post)
{
  global $db;

  // Filter input dari serangan XSS bisa menggunakan htmlspecialchars() / strip_tags()
  $id_dokter          = strip_tags($post['id_dokter']);
  $nama_dokter        = strip_tags($post['nama_dokter']);
  $spesialis          = strip_tags($post['spesialis']);
  $alamat             = strip_tags($post['alamat']);
  $no_telp            = strip_tags($post['no_telp']);

  // Query tambah data 
  $query = "INSERT INTO dokter VALUES('$id_dokter', '$nama_dokter', '$spesialis', '$alamat', '$no_telp')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// fungsi mengubah data dokter
function update_dokter($post)
{
  global $db;

  // ambil id_dokter dari dokter sebagai penanda
  $id_dokter     = $post['id_dokter'];
  $nama_dokter   = $post['nama_dokter'];
  $spesialis     = $post['spesialis'];
  $alamat        = $post['alamat'];
  $no_telp       = $post['no_telp'];

  // query ubah data
  $query =
  "UPDATE dokter set nama_dokter='" .
  $nama_dokter .
  "', nama_dokter='" .
  $nama_dokter .
  "', spesialis='" .
  $spesialis .
  "', alamat='" .
  $alamat .
  "', no_telp='" .
  $no_telp .
  "' WHERE id_dokter='" .
  $id_dokter .
  "'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menghapus data dokter
function delete_dokter($id_dokter)
{
  global $db;

  //Query hapus data dokter
  $query = "DELETE FROM dokter WHERE id_dokter =  '$_GET[id]'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menambahkan data pasien
function create_pasien($post)
{
  global $db;

  $id_pasien     = $post['id_pasien'];
  $nama_pasien   = $post['nama_pasien'];
  $nik           = $post['nik'];
  $alamat        = $post['alamat'];
  $usia          = $post['usia'];
  $jenis_kelamin = $post['jenis_kelamin'];
  $no_telp       = $post['no_telp'];

  // query tambah data
  $query = "INSERT INTO pasien VALUES('$id_pasien', '$nama_pasien', '$nik', '$usia', '$jenis_kelamin', '$alamat', '$no_telp')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// fungsi mengubah data pasien
function update_pasien($post)
{
  global $db;

  // ambil id_pasien dari pasien sebagai penanda
  $id_pasien     = $post['id_pasien'];
  $nama_pasien   = $post['nama_pasien'];
  $nik           = $post['nik'];
  $alamat        = $post['alamat'];
  $usia          = $post['usia'];
  $jenis_kelamin = $post['jenis_kelamin'];
  $no_telp       = $post['no_telp'];

  // query ubah data
  $query =
    "UPDATE pasien set nama_pasien='" .
    $nama_pasien .
    "', nik='" .
    $nik .
    "', alamat='" .
    $alamat .
    "', usia='" .
    $usia .
    "', jenis_kelamin='" .
    $jenis_kelamin .
    "', no_telp='" .
    $no_telp .
    "' WHERE id_pasien='" .
    $id_pasien .
    "'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menghapus data pasien
function delete_pasien($id_pasien)
{
  global $db;

  //Query hapus data pasien
  $query = "DELETE FROM pasien WHERE id_pasien = '$_GET[id]'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menambahkan data pelayanan
function create_pelayanan($post)
{
  global $db;

  $jenis_pelayanan   = strip_tags($post['jenis_pelayanan']);
  $biaya_pokok       = strip_tags($post['biaya_pokok']);

  // Query menambahkan data
  $query = "INSERT INTO pelayanan (`id_pelayanan`, `jenis_pelayanan`, `biaya_pokok`) VALUES(null, '$jenis_pelayanan', '$biaya_pokok')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi mengubah data Pelayanan
function update_pelayanan($post)
{
  global $db;

  $id_pelayanan      = strip_tags($post['id_pelayanan']);
  $jenis_pelayanan   = strip_tags($post['jenis_pelayanan']);
  $biaya_pokok       = strip_tags($post['biaya_pokok']);

  // Query ubah data
  $query = "UPDATE pelayanan SET jenis_pelayanan = '$jenis_pelayanan', biaya_pokok = '$biaya_pokok' WHERE id_pelayanan = $id_pelayanan";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menghapus data Pelayanan
function delete_pelayanan($id_pelayanan)
{
  global $db;

  //Query hapus data pelayanan
  $query = "DELETE FROM pelayanan WHERE id_pelayanan = '$_GET[id]'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menambahkan data rekam medis
function create_rekammedis($post)
{
  global $db;

  $id_rm         = $post['id_rm'];
  $pasien        = $post['pasien'];
  $keluhan       = $post['keluhan'];
  $dokter        = $post['dokter'];
  $terapi        = $post['terapi'];
  $pelayanan     = $post['pelayanan'];
  $tgl_periksa   = $post['tgl_periksa'];

  // query tambah data
  $query = "INSERT INTO rekammedis (id_rm, id_pasien, keluhan, id_dokter, terapi, id_pelayanan, tgl_periksa) VALUES ('$id_rm', '$pasien', '$keluhan', '$dokter', '$terapi', '$pelayanan', '$tgl_periksa')";
  
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi menghapus data rekammedis
function delete_rekammedis($id_rm)
{
  global $db;

  //Query hapus data rm
  $query = "DELETE FROM rekammedis WHERE id_rm = '$_GET[id]'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi tambah finance
function create_finance($post)
{
    global $db;

    $id_rm              = trim(mysqli_real_escape_string($db, $_POST['id_rm']));
    $nama_pasien        = trim(mysqli_real_escape_string($db, $_POST['nama_pasien']));
    $jenis_pelayanan    = trim(mysqli_real_escape_string($db, $_POST['jenis_pelayanan']));
    $biaya_pokok        = trim(mysqli_real_escape_string($db, $_POST['biaya_pokok']));
    $biaya_layanan      = trim(mysqli_real_escape_string($db, $_POST['biaya_layanan']));
    $total              = trim(mysqli_real_escape_string($db, $_POST['total']));

    // Query tambah data
    $query = "INSERT INTO finance VALUES (null, '$id_rm', '$nama_pasien', '$jenis_pelayanan', '$biaya_pokok', '$biaya_layanan', '$total', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi menghapus data keuangan
function delete_keuangan()
{
  global $db;

  //Query hapus data finance
  $query = "DELETE FROM finance WHERE id_finance = '$_GET[id]'";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Fungsi tambah akun
function create_akun($post) 
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']); 
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);
    
    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Query menambahkan data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi ubah akun
function update_akun($post) 
{
    global $db;

    $id_akun    = strip_tags($post['id_akun']);
    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']); 
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);
    
    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Query menambahkan data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    //Query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}