<?php include "session.php"?>
<?php include "koneksi.php"?>
<div class="panel panel-success">
    <div class="panel-heading">Tambah Data</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>ID Buah</label>
                <?php echo "<input type='text' name='id_buah' class='form-control' value='$_GET[np]' disabled>" ?>
            </div>
            <div class="form-grup">
                <label>Tanggal Data</label>
                <input type="date" name="tanggal_data" class="form-control">
            </div>
            <div class="form-grup">
                <label>Jam Data</label>
                <input type="time" name="jam_data" class="form-control">
            </div>
            <div class="form-grup">
                <label>Gas Buah</label>
                <input type="number" name="gas_buah" class="form-control">
            </div>
            <div class="form-grup">
                <label>Suhu Buah</label>
                <input type="number" name="suhu_buah" class="form-control">
            </div>
            <div style="margin-top:15px;">
                <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                <button class="btn btn-warning" type="submit" name="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_POST["save"])) {
        $koneksi->query("INSERT INTO waktu VALUES ('$_GET[np]', '$_POST[tanggal_data]', '$_POST[jam_data]')");
        $koneksi->query("INSERT INTO gas VALUES ('$_GET[np]', '$_POST[gas_buah]', '$_POST[tanggal_data]')");
        $koneksi->query("INSERT INTO suhu VALUES ('$_GET[np]', '$_POST[suhu_buah]', '$_POST[tanggal_data]')");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=data&np=$_GET[np]'</script>";
    }
?>