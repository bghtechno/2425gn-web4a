<?php
session_start();
include 'users.php';

// Jika sudah login, langsung redirect
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $ingat    = isset($_POST['ingat']);

    // Cek user valid
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;

        // Simpan cookie jika centang 'ingat saya'
        if ($ingat) {
            setcookie('username', $username, time() + 3600); // 1 jam
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login Pengguna</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="checkbox" name="ingat"> Ingat saya<br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
