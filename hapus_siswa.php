<?php
include 'koneksi.php';

// Pastikan nis dikirimkan melalui URL
if(isset($_GET["nis"])) {
    $nis = $_GET["nis"];

    // Menonaktifkan pengecekan foreign key
    mysqli_query($connect, 'SET foreign_key_checks = 0');

    // Eksekusi query DELETE
    $result = mysqli_query($connect, "DELETE FROM siswa WHERE nis='$nis'");

    // Mengaktifkan kembali pengecekan foreign key
    mysqli_query($connect, 'SET foreign_key_checks = 1');

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        echo '<script>alert("Berhasil hapus siswa"); window.location.href = "siswa.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus siswa. Error: ' . mysqli_error($connect) . '");</script>';
    }
} else {
    // Tindakan jika nis tidak ditemukan dalam URL
    echo "Parameter nis tidak ditemukan dalam URL.";
}
?>
