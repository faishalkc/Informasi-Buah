<?php include "session.php"?>
<?php
    include "koneksi.php";
    $koneksi->query("DELETE FROM gas where tanggal_data='$_GET[time]'");
    $koneksi->query("DELETE FROM suhu where tanggal_data='$_GET[time]'");
    $koneksi->query("DELETE FROM waktu where tanggal_data='$_GET[time]'");
    echo "<script>location='index.php?halaman=data&np=$_GET[np]'</script>";
?>