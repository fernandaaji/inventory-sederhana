<?php
require 'function.php';
require 'cek.php';
    $user = mysqli_query($conn, "SELECT * FROM user");
    $data = array ();
    while (($row = mysqli_fetch_array($user)) != null){
        $data[] = $row;
        }
        $cont = count ($data);
        $jml = "".$cont;

    $barang = mysqli_query($conn, "SELECT * FROM barang");
    $data = array ();
    while (($row = mysqli_fetch_array($barang)) != null){
        $data2[] = $row;
        }
        $cont2 = count ($data2);
        $jml2 = "".$cont2;
    ?>
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DASHBOARD</title>
        <link rel="shortcut icon" href="assets/img/icon.ico"/>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">YITA ABADI</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-home'></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="datauser.php">
                                <div class="sb-nav-link-icon"><i class='far fa-address-card'></i></div>
                                Data User
                            </a>
                            <a class="nav-link" href="databarang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table mr-1"></i></div>
                                Data Barang
                            </a>
                            </a>
                            <a class="nav-link" href="export.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-print'></i></div>
                                Cetak Laporan
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-sign-out-alt'></i></div>
                                Logout 
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-sm-2">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center">DATA USER</div>
                                    <div class="card-body text-center"><h3><?php echo $jml;?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="datauser.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body text-center">DATA BARANG</div>
                                    <div class="card-body text-center"><h3><?php echo $jml2;?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="databarang.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
