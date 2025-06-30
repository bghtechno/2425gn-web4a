<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "struktur_dpm";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}


