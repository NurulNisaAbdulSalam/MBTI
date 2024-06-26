<?php
$servername = "localhost";
$database = "db_test";
$username = "root";
$password = "";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi Gagal : " . mysqli_connect_error());
} else {
    echo "";
}
