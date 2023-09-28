<?php include "session.php"?>
<?php
    include "koneksi.php";
    $ambil = $koneksi->query("SELECT * FROM buah WHERE id_buah='$_GET[np]'");
    $edit = $ambil->fetch_assoc();
?>
<div class="panel panel-success">
    <div class="panel-heading">Ubah Data Buah</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>ID Buah</label>
                <input type="number" name="id_buah" class="form-control" value="<?php echo $edit["id_buah"]?>" disabled>
            </div>
            <div class="form-grup">
                <label>Nama Buah</label>
                <input type="text" name="nama_buah" class="form-control" value="<?php echo $edit["nama_buah"]?>">
            </div>
            <div style="margin-top:15px;">
                <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                <button class="btn btn-warning" type="submit" name="reset">Reset</button>
                <a href="index.php?halaman=jbuah" class="btn btn-success">Lihat Data Buah</a>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_POST["save"])) {
        $koneksi->query("UPDATE buah SET nama_buah='$_POST[nama_buah]' WHERE id_buah='$_GET[np]'");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=buah'</script>";
    }
?>