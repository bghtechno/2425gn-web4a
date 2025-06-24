<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['username'] = $username;

    // Jika centang 'ingat saya', simpan cookie
    if (isset($_POST['remember'])) {
        setcookie('remember_user', $username, time() + (86400 * 7)); // 7 hari
    }

    header("Location: dashboard.php");
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
}
exit();
?>
