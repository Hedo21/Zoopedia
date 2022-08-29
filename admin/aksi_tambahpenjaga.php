<?php
include "../koneksi.php";
include "fungsi.php";
session_start();

$nama_penjaga = $_POST['nama_penjaga'];
$alamat_penjaga = $_POST['alamat_penjaga'];
$no_telepon_penjaga = $_POST['no_telepon_penjaga'];
$email_penjaga = $_POST['email_penjaga'];

echo $foto_name = $_FILES['foto']['name'];
echo $foto_temp = $_FILES['foto']['tmp_name'];
echo $foto_size = $_FILES['foto']['size'];

$sql = "INSERT INTO penjaga (foto, nama_penjaga, alamat_penjaga, no_telepon_penjaga, email_penjaga) 
            VALUES ('$foto_name', '$nama_penjaga', '$alamat_penjaga', '$no_telepon_penjaga', '$email_penjaga')";

$a = $koneksi->query($sql);
if ($a === true) {
    $location = "../assets/img/";
    move_uploaded_file($foto_temp, $location . $foto_name);
    echo "<script>alert('Penjaga Berhasil ditambahkan'); window.location.href=('penjaga.php');</script>";
} else {
    echo "<script>
            alert ('Postingan gagal ditambahkan');
            </script>";
}
