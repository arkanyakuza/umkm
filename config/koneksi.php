<?php
$koneksi = mysqli_connect("localhost", "root", "", "erp_umkm");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
