<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * from user where username = '$username'
            and password = '$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) == 1) {
    $data = $query->fetch_array();
    if ($data['level'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        echo "<script>alert('Anda Masuk Sebagai Admin'); window.location.href=('admin/dashboard.php');</script>";
    } else if ($data['level'] == "pelanggan") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "pelanggan";
        echo "<script>alert('Anda Masuk Sebagai Pelanggan'); window.location.href=('form_jualtiket.php');</script>";
    } else {
    }
}
