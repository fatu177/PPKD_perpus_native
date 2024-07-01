<?php
$host_koneksi     = "localhost";
$username_koneksi = "root";
$password_koneksi = "";
$database_koneksi = "db_perpus";

$koneksi = mysqli_connect(
    $host_koneksi,
    $username_koneksi,
    $password_koneksi,
    $database_koneksi
);

// jika koneksi berhasil
if ($koneksi) {
    mysqli_select_db($koneksi, $database_koneksi);
} else {
    echo "Koneksi Gagal";
}
