<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Tambah Siswa</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            TAMBAH SISWA
          </div>
          <div class="card-body">
            <?php
            include 'koneksi.php';
            if (isset($_POST["kirim"])) {
              $nis = $_POST["nis"];
              $nama = $_POST["nama"];
              $id_kelas = $_POST["id_kelas"];
              $insert = mysqli_query($connect, "INSERT INTO siswa (nis, nama, id_kelas) values('$nis','$nama','$id_kelas')");

              if ($insert) {
                echo '<script>alert("Berhasil menambah Siswa"); window.location.href = "siswa.php";</script>';
              } else {
                echo '<script>alert("gagal menambah Siswa");</script>';
              }
            }
            ?>

            <form action="" method="POST">

              <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" placeholder="Masukkan nis" class="form-control">
              </div>

              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukkan nama" class="form-control">
              </div>

              <div class="input-group mb-3 mt-4">
                                            <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                                                <select class="form-control" name="id_kelas">
                                                <option value="">Pilih Kelas</option>
                                                    <?php
                                                    $kelas = mysqli_query($connect,"SELECT * FROM kelas");
                                                    while($d = mysqli_fetch_array($kelas)){
                                                        ?>
                                                    <option value="<?php echo $d['id_kelas']; ?>"><?php echo $d['id_kelas']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

              <button type="submit" name="kirim" class="btn btn-success">SIMPAN</button>
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