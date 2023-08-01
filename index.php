<?php
include 'koneksi.php';
include 'tgl_indo.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "kodepj.php";
session_start();
if ($_SESSION['user']) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Penjualan Barang</title>
        <!-- Favicon-->

        <link rel="shortcut icon" href="tbmjb.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <body class="theme-teal">
        <script src="js/axios.min.js"></script>
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="index.php">PENJUALAN - BARANG </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->

                        <!-- #END# Call Search -->
                        <!-- Notifications -->

                        <!-- #END# Notifications -->
                        <!-- Tasks -->

                        <!-- #END# Tasks -->

                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="images/user.png" width="50" height="50" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['nama']?></div>
                        <!-- <div class="email">john.doe@example.com</div> -->
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                                <li role="seperator" class="divider"></li>

                                <li role="seperator" class="divider"></li>
                                <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="index.php">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>

                        <?php
                            if($_SESSION['level']=="karyawan"){
                        ?>
                        <li>
                            <a href="?page=barang">
                                <i class="material-icons">view_module</i>
                                <span>Barang</span>
                            </a>
                        </li>
                        <?php
                            }else{
                        ?>


                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">local_library</i>
                                <span>Data Master</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="?page=konsumen">
                                        <i class="material-icons">supervisor_account</i>
                                        <span>Konsumen</span>
                                    </a>
                                </li>


                                <li>
                                    <a href="?page=supplier">
                                        <i class="material-icons">supervisor_account</i>
                                        <span>Supplier</span>
                                    </a>
                                </li>


                                <li>
                                    <a href="?page=barang">
                                        <i class="material-icons">view_module</i>
                                        <span>Barang</span>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">business_center</i>
                                <span>Transaksi Pembelian</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="?page=pembelian">
                                        <i class="material-icons">shopping_cart</i>
                                        <span>Pembelian</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="?page=laporan_pembelian">
                                        <i class="material-icons">picture_as_pdf</i>
                                        <span>Laporan Pembelian</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <?php
                            }
                        ?>


                        <li>
                            <?php
                                if($_SESSION['level']=="karyawan"){
                            ?>
                            <a href="?page=user&aksi=edit&id=<?=$_SESSION['user']?>">
                            <?php
                                }else{
                            ?>
                            <a href="?page=user">
                            <?php
                                }
                            ?>
                                <i class="material-icons">person</i>
                                <span>User</span>
                            </a>
                        </li>

                        <li class="active">

                            <ul class="ml-menu">

                            </ul>
                        </li>
                        <li>

                            <ul class="ml-menu">

                            </ul>
                        </li>
                        <li>

                            <ul class="ml-menu">

                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        <?php echo tgl_indo(date('Y-m-d')); ?> | Repost by <a href='' title='' target='_blank'>Fariski Baihaqqi</a>

                    </div>

                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->

            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <?php
                    $page = $_GET['page'];
                    $aksi = $_GET['aksi'];


                    if ($page == "barang") {
                        if ($aksi == "") {
                            include "page/barang/barang.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/barang/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/barang/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/barang/delete.php";
                        }
                    }

                    if ($page == "supplier") {
                        if ($aksi == "") {
                            include "page/supplier/supplier.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/supplier/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/supplier/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/supplier/delete.php";
                        }
                    }

                    if ($page == "konsumen") {
                        if ($aksi == "") {
                            include "page/konsumen/konsumen.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/konsumen/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/konsumen/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/konsumen/delete.php";
                        }
                    }

                    if ($page == "penjualan") {
                        if ($aksi == "") {
                            include "page/penjualan/penjualan.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/penjualan/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/penjualan/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/penjualan/delete.php";
                        }
                    }

                    if ($page == "pembelian") {
                        if ($aksi == "") {
                            include "page/pembelian/pembelian.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/pembelian/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/pembelian/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/pembelian/delete.php";
                        }
                    }

                    if ($page == "user") {
                        if ($aksi == "") {
                            include "page/user/user.php";
                        }

                        if ($aksi == "tambah") {
                            include "page/user/tambah.php";
                        }

                        if ($aksi == "edit") {
                            include "page/user/edit.php";
                        }

                        if ($aksi == "delete") {
                            include "page/user/delete.php";
                        }
                    }


                    if ($page == "laporan_penjualan") {
                        if ($aksi == "") {
                            include "page/laporan_penjualan/laporan.php";
                        }
                        if ($aksi == "view-detail") {
                            include "page/laporan_penjualan/view-detail.php";
                        }
                    }

                    if ($page == "laporan_pembelian") {
                        if ($aksi == "") {
                            include "page/laporan_pembelian/laporan_pembelian.php";
                        }
                        if ($aksi == "view") {
                            include "page/laporan_pembelian/view.php";
                        }
                    }

                    if ($page == "") {
                        include "home.php";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>


        <!-- Jquery DataTable Plugin Js -->
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

        <!-- Custom Js -->



        <!-- Custom Js -->
        <script src="js/admin.js"></script>

        <script src="js/pages/tables/jquery-datatable.js"></script>


        <!-- Demo Js -->
        <script src="js/demo.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:login.php");
}

?>