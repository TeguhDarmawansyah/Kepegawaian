<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../admin/login.php");
    exit();
}

include('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_departemen = mysqli_real_escape_string($koneksi, $_POST['nama_departemen']);

    // Validasi input
    if (empty($nama_departemen)) {
        $_SESSION['error'] = "Nama departemen tidak boleh kosong!";
        header("Location: ../admin/departemen.php");
        exit();
    }

    // Cek apakah departemen sudah ada
    $cek_query = "SELECT * FROM departemen WHERE nama_departemen = '$nama_departemen'";
    $cek_result = mysqli_query($koneksi, $cek_query);
    
    if (mysqli_num_rows($cek_result) > 0) {
        $_SESSION['error'] = "Departemen sudah ada!";
        header("Location: ../admin/departemen.php");
        exit();
    }

    // Tambah departemen
    $query = "INSERT INTO departemen (nama_departemen) VALUES ('$nama_departemen')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION['success'] = "Departemen berhasil ditambahkan!";
        header("Location: ../admin/departemen.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal menambahkan departemen: " . mysqli_error($koneksi);
        header("Location: ../admin/departemen.php");
        exit();
    }
} else {
    header("Location: ../admin/departemen.php");
    exit();
}
?>