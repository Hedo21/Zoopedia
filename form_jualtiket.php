<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pesan Tiket</title>

  <!-- Bootstrap -->
  <link href="gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="gentelella-master/build/css/custom.min.css" rel="stylesheet">

  <style>
    body {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/img/bg-masthead.jpg');
      background-size: cover;
    }

    .mar {
      margin-top: 210px;
      opacity: 95%;
    }
  </style>
</head>

<body>
  <?php if ($_SESSION['username']) : ?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container px-4 px-lg-5">
        <!-- <a class="navbar-brand" href="home.php">Home</a> -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['username'])) : ?>
              <li class="nav-item"><a class="nav-link text-uppercase" href="admin/dashboard.php" style="font-weight: bolder;"><?php echo $_SESSION['username'] ?></a></li>
              <li class="nav-item"><a class="nav-link" href="aksi_logout.php" style="font-weight: bolder;">Logout</a></li>
            <?php else : ?>
              <li class="nav-item"><a class="nav-link" href="login.php" style="font-weight: bolder;">Login</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
    <center>
      <!-- page content -->
      <div class="baris">
        <div class="col-md-3"></div>
        <div class="col-md-6 mar">
          <div class="x_panel">
            <div class="x_title">
              <h2 style="font-weight: bold;">Pesan Tiket</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" action="aksi_jualtiket.php" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Hari</label>
                  <div class="col-md-9 col-sm-9 ">
                    <select class="select2_single form-control" name="hari" id="hari" tabindex="-1" required>
                      <option></option>
                      <option name="senin">Senin</option>
                      <option name="selasa">Selasa</option>
                      <option name="rabu">Rabu</option>
                      <option name="kamis">Kamis</option>
                      <option name="jumat">Jumat</option>
                      <option name="sabtu">Sabtu</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Harga</label>
                  <div class="col-md-9 col-sm-9 ">
                    <select class="select2_single form-control" id="harga" name="harga" tabindex="-1" required>
                      <option></option>
                      <option value="30000" name="angka1">Rp. 30.000</option>
                      <option value="50000" name="angka2">Rp. 50.000</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                  <div class="col-md-9 col-sm-9 ">
                    <input type="number" min="1" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" required>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-3 col-sm-3 ">Total Harga (Rp.)</label>
                  <div class="col-md-9 col-sm-9 ">
                    <input type="number" class="form-control" placeholder="Total Harga" id="total" name="harga_total" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                <button type="button" class="btn btn-info" style="float: right;" id="tt">Total</button>
                <a href="index.php" class="btn btn-outline-info" style="float: left;">Kembali</a>
                <button type="reset" class="btn btn-outline-warning" style="float: left;">Reset</button>
              </form>
            </div>
            <table style="float: left;">
              <tr>
                <td> Rp. 30.000</td>
                <td> : </td>
                <td> Untuk tiket masuk kebun binatang</td>
              </tr>
              <tr>
                <td> Rp. 50.000</td>
                <td> : </td>
                <td> Untuk tiket masuk kebun binatang dan tiket untuk masuk kolam renang</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
      <!-- /page content -->
    </center>
    <script>
      const total = () => {
        var tombol = document.getElementById("tt");
        tombol.addEventListener('click', () => {
          var harga = parseInt(document.getElementById("harga").value);
          var jumlah = parseInt(document.getElementById("jumlah").value);
          var total = harga * jumlah;
          console.log(total);
          document.getElementById("total").value = total;
        });
      }
      total();
    </script>
  <?php else : ?>
    <script>
      alert("Harap login terlebih dahulu");
      window.location = 'login.php';
    </script>
  <?php endif ?>
  <!-- jQuery -->
  <script src="gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="gentelella-master/vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="gentelella-master/vendors/iCheck/icheck.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="gentelella-master/vendors/moment/min/moment.min.js"></script>
  <script src="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="gentelella-master/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="gentelella-master/vendors/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="gentelella-master/vendors/starrr/dist/starrr.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="gentelella-master/build/js/custom.min.js"></script>

</body>

</html>