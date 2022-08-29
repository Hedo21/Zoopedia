<?php
include "../koneksi.php";
include "fungsi.php";
session_start();

$id = $_GET['id'];
$sql = "DELETE FROM pembelian_pakan where id_pembelian_pakan = $id";
$a = $koneksi->query($sql);

if ($a === true) {
    echo "<script>alert('Pakan Berhasil dihapus'); window.location.href=('dashboard.php');</script>";
} else {
    echo "<script>alert('Pakan gagal dihapus'); window.location.href=('dashboard.php');</script>";
}
