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
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="assets/img/icon.ico"/>
    <link href="css/styles.css" rel="stylesheet" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
                        <h1 class="mt-4">Cetak Laporan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-body">
				<div class="data-tables datatable-dark">
                <table class="table table-bordered" id="exportdata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barcode</th>
                            <th>Status</th>
                            <th>Nama Barang</th>
                            <th>Tipe Barang</th>
                            <th>Nomor PO</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tampilbarang = mysqli_query($conn,"select * from barang");
                            $i = 1;
                            while($data=mysqli_fetch_array($tampilbarang)){
                            $barcode = $data['barcode'];
                            $kondisi = $data['kondisi'];
                            $nama_brg = $data['nama_brg'];
                            $type_brg = $data['type_brg'];
                            $grade = $data['grade'];
                            $tanggal = $data['tanggal'];
                            $id_barang = $data['id_barang']
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?php echo $barcode;?></td>
                            <td><?php echo $kondisi;?></td>
                            <td><?php echo $nama_brg;?></td>
                            <td><?php echo $type_brg;?></td>
                            <td><?php echo $grade;?></td>
                            <td><?php echo $tanggal;?></td>
                        </tr>
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
<script>
$(document).ready(function() {
    $('#exportdata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>