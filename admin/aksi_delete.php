<?php
include "../koneksi.php";
include "fungsi.php";
session_start();

$id = $_GET['id'];
$sql = "DELETE FROM penjaga where id = $id";
$a = $koneksi->query($sql);

if ($a === true) {
    echo "<script>alert('Penjaga Berhasil dihapus'); window.location.href=('penjaga.php');</script>";
} else {
    echo "<script>alert('Postingan gagal dihapus'); window.location.href=('penjaga.php');</script>";
}
