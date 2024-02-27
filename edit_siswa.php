<<?php

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: siswa.php");
    exit();
}

include 'koneksi.php';
if (isset($_POST["submit"])) {
    $nis = $_POST['nis'];
    $nama = $_POST["nama"];
    $id_kelas = $_POST["id_kelas"];
    $insert = mysqli_query($connect, "UPDATE siswa SET nama= '$nama', id_kelas= '$id_kelas' WHERE nis='$nis'");

    if ($insert) {
        echo '<script>alert("Berhasil Edit"); window.location.href = "siswa.php";</script>';
    } else {
        echo '<script>alert("Gagal Edit");</script>';
    }
}

$id_siswa = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM siswa WHERE nis='$id_siswa'");
$row = mysqli_fetch_assoc($result);

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Siswa</title>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        UPDATE SISWA
                    </div>
                    <div class="card-body">
                    <form class="mt-4" action="" method="post">
                <div class="form-group">
                    <label>NIS</label>
                    <input class="form-control" value="<?php echo $row['nis'] ?>" name="nis" type="text"
                        rows="3" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <textarea class="form-control" name="nama" id="exampleFormControlTextarea1"
                        rows="3"><?php echo $row['nama']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Id Kelas</label>
                    <select class="form-control" name="id_kelas">
                                                <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['id_kelas']; ?></option>
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
                            <button type="submit" name="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></script>
</body>

</html>
