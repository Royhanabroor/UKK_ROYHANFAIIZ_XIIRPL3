<?php
// session_start(); // Mulai sesi

include 'koneksi.php';

if (isset($_POST["submit"])) {
  // Pastikan session id petugas telah diatur
  // if (isset($_SESSION['id_petugas'])) {
    $id_petugas = $_POST['id_petugas']; // Ambil id_petugas dari session
    $nis = $_POST["nis"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jumlah_bayar = $_POST["jumlah_bayar"];

    // Query SQL untuk menambahkan data ke tabel pembayaran
    $sql = "INSERT INTO pembayaran (id_petugas, nis, tgl_bayar, jumlah_bayar) 
                VALUES ('$id_petugas', '$nis', '$tgl_bayar', '$jumlah_bayar')";

    if (mysqli_query($connect, $sql)) {
    echo '<script>alert("Berhasil Menambahkan"); window.location.href = "pembayaran.php";</script>';
} else {
    echo '<script>alert("Gagal Menambahkan. Error: ' . mysqli_error($connect) . '");</script>';
}

  
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Tambah Pembayaran</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            TAMBAH PEMBAYARAN
          </div>
          <div class="card-body">
            <form action="" method="POST">

              <div class="form-group">
                <label>ID Petugas</label>

                <select class="form-select" name="id_petugas" aria-label="Default select example">
                  <option value="" >Pilih ID Petugas</option>
                  <?php
                  // Ambil data ID Petugas dari tabel siswa (contoh pengambilan data dari database)
                  include 'koneksi.php';
                  $query = "SELECT id_petugas FROM login_petugas";
                  $result = mysqli_query($connect, $query);

                  // Periksa apakah query berhasil dieksekusi
                  if ($result) {
                    // Tambahkan opsi untuk setiap NIS dalam elemen select
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id_petugas'] . '">' . $row['id_petugas'] . '</option>';
                    }
                  } else {
                    echo "Gagal mengambil data Id Petugas.";
                  }

                  // Tutup koneksi database
                  mysqli_close($connect);
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>NIS</label>

                <select class="form-select" name="nis" aria-label="Default select example">
                  <option value="" >Pilih NIS</option>
                  <?php
                  // Ambil data NIS dari tabel siswa (contoh pengambilan data dari database)
                  include 'koneksi.php';
                  $query = "SELECT nis FROM siswa";
                  $result = mysqli_query($connect, $query);

                  // Periksa apakah query berhasil dieksekusi
                  if ($result) {
                    // Tambahkan opsi untuk setiap NIS dalam elemen select
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['nis'] . '">' . $row['nis'] . '</option>';
                    }
                  } else {
                    echo "Gagal mengambil data NIS.";
                  }

                  // Tutup koneksi database
                  mysqli_close($connect);
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" value="<?php echo date("Y-m-d"); ?>" class="form-control" />
              </div>

              <div class="form-group">
                <label>Jumlah Bayar</label>
                <input type="text" name="jumlah_bayar" placeholder="Masukkan jumlah Bayar" class="form-control">
              </div>




              <button type="submit" name="submit" class="btn btn-success">SIMPAN</button>
              <button type="reset" class="btn btn-warning">RESET</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>