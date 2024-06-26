<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['username'])) {
    // Ambil data pengguna dari sesi
    $username = $_SESSION['username'];
    
    // Ambil data dari form
    $newUsername = $_POST['username'];
    $role = $_POST['role'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $confirmpassword = $_POST["confirm_password"];
    $profilePic = $_FILES['profil']['name'];    
    $targetDir = "css/img/";

    // Check if new password and confirm password match
    if ($newPassword == $confirmPassword) {
        // Handle profile picture upload
        if (!empty($profilePic)) {
            // Hapus file profil lama jika ada, kecuali jika nama file adalah 'blank-profile-picture-973460_960_720.webp'
            $sql = mysqli_query($koneksi, "SELECT profil FROM users WHERE username = '$username'");
            $data = mysqli_fetch_assoc($sql);
            if ($data['profil'] !== 'blank-profile-picture-973460_960_720.webp') {
                // Hapus file lama dari folder css/img/
                unlink($data['profil']);
            }

            // Pindahkan file profil baru
            $targetFile = $targetDir . basename($profilePic);
            move_uploaded_file($_FILES['profil']['tmp_name'], $targetFile);
        } else {
            // Jika gambar tidak diganti, gunakan gambar lama
            $sql = mysqli_query($koneksi, "SELECT profil FROM users WHERE username = '$username'");
            $data = mysqli_fetch_assoc($sql);
            $targetFile = $data['profil'];
        }

        // Update user data in the database
        if (!empty($newPassword)) {
            $updateQuery = "UPDATE users SET username='$newUsername', nama_pengguna='$namaPengguna', password='$newPassword', profil='$targetFile' WHERE username='$username'";
        } else {
            $updateQuery = "UPDATE users SET username='$newUsername', nama_pengguna='$namaPengguna', profil='$targetFile' WHERE username='$username'";
        }

        if (mysqli_query($koneksi, $updateQuery)) {
            $_SESSION['username'] = $newUsername; // Update session username if changed
            header('Location: pengguna.php');
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Password and confirmation password do not match.";
    }
} else {
    echo "No user session found.";
}
?>