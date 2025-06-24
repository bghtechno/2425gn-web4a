<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?= $_SESSION['username'] ?>!</h2>
    <?php if (isset($_COOKIE['remember_user'])): ?>
        <p><i>Cookie terdeteksi untuk pengguna: <?= $_COOKIE['remember_user'] ?></i></p>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</body>
</html>
