<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            header("Location: dasboard.php");
            exit();
        } else {
            $error = "  Username atau password yang anda masukkan salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/stylesregistrasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="input">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="box-input">
                <i class="fa-regular fa-user"></i>
                <input type="text" style="color: black!important;" name="username" placeholder="Username" required>
            </div>
            <div class="box-input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" style="color: black!important;" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn-input">Login</button>
        </form>
        <div class="bottom">
            <p>Belum punya akun? <a href="register.php">Register disini</a></p>
        </div>
    </div>
</body>
</html>
