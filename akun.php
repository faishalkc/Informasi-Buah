<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Kelola Akun</div>
    <div class="panel-body">
    <a href="index.php?halaman=akun_tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Akun</a>
    <table class="table table-bordered">
        <tr>
            <th>Daftar Akun (username)</th>
            <th>Aksi</th>
        </tr>
        <?php
            $data = mysqli_query($koneksi, "SELECT username FROM user");
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>";
                echo $row[0];
                echo "</td>";
                echo "<td>";
                if ($row[0] != $_SESSION["username"] ) {
                    echo "<a href='index.php?halaman=akun_hapus&np=", $row[0],"' style='margin-right:5px;' class='btn btn-danger' onclick='return ConfirmDelete()'>Hapus Akun</a>";
                }
                else {
                    echo "<a style='margin-right:5px;' class='btn btn-info'>Sedang Login</a>";
                }
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
</div>
<script>
    function ConfirmDelete() {
        return confirm("Ingin menghapus ini?");
    }
</script>