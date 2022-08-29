<?php
include "../koneksi.php";
include "fungsi.php";
session_start();

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama_penjaga = $_POST['nama_penjaga'];
    $alamat_penjaga = $_POST['alamat_penjaga'];
    $no_telepon_penjaga = $_POST['no_telepon_penjaga'];
    $email_penjaga = $_POST['email_penjaga'];

    echo $foto_name = $_FILES['foto']['name'];
    echo $foto_temp = $_FILES['foto']['tmp_name'];
    echo $foto_size = $_FILES['foto']['size'];
    
    if ($foto_name == null) {
        $sql = "UPDATE penjaga set nama_penjaga='$nama_penjaga', alamat_penjaga='$alamat_penjaga', no_telepon_penjaga='$no_telepon_penjaga', email_penjaga='$email_penjaga' where id=$id";
        $a = $koneksi->query($sql);
        if ($a === true) {
            echo "<script>alert('Data Penjaga diupdate'); window.location.href=('penjaga.php');</script>";
        } else {
            echo "<script>alert('Data Penjaga diupdate');";
        }
    } else {
        $sql = "UPDATE penjaga set foto='$foto_name', nama_penjaga='$nama_penjaga', alamat_penjaga='$alamat_penjaga', no_telepon_penjaga='$no_telepon_penjaga', email_penjaga='$email_penjaga' where id=$id";
        $a = $koneksi->query($sql);
        if ($a === true) {
            $location = "../assets/img/";
            move_uploaded_file($foto_temp, $location . $foto_name);
            echo "<script>alert('Data Penjaga diupdate'); window.location.href=('penjaga.php');</script>";
        } else {
            // echo "<script>alert('Data Penjaga diupdate'); window.location.href=('penjaga.php');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Admin Zoopedia</title>

    <!-- Bootstrap -->
    <link href="../gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../gentelella-master/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->

    <link href="../gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <style>
    </style>
</head>

<?php if ($_SESSION['level'] == "admin") : ?>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="../index.php" class="site_title"><i class="fa fa-paw"></i> <span>ZOOPEDIA</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="../assets/img/pandu.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo $_SESSION['username'] ?></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home </a>
                                    <li><a href="penjaga.php"><i class="fa fa-user"></i> Penjaga </a>
                                    <li><a href="perilaku.php"><i class="fa fa-edit"></i> Perilaku </a>
                                </ul>
                            </div>


                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                                <li class="nav-item dropdown open" style="padding-left: 15px;">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="../assets/img/pandu.jpg" alt=""><?php echo $_SESSION['username'] ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="../aksi_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <br />
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">

                            <!-- Tambah Penjaga -->
                            <section id="tambah_penjaga">
                                <div id="tambah_penjaga">
                                    <div class="col-sm-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2 style="font-weight: bold;">Update Data Penjaga</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <br />
                                                <form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                    include '../koneksi.php';
                                                    $sql = "SELECT * FROM penjaga where id=$id";
                                                    $a = $koneksi->query($sql);
                                                    while ($b = $a->fetch_array()) {
                                                    ?>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="file" class="form-control" placeholder="<?php echo $b['foto']; ?>" id="foto" name="foto" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Nama Penjaga</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="text" class="form-control" placeholder="<?php echo $b['nama_penjaga']; ?>" id="nama_penjaga" name="nama_penjaga" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Alamat Penjaga</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="text" class="form-control" placeholder="<?php echo $b['alamat_penjaga']; ?>" id="alamat_penjaga" name="alamat_penjaga" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">No. Telepon</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="number" min="1" class="form-control" placeholder="<?php echo $b['no_telepon_penjaga']; ?>" id="no_telepon_penjaga" name="no_telepon_penjaga" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="control-label col-md-3 col-sm-3 ">Email Penjaga</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="text" class="form-control" placeholder="<?php echo $b['email_penjaga']; ?>" id="email_penjaga" name="email_penjaga" required>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <button type="submit" name="update" class="btn btn-success" style="float: right;">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../gentelella-master/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../gentelella-master/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../gentelella-master/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../gentelella-master/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../gentelella-master/vendors/Flot/jquery.flot.js"></script>
        <script src="../gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
        <script src="../gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../gentelella-master/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="../gentelella-master/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="../gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../gentelella-master/vendors/moment/min/moment.min.js"></script>
        <script src="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../gentelella-master/build/js/custom.min.js"></script>

        <!-- Datatables -->
        <script src="../gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
        <script src="../gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
    <?php else : ?>
        <script>
            window.location.href = "../index.php";
        </script>
    <?php endif ?>
    </body>

</html>