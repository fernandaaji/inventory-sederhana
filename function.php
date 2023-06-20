<?php
session_start();

// membuat koneksi ke databse
$conn = mysqli_connect("localhost","root","","inventory_db");

// menambah barang baru
if(isset($_POST['tambahuser'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addtotable = mysqli_query($conn,"insert into user (nama, email, password) values('$nama', '$email', '$password')");
    if($addtotable){
        header('location:index.php');
    } else{
        echo 'gagal';
        header('location:index.php');
    }
}

// update user
if(isset($_POST['updateuser'])){
    $user_id = $_POST['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = mysqli_query($conn,"update user set nama='$nama', email='$email', password='$password' where user_id='$user_id'");
    if($update){
        header('location:datauser.php');
    } else{
        echo 'gagal';
        header('location:datauser.php');
    }
                                                
}

// delete user
if(isset($_POST['deleteuser'])){
    $user_id = $_POST['user_id'];

    $hapus = mysqli_query($conn, "delete from user where user_id='$user_id'");
    if($hapus){
        header('location:datauser.php');
    } else{
        echo 'gagal';
        header('location:datauser.php');
    }
}

// update barang
if(isset($_POST['updatebarang'])){
    $id_barang = $_POST['id_barang'];
    $barcode = $_POST['barcode'];
    $kondisi = $_POST['kondisi'];
    $nama_brg = $_POST['nama_brg'];
    $type_brg = $_POST['type_brg'];
    $grade = $_POST['grade'];
    $tanggal = $_POST['tanggal'];

    $update = mysqli_query($conn,"update barang set barcode='$barcode', kondisi='$ekondisimail', nama_brg='$nama_brg', type_brg='$type_brg', grade='$grade', tanggal='$tanggal' where id_barang='$id_barang'");
    if($update){
        header('location:databarang.php');
    } else{
        echo 'gagal';
        header('location:databarang.php');
    }
                                                
}

// delete barang
if(isset($_POST['deletebarang'])){
    $id_barang = $_POST['id_barang'];

    $hapus = mysqli_query($conn, "delete from barang where id_barang='$id_barang'");
    if($hapus){
        header('location:databarang.php');
    } else{
        echo 'gagal';
        header('location:databarang.php');
    }
}
?>