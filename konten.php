<?php
    if (isset($_GET['halaman'])) {
        if ($_GET['halaman']=='home') {
            include "home.php";
        }
        elseif ($_GET['halaman']=='buah') {
            include "buah.php";
        }
        elseif ($_GET['halaman']=='buah_tambah') {
            include "buah_tambah.php";
        }
        elseif ($_GET['halaman']=='buah_hapus') {
            include "buah_hapus.php";
        }
        elseif ($_GET['halaman']=='buah_ubah') {
            include "buah_ubah.php";
        }
        elseif ($_GET['halaman']=='data') {
            include "data.php";
        }
        elseif ($_GET['halaman']=='data_tambah') {
            include "data_tambah.php";
        }
        elseif ($_GET['halaman']=='data_hapus') {
            include "data_hapus.php";
        }
        elseif ($_GET['halaman']=='data_ubah') {
            include "data_ubah.php";
        }
        elseif ($_GET['halaman']=='akun') {
            include "akun.php";
        }
        elseif ($_GET['halaman']=='akun_tambah') {
            include "akun_tambah.php";
        }
        elseif ($_GET['halaman']=='akun_hapus') {
            include "akun_hapus.php";
        }
        elseif ($_GET['halaman']=='logout') {
            include "logout.php";
        }
        else{
            echo "Halaman Tidak Ditemukan";
        }
    }
    else{
        include "home.php";
    }
?>