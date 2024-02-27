<?php
session_start();
include "koneksi.php";

$pass = ($_POST['password']);
$username = mysqli_escape_string($connect,$_POST['username']);
$passwword = mysqli_escape_string($connect,$pass);

$login = mysqli_query($connect, "SELECT * FROM login_petugas where username = '$username' and password ='$passwword'");

$data = mysqli_fetch_array ($login);

if ($data){
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    header("location:index2.php");
}else{
    echo "<script>
    alert ('Maaf , login anda gagal , pastikan username dan password anda benar');
    document.location='login.php';
    </script>";
}
?>