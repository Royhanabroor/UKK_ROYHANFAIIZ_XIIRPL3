<?php
include 'koneksi.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index2.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
 
    $sql = "SELECT * FROM login_petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index2.php");
        exit();
    } else {
        echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form method="POST" action="index2.php">
                <h1>Login</h1>
                <hr>
               
                <label for="">Username</label>
                <input type="text" name="username" placeholder="username">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="">Login</button>
                </p>
            </form>
        </div>
        
        </div>
    </div>
</body>

</html>

