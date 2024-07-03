<?php
session_start();
require 'koneksi.php';

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Memeriksa jika metode request adalah POST (form telah disubmit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password = $_POST['password']; // Simpan password tanpa hashing

    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE tbl_users SET username = ?, email = ?, role = ?, password = ? WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $jenis_kelamin, $password, $user_id);

    if ($stmt->execute()) {
        // Memperbarui sesi dengan email baru dan nama pengguna
        $_SESSION['user_id'] = $email;
        $_SESSION['username'] = $username;
        header("Location: dasboard.php");
        exit();
    } else {
        $error = "Terjadi kesalahan saat memperbarui profil.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profil</title>
    <link rel="stylesheet" href="css/stylesupdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Profil</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="update_profile.php" method="post">
            <div class="box-input">
                <i class="fa-regular fa-user"></i>
                <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" placeholder="Username" required>
            </div>
            <div class="box-input">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_id']; ?>" placeholder="Email" required>
            </div>
            <!-- <div class="box-input">
                <i class="fa-regular fa-venus-mars"></i>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if ($_SESSION['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($_SESSION['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div> -->
            <div class="box-input">
                <i class="fa-regular fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.box-input {
    position: relative;
    margin-bottom: 15px;
}

.box-input i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #777;
}

.box-input input,
.box-input select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-left: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.box-input select {
    margin-left: 17px;
}

.btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #5cb85c;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background-color: #4cae4c;
}

.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}

    </style>
</body>
</html>
