<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "aplikasi_parkir";
    $koneksi = mysqli_connect($host,$user,$pass,$db_name);

    mysqli_select_db($koneksi, "informasi_buah") or die ("Gagal terhubung ke database");
?>