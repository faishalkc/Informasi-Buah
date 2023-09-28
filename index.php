<?php include "session.php"?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi Gas dan Suhu Buah</title>
    <link href='favicon.ico' rel='icon' type='image/x-icon'/>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-footer.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Menu Navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?halaman=home">Sistem Informasi Gas dan Suhu Buah</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["username"] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?halaman=akun">Kelola Akun</a></li>
                  <li><a href="index.php?halaman=logout">Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
      
    <!-- Menu Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                      Menu
                    </div>
                    <div class="list-group">
                        <a href="index.php?halaman=home" class="list-group-item">Dashboard</a>
                        <a href="index.php?halaman=buah" class="list-group-item">Daftar Buah</a>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                      Setting
                    </div>
                    <div class="list-group">
                        <a href="index.php?halaman=akun" class="list-group-item">Kelola Akun</a>
                        <a href="index.php?halaman=logout" class="list-group-item">Log Out</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Start of Body -->
                <?php include "konten.php"?>
                <!-- End of Body -->
            </div>
        </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted" style="text-align:right;">Copyright © 2023 | Created by Muhammad Faishal Hady</p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>