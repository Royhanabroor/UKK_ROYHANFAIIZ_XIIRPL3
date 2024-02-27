<?php
include 'koneksi.php';

// Proses pencarian
if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $query = "SELECT * FROM kelas WHERE id_kelas LIKE '%$keyword%' OR nama_kelas LIKE '%$keyword%' OR kompetensi_keahlian LIKE '%$keyword%'";
} else {
  $query = "SELECT * FROM kelas";
}

$result = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Data Kelas</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Data Kelas
          </div>
          <div class="card-body">
            <a href="tambah_kelas.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
            <a href="kelas.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMPILKAN SEMUA DATA</a>
            <a href="index2.php" class="btn btn-md btn-success" style="margin-bottom: 10px">HOME</a>

 
            <!-- Formulir Pencarian -->
            <form class="form-inline mb-2">
              <input class="form-control mr-2" type="text" name="search" placeholder="Cari Nama Kelas">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>

            <table class="table table-bordered" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Id Kelas</th>
                  <th scope="col">Nama Kelas</th>
                  <th scope="col">Kompetensi Keahlian</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['id_kelas'] ?></td>
                    <td><?php echo $row['nama_kelas'] ?></td>
                    <td><?php echo $row['kompetensi_keahlian'] ?></td>
                    <td class="text-center">
                      <a href="edit_kelas.php?id=<?php echo $row['id_kelas'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                      <a href="hapus_kelas.php?id_kelas=<?php echo $row['id_kelas'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">HAPUS</a>

                    </td>
                  </tr>
                <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</body>

</html>
