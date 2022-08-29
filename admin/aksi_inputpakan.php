<?php
session_start();
include '../koneksi.php';
$pakan = $_POST['pakan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$id_penjaga = $_POST['id_penjaga'];
$harga_total = $_POST['harga_total'];
$sql = "INSERT INTO pembelian_pakan (pakan,harga,jumlah,id_penjaga,harga_total) values ('" . $pakan . "','" . $harga . "','" . $jumlah . "','" . $id_penjaga . "','" . $harga_total . "')";
if ($koneksi->query($sql) == true) {
    echo "<script>alert('Pakan Berhasil Ditambahkan'); window.location.href=('dashboard.php');</script>";
} else {
    echo "ancok";
}
