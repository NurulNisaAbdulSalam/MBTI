<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $komen = $_POST['subject'];
    $profil = ['css/img/profile0.jpeg', 'css/img/profile1.jpeg', 'css/img/profile2.jpeg'];
    $random_profile = $profil[array_rand($profil)];

    $stmt = $koneksi->prepare("INSERT INTO ulasan (username, komentar, profile) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $komen, $random_profile);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Ulasan berhasil ditambahkan']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan ulasan: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak valid']);
}

$koneksi->close();
?>