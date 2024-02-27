<?php
include 'koneksi.php';

// Pastikan id_kelas dikirimkan melalui URL
if (isset($_GET["id_kelas"])) {
    $id_kelas = $_GET["id_kelas"];

    // Menonaktifkan pengecekan foreign key
    mysqli_query($connect, 'SET foreign_key_checks = 0');

    // Eksekusi query DELETE
    $result = mysqli_query($connect, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");

    // Mengaktifkan kembali pengecekan foreign key
    mysqli_query($connect, 'SET foreign_key_checks = 1');

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        echo '<script>alert("Berhasil hapus kelas"); window.location.href = "kelas.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus kelas. Error: ' . mysqli_error($connect) . '");</script>';
    }
} else {
    // Tindakan jika id_kelas tidak ditemukan dalam URL
    echo "Parameter id_kelas tidak ditemukan dalam URL.";
}
?>
