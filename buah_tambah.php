<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Tambah Buah</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>ID Buah</label>
                <input type="number" name="id_buah" class="form-control">
            </div>
            <div class="form-grup">
                <label>Nama Buah</label>
                <input type="text" name="nama_buah" class="form-control">
            </div>
            <input type="hidden" name="gas_buah" class="form-control" value="0">
            <input type="hidden" name="suhu_buah" class="form-control" value="0">
            <div style="margin-top:15px;">
                <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                <button class="btn btn-warning" type="submit" name="reset">Reset</button>
                <a href="index.php?halaman=buah" class="btn btn-success">Lihat Data Buah</a>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_POST["save"])) {
        $koneksi->query("INSERT INTO buah (id_buah, nama_buah) VALUES ('$_POST[id_buah]', '$_POST[nama_buah]')");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=buah'</script>";
    }
?>