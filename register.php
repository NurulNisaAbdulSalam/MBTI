<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbl_users (username, email, role, password) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $jenis_kelamin, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Gagal mendaftar. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/stylesregistrasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Registrasi</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
                <div class="box-input">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" style="color: black!important;" name="nama" placeholder="nama">
                </div>
                <div class="box-input">
                    <i class="fa-solid fa-venus-mars"></i>
                    <select name="jenis_kelamin">
                        <option value="Pilih Gender">Pilih Gender</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="box-input">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" style="color: black!important;" name="email" placeholder="Email">
                </div>
                <div class="box-input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" style="color: black!important;" name="password" placeholder="Password">
                </div>
                <div class="box-input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" style="color: black!important;" name="confirm_password" placeholder="Confirm Password">
                </div>  
                <a href="login.html">
                    <button type="submit" name="Registrasi" class="btn-input">Submit</button>
                </a>
                <div class="bottom">
                    <p>Sudah punya akun?
                        <a href="login.php">Login disini</a>
                    </p>
                </div>
            </form>
    </div>
</body>
</html>