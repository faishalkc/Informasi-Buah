<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Daftar Buah</div>
    <div class="panel-body">
    <a href="index.php?halaman=buah_tambah" class="btn btn-primary" style="margin-bottom:15px;">Tambah Buah</a>
    <table class="table table-bordered">
        <tr>
            <th>ID Buah</th>
            <th>Nama Buah</th>
            <th>Aksi</th>
        </tr>
        <?php
            $data = mysqli_query($koneksi, "SELECT * FROM buah");
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>";
                echo $row[0];
                echo "</td>";
                echo "<td style='text-transform: uppercase;'>";
                echo $row[1];
                echo "</td>";
                echo "<td>";
                echo "<a href='index.php?halaman=buah_ubah&np=", $row[0],"' style='margin-right:5px;' class='btn btn-success'>Ubah</a>";
                echo "<a href='index.php?halaman=buah_hapus&np=", $row[0],"' style='margin-right:5px;' class='btn btn-danger' onclick='return ConfirmDelete()'>Hapus</a>";
                echo "<a href='index.php?halaman=data&np=", $row[0],"' style='margin-right:5px;' class='btn btn-info'>Lihat Data Suhu dan Gas</a>";
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