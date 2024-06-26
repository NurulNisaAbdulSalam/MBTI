<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $sql = "UPDATE tbl_users SET username = ?, role = ?, password = ? WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $username, $role, $password, $email);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Gagal mengupdate data user.";
    }
} else {
    $email = $_GET['email'];
    $sql = "SELECT * FROM tbl_users WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="edit_user.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>">
            
            <label for="username">Nama:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            
            <label for="role">Jenis Kelamin:</label>
            <select id="role" name="role" required>
                <option value="Laki-laki" <?php echo $user['role'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo $user['role'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            
            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        <a href="admin_dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</body>
</html>