<?php
    session_start();
    include "koneksi.php";

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

        if( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if ( password_verify($password, $row["password"]) ) {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit;
            };
        }

        $error = true;
    };
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Informasi Gas dan Suhu Buah</title>
    <link href='favicon.ico' rel='icon' type='image/x-icon'/>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h2>SISTEM INFORMASI GAS DAN SUHU BUAH</h2>
                <hr>
                <p>Silakan Login</p>
                <?php if(isset($error)) : ?>
                <p style="color:red;font-style:italic;">Username atau password salah</p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        <div class="right">
            <img src="logo.png">
        </div>
    </div>
</body>
</html>