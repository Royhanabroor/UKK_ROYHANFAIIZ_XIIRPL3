<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Pembayaran</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Data Pembayaran
            </div>
            
            <div class="card-body">
              <a href="tambah_pembayaran.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <a href="pembayaran.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMPILKAN SEMUA DATA</a>
              <a href="index2.php" class="btn btn-md btn-success" style="margin-bottom: 10px">HOME</a>


              <!-- Formulir Pencarian -->
              <form method="GET" action="">
                <div class="form-group">
                  <input type="text" name="search" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">CARI</button>
              </form>

              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Id Pembayaran</th>
                    <th scope="col">Id Petugas</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Tgl Bayar</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('koneksi.php');
                      
                      // Ubah query berdasarkan apakah ada kata kunci pencarian
                      if (isset($_GET['search'])) {
                          $keyword = $_GET['search'];
                          $query = "SELECT * FROM pembayaran WHERE id_pembayaran LIKE '%$keyword%' OR id_petugas LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR tgl_bayar LIKE '%$keyword%' OR jumlah_bayar LIKE '%$keyword%'";
                      } else {
                          $query = "SELECT * FROM pembayaran";
                      }

                      $result = mysqli_query($connect, $query);

                      while($row = mysqli_fetch_array($result)){
                  ?>

                  <tr>
                      <td><?php echo $row['id_pembayaran'] ?></td>
                      <td><?php echo $row['id_petugas'] ?></td>
                      <td><?php echo $row['nis'] ?></td>
                      <td><?php echo $row['tgl_bayar'] ?></td>
                      <td><?php echo $row['jumlah_bayar'] ?></td>
                      <td class="text-center">
                        <a href="edit_pembayaran.php?id_pembayaran=<?php echo  $row['id_pembayaran'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="hapus_pembayaran.php?id_pembayaran=<?php echo $row['id_pembayaran'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
