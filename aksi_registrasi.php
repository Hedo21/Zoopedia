<?php
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $no_telpon = $_POST['no_telpon'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $sql = "INSERT INTO user (username,password,level) values ('".$username."' , '".$password."' , '".$level."')";
    $sql2 = "INSERT INTO pelanggan (username,password,nama,no_telpon,email) values ('".$username."' , '".$password."' , '".$nama."' , '".$no_telpon."' , '".$email."')";
    $a=$koneksi->query($sql);
    $b=$koneksi->query($sql2);
    if ($a == true){
        header('location: login.php');
    } else if ($b == true) {
        header('location: login.php');
    } else {
        echo "error";
    }
?>