<?php
session_start();
include '../koneksi.php';
$penjaga_id = $_POST['penjaga_id'];
$sanksi_id = $_POST['sanksi_id'];
// echo $sanksi_id;
// echo $penjaga_id;
$sql = "INSERT INTO perilaku (penjaga_id, sanksi_id) values ('" . $penjaga_id . "','" . $sanksi_id . "')";
if ($koneksi->query($sql) == true) {
    echo "<script>alert('Sanksi Berhasil Terinput');</script>";
    header('location: perilaku.php');
} else {
    echo "ancok";
}
