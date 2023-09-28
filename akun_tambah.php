<?php include "session.php"?>
<?php
    include "koneksi.php";

    function registrasi($data) {
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
        
        if(mysqli_fetch_assoc($result)) {
            echo "<script>alert('Username telah terdaftar')</script>";
            return false;
        }

        if( $password !== $password2 ) {
            echo "<script>alert('Password konfirmasi tidak sesuai')</script>";
            return false;
        };

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO user VALUES('$username', '$password')");

        return mysqli_affected_rows($koneksi);

    }

    if(isset($_POST["save"])) {
        if( registrasi($_POST) > 0 ) {
            echo "<script>alert('User baru telah ditambahkan')</script>";
            echo "<script>location='index.php?halaman=akun'</script>";
        }
        else {
            echo mysqli_error($koneksi);
        }
    };

?>
<div class="panel panel-success">
    <div class="panel-heading">Tambah Akun</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-grup">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-grup">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" class="form-control">
            </div>
            <div style="margin-top:15px;">
                <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                <button class="btn btn-warning" type="submit" name="reset">Reset</button>
                <a href="index.php?halaman=akun" class="btn btn-success">Lihat Kelola Akun</a>
            </div>
        </form>
    </div>
</div>