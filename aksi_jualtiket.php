<?php
session_start();
include 'koneksi.php';
$hari = $_POST['hari'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$harga_total = $_POST['harga_total'];
$sql = "INSERT INTO pesan_tiket (hari,harga,jumlah,harga_total) values ('" . $hari . "','" . $harga . "','" . $jumlah . "','" . $harga_total . "')";
if ($koneksi->query($sql) == true) {
    echo "<script>alert('Berhasil Pesan Tiket'); window.location.href=('index.php');</script>";
} else {
    echo "ancok";
}
