<?php include "session.php"?>
<?php
    include "koneksi.php";
    $ambil = $koneksi->query("SELECT waktu.tanggal_data, gas_buah, suhu_buah, waktu.jam_data FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]' AND waktu.tanggal_data='$_GET[time]'");
    $edit = $ambil->fetch_assoc();
?>
<div class="panel panel-success">
    <div class="panel-heading">Ubah Data</div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-grup">
                <label>ID Buah</label>
                <input type='text' name='id_buah' class='form-control' value='<?php echo "$_GET[np]" ?>' disabled>
            </div>
            <div class="form-grup">
                <label>Tanggal Data</label>
                <input type="date" name="tanggal_data" class="form-control" value="<?php echo $edit["tanggal_data"]?>" disabled>
            </div>
            <div class="form-grup">
                <label>Jam Data</label>
                <input type="time" name="jam_data" class="form-control" value="<?php echo $edit["jam_data"]?>" disabled>
            </div>
            <div class="form-grup">
                <label>Gas Buah</label>
                <input type="number" name="gas_buah" class="form-control" value="<?php echo $edit["gas_buah"]?>">
            </div>
            <div class="form-grup">
                <label>Suhu Buah</label>
                <input type="number" name="suhu_buah" class="form-control" value="<?php echo $edit["suhu_buah"]?>">
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
        $koneksi->query("UPDATE gas SET gas_buah='$_POST[gas_buah]' WHERE tanggal_data='$_GET[time]'");
        $koneksi->query("UPDATE suhu SET suhu_buah='$_POST[suhu_buah]' WHERE tanggal_data='$_GET[time]'");
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        echo "<script>location='index.php?halaman=data&np=$_GET[np]'</script>";
    }
?>