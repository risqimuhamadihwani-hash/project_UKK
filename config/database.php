<?php
// config/database.php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "penjualan_toko";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>