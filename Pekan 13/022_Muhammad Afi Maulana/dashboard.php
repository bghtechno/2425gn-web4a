<?php
session_start();

// Cek sesi login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Selamat datang, <?= htmlspecialchars($username) ?>!</h2>
    <?php
    // Tampilkan cookie jika ada
    if (isset($_COOKIE['username'])) {
        echo "<p>Anda login sebagai: <strong>{$_COOKIE['username']}</strong> (cookie disimpan)</p>";
    }
    ?>
    <a href="logout.php">Logout</a>
</body>
</html>
