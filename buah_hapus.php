<?php include "session.php"?>
<?php
    include "koneksi.php";
    $koneksi->query("DELETE FROM gas where id_buah='$_GET[np]'");
    $koneksi->query("DELETE FROM suhu where id_buah='$_GET[np]'");
    $koneksi->query("DELETE FROM waktu where id_buah='$_GET[np]'");
    $koneksi->query("DELETE FROM buah where id_buah='$_GET[np]'");
    echo "<script>location='index.php?halaman=buah'</script>";
?>