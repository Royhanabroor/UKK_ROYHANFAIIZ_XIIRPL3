<?php
include 'koneksi.php';

// Proses pencarian
if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $query = "SELECT * FROM siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR id_kelas LIKE '%$keyword%'";
  $result = mysqli_query($connect, $query);
} else {
  $result = mysqli_query($connect, "SELECT * FROM siswa");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Data Siswa</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Data Siswa
          </div>
          <div class="card-body">
            <a href="tambah_siswa.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
            <a href="siswa.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMPILKAN SEMUA DATA</a>
            <a href="index2.php" class="btn btn-md btn-success" style="margin-bottom: 10px">HOME</a>


            <!-- Formulir Pencarian -->
            <form class="form-inline mb-2" method="GET" action="">
              <input class="form-control mr-2" type="text" name="search" placeholder="Cari Nama Siswa"
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>

            <table class="table table-bordered" id="myTable">
              <thead>
                <tr>
                <tr>
                  <th scope="col">NIS</th>
                  <th scope="col">Nama</th>
                  <th scope="col">id_kelas</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['nis'] ?>
                    </td>
                    <td>
                      <?php echo $row['nama'] ?>
                    </td>
                    <td>
                      <?php echo $row['id_kelas'] ?>
                    </td>

                    <td class="text-center">
                      <a href="edit_siswa.php?id=<?php echo $row['nis'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                      <a href="hapus_siswa.php?nis=<?php echo $row['nis'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</body>

</html>