<?php

function select($query)
{
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

    $no_rm         = trim(mysqli_real_escape_string($dbconnect, $_POST['no_rm']));
    $nama_pasien   = trim(mysqli_real_escape_string($dbconnect, $_POST['nama_pasien']));
    $keluhan       = trim(mysqli_real_escape_string($dbconnect, $_POST['keluhan']));
    $terapi        = trim(mysqli_real_escape_string($dbconnect, $_POST['terapi']));
    $kategori      = trim(mysqli_real_escape_string($dbconnect, $_POST['kategori']));

    // Query tambah data
    $query = "INSERT INTO rekammedis (no_rm, nama_pasien, keluhan, terapi, jenis_pelayanan) VALUES ('$no_rm','$nama_pasien', '$keluhan', '$terapi', '$kategori')";
    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function add_finance($post)
{
    global $dbconnect;

    $no_rm              = trim(mysqli_real_escape_string($dbconnect, $_POST['no_rm']));
    $nama_pasien        = trim(mysqli_real_escape_string($dbconnect, $_POST['nama_pasien']));
    $jenis_pelayanan    = trim(mysqli_real_escape_string($dbconnect, $_POST['jenis_pelayanan']));
    $biaya_pokok        = trim(mysqli_real_escape_string($dbconnect, $_POST['biaya_pokok']));
    $biaya_layanan      = trim(mysqli_real_escape_string($dbconnect, $_POST['biaya_layanan']));
    $total              = trim(mysqli_real_escape_string($dbconnect, $_POST['total']));

    // Query tambah data
    $query = "INSERT INTO finance VALUES (null, '$no_rm', '$nama_pasien', '$jenis_pelayanan', '$biaya_pokok', '$biaya_layanan', '$total', CURRENT_TIMESTAMP())";
    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi Update Finance
function update_finance($post)
{
    global $dbconnect;

    $no_rm              = trim(mysqli_real_escape_string($dbconnect, $_POST['no_rm']));
    $nama_pasien        = trim(mysqli_real_escape_string($dbconnect, $_POST['nama_pasien']));
    $jenis_pelayanan    = trim(mysqli_real_escape_string($dbconnect, $_POST['jenis_pelayanan']));
    $biaya_pokok        = trim(mysqli_real_escape_string($dbconnect, $_POST['biaya_pokok']));
    $biaya_layanan      = trim(mysqli_real_escape_string($dbconnect, $_POST['biaya_layanan']));
    $total              = trim(mysqli_real_escape_string($dbconnect, $_POST['total']));

    // Query tambah data
    //    $query = "UPDATE finance SET  WHERE id_finance = $id_finance";
    //    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function add_rekammedis($post)
{
    global $dbconnect;

    $no_rm          = trim(mysqli_real_escape_string($dbconnect, $_POST['no_rm']));
    $nama_pasien    = trim(mysqli_real_escape_string($dbconnect, $_POST['nama_pasien']));
    $keluhan        = trim(mysqli_real_escape_string($dbconnect, $_POST['keluhan']));
    $terapi         = trim(mysqli_real_escape_string($dbconnect, $_POST['terapi']));
    $kategori       = trim(mysqli_real_escape_string($dbconnect, $_POST['kategori']));

    // Query tambah data
    $query = "INSERT INTO rekammedis (no_rm, nama_pasien, keluhan, terapi, id_kategori) VALUES ('$no_rm', '$nama_pasien', '$keluhan', '$terapi', '$kategori')";

    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah rekam medis
function edit_rekammedis($post)
{
    global $dbconnect;

    $no_rm         = trim(mysqli_real_escape_string($dbconnect, $_POST['no_rm']));
    $nama_pasien   = trim(mysqli_real_escape_string($dbconnect, $_POST['nama_pasien']));
    $keluhan       = trim(mysqli_real_escape_string($dbconnect, $_POST['keluhan']));
    $terapi        = trim(mysqli_real_escape_string($dbconnect, $_POST['terapi']));
    $kategori      = trim(mysqli_real_escape_string($dbconnect, $_POST['kategori']));

    // Query tambah data
    $query = "UPDATE rekammedis SET nama_pasien = '$nama_pasien', keluhan = '$keluhan', terapi = '$terapi', id_kategori = '$kategori' WHERE no_rm = $no_rm";
    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi tambah data dokter
function create_dataDokter($post)
{
    global $dbconnect;

    // Filter input dari serangan XSS bisa menggunakan htmlspecialchars() / strip_tags()
    $nama_dokter        = strip_tags($post['nama_dokter']);
    $jk                 = strip_tags($post['jk']);
    $spesialis          = strip_tags($post['spesialis']);
    $alamat             = strip_tags($post['alamat']);
    $no_hp              = strip_tags($post['no_hp']);
    $foto               = upload_file();

    // Check upload foto
    if (!$foto) {
        return false;
    }

    // Query tambah data
    $query = "INSERT INTO dokter VALUES(null, '$nama_dokter', '$jk', '$spesialis', '$alamat', '$foto', '$no_hp', CURRENT_TIMESTAMP())";

    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi mengupload file
function upload_file()
{
    $namaFile         = $_FILES['foto']['name'];
    $ukuranFile      = $_FILES['foto']['size'];
    $error            = $_FILES['foto']['error'];
    $tmpName          = $_FILES['foto']['tmp_name'];

    // Check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png', 'webp'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // Check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // Pesan gagal
        echo "<script> 
                    alert('Format File Tidak Valid');
                    document.location.href = 'tambah-dataDokter.php';
                </script>";
        die();
    }

    // Check ukuran file 2 mb
    if ($ukuranFile > 2048000) {
        // Pesan gagal
        echo "<script> 
                    alert('Ukuran File Max 2 MB');
                    document.location.href = 'tambah-dataDokter.php';
                </script>";
        die();
    }

    // Generate nama file baru (Ex: malware.exe -> 78as65d76as5)
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // Pindahkan ke folder local 
    move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru); // assets/img/jafeq789w70q.jpg
    return $namaFileBaru;
}

// Fungsi tambah data dokter
function edit_dataDokter($post)
{
    global $dbconnect;

    // Filter input dari serangan XSS bisa menggunakan htmlspecialchars() / strip_tags() 
    $id_dokter          = strip_tags($post['id_dokter']);
    $nama_dokter        = strip_tags($post['nama_dokter']);
    $jk                 = strip_tags($post['jk']);
    $spesialis          = strip_tags($post['spesialis']);
    $alamat             = strip_tags($post['alamat']);
    $no_hp              = strip_tags($post['no_hp']);
    $fotoLama           = strip_tags($post['fotoLama']);

    // Check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    $query = "UPDATE dokter SET nama_dokter = '$nama_dokter', jk = '$jk', spesialis = '$spesialis', alamat = '$alamat', no_hp = '$no_hp', foto = '$foto' WHERE id_dokter = $id_dokter";
    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}

// Fungsi menghapus data dokter
function delete_dataDokter($id_dokter)
{
    global $dbconnect;

    // ambil foto sesuai data yang dipilih
    $foto = select("SELECT * FROM dokter WHERE id_dokter = $id_dokter")[0];
    unlink("assets/img/". $foto['foto']);

    //Query hapus data dokter
    $query = "DELETE FROM dokter WHERE id_dokter = $id_dokter";

    mysqli_query($dbconnect, $query);

    return mysqli_affected_rows($dbconnect);
}
