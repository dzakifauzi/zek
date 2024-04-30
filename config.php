<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_users";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Check koneksi
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}
?>