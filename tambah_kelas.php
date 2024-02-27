<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Kelas</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH KELAS
            </div>
            <div class="card-body">
              <?php
              include 'koneksi.php';

              if (isset($_POST["kirim"])) {
                $id_kelas = $_POST["id_kelas"];
                $nama_kelas = $_POST["nama_kelas"];
                $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

                $insert_kelas = mysqli_query($connect, "INSERT INTO kelas(id_kelas,nama_kelas, kompetensi_keahlian) 
              values ('$id_kelas','$nama_kelas', '$kompetensi_keahlian')");
              if ($insert_kelas) {
                echo "<script>alert('Berhasil membuat kelas!')</script>";
                if ($insert_kelas) {
                  echo "<script>alert('Berhasil membuat kelas!')</script>";
                  header("Location: kelas.php"); // Mengarahkan ke kelas.php setelah insert berhasil
                  exit(); // Pastikan tidak ada output lain sebelum header
              } else {
                  echo "<script>alert('Gagal membuat kelas!')</script>";
              }
            }
          }
              ?>

              <form action="" method="POST">
                
                <div class="form-group">
                  <label>Id Kelas</label>
                  <input type="text" name="id_kelas" placeholder="Masukkan Id Kelas" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" name="nama_kelas" placeholder="Masukkan Nama kelas" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <input type="text" name="kompetensi_keahlian" placeholder="Masukkan Kompetensi Keahlian" class="form-control">
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