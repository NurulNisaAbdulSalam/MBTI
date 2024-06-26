<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "DELETE FROM tbl_users WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Gagal menghapus user.";
    }
} else {
    header("Location: admin_dashboard.php");
    exit();
}
?>