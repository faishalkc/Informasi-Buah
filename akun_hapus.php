<?php include "session.php"?>
<?php
    include "koneksi.php";
    $koneksi->query("DELETE FROM user where username='$_GET[np]'");
    echo "<script>location='index.php?halaman=akun'</script>";
?>