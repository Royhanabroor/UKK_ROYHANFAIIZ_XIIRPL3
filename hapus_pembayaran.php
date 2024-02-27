<?php
include 'koneksi.php';

// Pastikan id_kelas dikirimkan melalui URL
if(isset($_GET["id_pembayaran"])) {
    $id_pembayaran = $_GET["id_pembayaran"];
    
    // Eksekusi query DELETE
    $connect = mysqli_query($connect, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");

    // Periksa apakah query berhasil dieksekusi
    if ($connect) {
        echo '<script>alert("Berhasil hapus pembayaran"); window.location.href = "pembayaran.php";</script>';
    } else {
        echo '<script>alert("gagal hapus pembayaran");</script>';
    }
} else {
    // Tindakan jika id_kelas tidak ditemukan dalam URL
    echo "Parameter id_pembayaran tidak ditemukan dalam URL.";
}
?>