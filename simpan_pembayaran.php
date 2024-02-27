<?php
session_start(); // Mulai sesi

include 'koneksi.php';

if (isset($_POST["submit"])) {
    // Pastikan session id petugas telah diatur
    if (isset($_SESSION['id_petugas'])) {
        $id_petugas = $_SESSION['id_petugas']; // Ambil id_petugas dari session
        $nis = $_POST["nis"];
        $tgl_bayar = $_POST["tgl_bayar"];
        $jumlah_bayar = $_POST["jumlah_bayar"];

        // Query SQL untuk menambahkan data ke tabel pembayaran
        $sql = "INSERT INTO pembayaran (id_petugas, nis, tgl_bayar, jumlah_bayar) 
                VALUES ('$id_petugas', '$nis', '$tgl_bayar', '$jumlah_bayar')";

        if (mysqli_query($connect, $sql)) {
            echo '<script>alert("Berhasil Menambahkan"); window.location.href = "pembayaran.php";</script>';
        } else {
            echo '<script>alert("Gagal Menambahkan");</script>';
        }
    } else {
        // Tindakan jika session id petugas tidak diatur
        echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    }
}
?>