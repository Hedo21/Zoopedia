<?php
session_start();
include '../koneksi.php';
if (isset($_POST['update'])) {
    $e = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total From pesan_tiket");
    $f = mysqli_fetch_assoc($e);
    $g = mysqli_query($koneksi, "SELECT SUM(harga_total) AS total From pesan_tiket");
    $h = mysqli_fetch_assoc($g);

    $jumlah_terjual = $f['total'];
    $pendapatan = $h['total'];

    $sql = "UPDATE penjualan_tiket set jumlah_terjual='$jumlah_terjual', pendapatan='$pendapatan' where id=1 ";
    $koneksi->query($sql);

    echo '<script>
    alert("Data berhasil diupdate");
    </script>
    ';
};
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
                    <!-- top tiles -->
                    <div class="tile_count">
                        <div class="row">
                            <div class="col-sm-4 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Penjualan Tiket</span>
                                <?php
                                include '../koneksi.php';
                                $a = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total From pesan_tiket");
                                $b = mysqli_fetch_assoc($a);
                                ?>
                                <div class="count"><?php echo $b['total']; ?> Tiket</div>
                            </div>
                            <div class="col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Pendapatan</span>
                                <?php
                                include '../koneksi.php';
                                $a = mysqli_query($koneksi, "SELECT SUM(harga_total) AS total From pesan_tiket");
                                $b = mysqli_fetch_assoc($a);
                                ?>
                                <div class="count">Rp. <?php echo $b['total']; ?></div>
                            </div>
                            <div class="col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Pengeluaran</span>
                                <?php
                                include '../koneksi.php';
                                $a = mysqli_query($koneksi, "SELECT SUM(harga_total) AS total From pembelian_pakan");
                                $b = mysqli_fetch_assoc($a);
                                ?>
                                <div class="count">Rp. <?php echo $b['total']; ?></div>
                            </div>
                        </div>
                        <form action="#" method="POST">
                            <button type="submit" action="dashboard.php" type="button" id="update" name="update" class="btn btn-info" style="float: right; margin-right: 30px;">Update</button>
                        </form>
                    </div>
                    <!-- /top tiles -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pengeluaran <small>Pakan</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <!-- Tabel pakan -->
                                        <div class="col-sm-6">
                                            <div class="card-box table-responsive">
                                                <!-- <p class="text-muted font-13 m-b-30">
                                                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                                </p> -->
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Pakan</th>
                                                            <th class="align-middle text-center">Harga Pakan (Rp.)</th>
                                                            <th class="align-middle text-center">Jumlah</th>
                                                            <th class="align-middle text-center">Total (Rp.)</th>
                                                            <th class="align-middle text-center">Penjaga</th>
                                                            <th class="align-middle text-center">Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../koneksi.php';
                                                        $sql = "SELECT id_pembelian_pakan,pakan,harga,jumlah,harga_total, nama_penjaga FROM pembelian_pakan , penjaga where pembelian_pakan.id_penjaga = penjaga.id";
                                                        $a = $koneksi->query($sql);
                                                        while ($b = $a->fetch_array()) { ?>
                                                            <tr>
                                                                <td class="align-middle text-center"><?php echo $b['pakan']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['harga']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['jumlah']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['harga_total']; ?></td>
                                                                <td class="align-middle text-center"><?php echo $b['nama_penjaga']; ?></td>
                                                                <td>
                                                                    <a class="btn btn-warning" href="aksi_delete_pakan.php?id=<?php echo $b['id_pembelian_pakan']; ?>">Hapus</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Pakan -->
                                        <div class="col-sm-6">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2 style="font-weight: bold;">Input Pakan</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <form class="form-horizontal form-label-left" action="aksi_inputpakan.php" method="POST">
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Jenis Pakan</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="text" class="form-control" placeholder="Masukkan Pakan" id="pakan" name="pakan" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Harga (Rp.)</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <input type="number" class="form-control" placeholder="Masukkan Harga" id="harga" name="harga" required>
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
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3 col-sm-3 ">Nama Penjaga</label>
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <select name="id_penjaga" id="id_penjaga" class="select2_single form-control">
                                                                    <?php
                                                                    include '../koneksi.php';
                                                                    $sql = "SELECT * FROM penjaga";
                                                                    $a = $koneksi->query($sql);
                                                                    while ($b = $a->fetch_array()) { ?>
                                                                        <option value="<?php echo $b['id']; ?>"><?php echo $b['nama_penjaga']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                                                        <button type="button" class="btn btn-outline-info" style="float: left;" id="tt">Total</button>
                                                        <button type="reset" class="btn btn-outline-info" style="float: left;">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                $('#example').DataTable();
            });
        </script>
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
            window.location.href = "../index.php";
        </script>
    <?php endif ?>
    </body>

</html>