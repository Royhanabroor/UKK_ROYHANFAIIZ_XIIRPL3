<?php
include 'koneksi.php';

$id_kelas = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["kirim"])) {
    $new_id_kelas = $_POST["id_kelas"]; // Ambil id_kelas baru dari formulir
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    $update = mysqli_query($connect, "UPDATE kelas SET 
        id_kelas='$new_id_kelas',
        nama_kelas='$nama_kelas',
        kompetensi_keahlian='$kompetensi_keahlian'
        WHERE id_kelas='$id_kelas'");

    if ($update) {
        echo '<script>alert("Berhasil edit kelas"); window.location.href = "kelas.php";</script>';
    } else {
        echo '<script>alert("Gagal edit kelas: ' . mysqli_error($connect) . '");</script>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Kelas</title>
</head>

<body>  
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        UPDATE KELAS
                    </div>
                    <div class="card-body">
                    <form class="mt-4" action="" method="post">
                    <div class="form-group">
                    <label>Id Kelas</label>
                    <input class="form-control" value="<?php echo $row['id_kelas'] ?>" name="id_kelas" type="text"
                        rows="3" readonly>
                </div>
                <div class="form-group">
                    <label>Nama kelas</label>
                    <textarea class="form-control" name="nama_kelas" id="exampleFormControlTextarea1"
                        rows="3"><?php echo $row['nama_kelas']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Kompetensi keahlian</label>
                    <textarea class="form-control" name="kompetensi_keahlian" id="exampleFormControlTextarea1"
                        rows="3"><?php echo $row['kompetensi_keahlian']; ?></textarea>
                </div>
                            <button type="submit" name="kirim" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></script>
</body>

</html>
