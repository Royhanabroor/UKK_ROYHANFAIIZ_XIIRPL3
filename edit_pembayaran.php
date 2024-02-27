<?php
include 'koneksi.php';

// Pastikan id_pembayaran dikirimkan melalui URL
if (isset($_GET["id_pembayaran"])) {
    $id_pembayaran = $_GET["id_pembayaran"];

    // Lakukan query untuk mengambil data pembayaran dengan id_pembayaran yang sesuai
    $result = mysqli_query($connect, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");

    // Pastikan query berhasil dieksekusi
    if ($result) {
        // Pastikan Anda menggunakan mysqli_fetch_assoc untuk mengambil satu baris data dari hasil query
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle jika query gagal dieksekusi
        echo "Error: " . mysqli_error($connect);
    }
} else {
    // Handle jika id_pembayaran tidak dikirimkan melalui URL
    echo "ID Pembayaran tidak ditemukan dalam parameter URL.";
}

// Lakukan query untuk mendapatkan daftar NIS siswa
$query_siswa = mysqli_query($connect, "SELECT * FROM siswa");

// Inisialisasi variabel untuk menyimpan opsi NIS
$nis_options = '';

// Pastikan query berhasil dieksekusi
if ($query_siswa) {
    // Lakukan loop untuk setiap baris hasil query
    while ($row_siswa = mysqli_fetch_assoc($query_siswa)) {
        // Tambahkan opsi NIS ke dalam variabel
        $nis_options .= '<option value="' . $row_siswa['nis'] . '"';
        // Jika NIS pada baris saat ini sama dengan NIS pada data pembayaran, tandai opsi sebagai terpilih
        if ($row_siswa['nis'] == $row['nis']) {
            $nis_options .= ' selected';
        }
        $nis_options .= '>' . $row_siswa['nis'] . '</option>';
    }
} else {
    // Handle jika query gagal dieksekusi
    echo "Error: " . mysqli_error($connect);
}

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $nis = $_POST["nis"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jumlah_bayar = $_POST["jumlah_bayar"];

    // Lakukan query untuk memperbarui data pembayaran
    $query = mysqli_query($connect, "UPDATE pembayaran SET nis='$nis', tgl_bayar='$tgl_bayar', jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran='$id_pembayaran'");

    // Pastikan query berhasil dieksekusi
    if ($query) {
        echo '<script>alert("Berhasil memperbarui data"); window.location.href = "pembayaran.php";</script>';
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary">
        <a class="navbar-brand text-light text-center fw-bold">Edit Pembayaran</a>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="mt-4" action="" method="post">
                    <?php if (isset($row)) { ?>
                        <div class="form-group">
                            <label>NIS</label>
                            <select class="form-control" name="nis">
                                <?php echo $nis_options; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input type="text" class="form-control" name="tgl_bayar" value="<?php echo $row['tgl_bayar']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" class="form-control" name="jumlah_bayar" value="<?php echo $row['jumlah_bayar']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <?php } else { ?>
                        <p>Data pembayaran tidak ditemukan.</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>