<?php
session_start()
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
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Default Example <small>Users</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <!-- Tabel penjaga -->
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <p class="text-muted font-13 m-b-30" style="margin-left: 30px;">
                                                    Klik tombol dibawah untuk download
                                                </p>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Foto</th>
                                                            <th class="align-middle text-center">Nama Penjaga</th>
                                                            <th class="align-middle text-center">Alamat Penjaga</th>
                                                            <th class="align-middle text-center">No. Telepon</th>
                                                            <th class="align-middle text-center">Email</th>
                                                            <th class="align-middle text-center">Tombol</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../koneksi.php';
                                                        include 'fungsi.php';
                                                        $sql = "SELECT * FROM penjaga";
                                                        $a = $koneksi->query($sql);
                                                        while ($b = $a->fetch_array()) { ?>
                                                            <tr>
                                                                <td style="text-align: center;"><img class="img-thumbnail" src="../assets/img/<?php echo $b['foto']; ?>" alt="gambar<?php echo $b['foto']; ?>" width="100px" height="100px"></td>
                                                                <td class="align-middle text-center"><?php echo $b['nama_penjaga']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['alamat_penjaga']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['no_telepon_penjaga']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['email_penjaga']; ?></td>
                                                                <td class="align-middle text-center">
                                                                    <a class="btn btn-info" href="penjaga_update.php?id=<?php echo $b['id']; ?>">Update</a>
                                                                    <a class="btn btn-warning" href="aksi_delete.php?id=<?php echo $b['id']; ?>">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <a class="btn btn-success" style="float: right;" href="penjaga_tambah.php">Tambah Penjaga</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
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
                $('#example').DataTable({});
            });
        </script>
    <?php else : ?>
        <script>
            window.location.href = "../index.php";
        </script>
    <?php endif ?>
    </body>

</html>