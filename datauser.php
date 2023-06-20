<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DATA USER</title>
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
                            <!-- <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class='far fa-address-card'></i>
                                Tabel User
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary justify-content-end" data-toggle="modal" data-target="#myModal">
                                Tambah User
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tampiluser = mysqli_query($conn,"select * from user");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($tampiluser)){
                                                $nama = $data['nama'];
                                                $email = $data['email'];
                                                $password = $data['password'];
                                                $user_id = $data['user_id']
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$email;?></td>
                                                <td><?=$password;?></td>
                                                <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edituser<?=$user_id;?>">
                                                <i class='far fa-edit'></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser<?=$user_id;?>">
                                                <i class='fas fa-eraser'></i>
                                                </button>
                                                </td>
                                            </tr>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="edituser<?=$user_id;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit User</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                            <input type="text" name="nama" value="<?=$nama;?>" class="form-control">
                                                            <br>
                                                            <input type="text" name="email" value="<?=$email;?>" class="form-control">
                                                            <br>
                                                            <input type="text" name="password" value="<?=$password;?>" class="form-control">
                                                            <br>
                                                            <input type="hidden" name="user_id" value="<?=$user_id;?>" >
                                                            <button type="submit" class="btn btn-warning" name="updateuser">Update</button>
                                                        </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="deleteuser<?=$user_id;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete User</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?=$email;?>?
                                                            <br>
                                                            <br>
                                                            <input type="hidden" name="user_id" value="<?=$user_id;?>" >
                                                            <button type="submit" class="btn btn-danger" name="deleteuser">Delete</button>
                                                        </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
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

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
                <input type="text" name="nama" placeholder="nama" class="form-control">
                <br>
                <input type="text" name="email" placeholder="email" class="form-control">
                <br>
                <input type="text" name="password" placeholder="password" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary" name="tambahuser">Submit</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</html>
