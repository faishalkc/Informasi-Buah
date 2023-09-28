<?php include "session.php"?>
<?php include "koneksi.php"?>
<?php
$tanggal = mysqli_query($koneksi, "SELECT waktu.tanggal_data FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]'");
$tanggal2 = mysqli_query($koneksi, "SELECT waktu.tanggal_data FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]'");
$suhu = mysqli_query($koneksi, "SELECT waktu.tanggal_data, suhu_buah FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]'");
$gas = mysqli_query($koneksi, "SELECT waktu.tanggal_data, gas_buah FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]'");
?>

<div class="modal fade" id="grafik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Grafik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <b>Tabel Gas</b>
      <canvas id="linechart" width="100" height="40"></canvas>
      <br />
      <b>Tabel Suhu</b>
      <canvas id="linechart2" width="100" height="40"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="js/Chart.js"></script>
<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
            labels: [<?php while ($row = mysqli_fetch_array($tanggal)) {echo '"' . $row[0] . '",';} ?>],
            datasets: [
                  {
                    label: "Gas",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($row = mysqli_fetch_array($gas)) {echo '"' . $row[1] . '",';} ?>]
                  }
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>
<script type="text/javascript">
  var ctx = document.getElementById("linechart2").getContext("2d");
  var data = {
            labels: [<?php while ($row = mysqli_fetch_array($tanggal2)) {echo '"' . $row[0] . '",';} ?>],
            datasets: [
                  {
                    label: "Suhu",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?php while ($row = mysqli_fetch_array($suhu)) {echo '"' . $row[1] . '",';} ?>]
                  }
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>

<table class="table table-bordered">
    <?php 
        $nama = mysqli_query($koneksi, "SELECT * FROM buah WHERE id_buah='$_GET[np]'");
        while ($row = mysqli_fetch_array($nama)) {
            echo "<tr>";
            echo "<td>";
            echo "Nama Buah : ", "<b style='text-transform: uppercase;'>", $row[1], "</b>";
            echo "</td>";
            echo "<td>";
            echo "ID Buah : ", "<b style='text-transform: uppercase;'>", $row[0], "</b>";
            echo "</td>";
            echo "</tr>";
        };
    ?>
</table>

<?php
    echo "<a href='index.php?halaman=data_tambah&np=$_GET[np]' class='btn btn-primary' style='margin-bottom:15px;'>Tambah Data</a>";
?>

<button type="button" class="btn btn-primary" style='margin-bottom:15px;' data-toggle="modal" data-target="#grafik">
  Lihat Grafik
</button>

<table class="table table-bordered">
    <tr>
        <th>Tanggal Data</th>
        <th>Gas</th>
        <th>Suhu</th>
        <th>Waktu Data</th>
        <th>Aksi</th>
    </tr>
    <?php
        $data = mysqli_query($koneksi, "SELECT waktu.tanggal_data, gas_buah, suhu_buah, waktu.jam_data FROM waktu INNER JOIN suhu ON waktu.tanggal_data=suhu.tanggal_data INNER JOIN gas ON waktu.tanggal_data=gas.tanggal_data WHERE gas.id_buah='$_GET[np]'");
        while ($row = mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td>";
            echo $row[0];
            echo "</td>";
            echo "<td>";
            echo $row[1];
            echo " ppm";
            echo "</td>";
            echo "<td>";
            echo $row[2];
            echo " °C";
            echo "</td>";
            echo "<td>";
            echo $row[3];
            echo "</td>";
            echo "<td>";
            echo "<a href='index.php?halaman=data_ubah&time=", $row[0],"&np=", "$_GET[np]","' style='margin-right:5px;' class='btn btn-success'>Ubah</a>";
            echo "<a href='index.php?halaman=data_hapus&time=", $row[0],"&np=", "$_GET[np]","' style='margin-right:5px;' class='btn btn-danger' onclick='return ConfirmDelete()'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
</table>



