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
    $username = htmlspecialchars($_POST['username'] ?? '');  // Sanitasi input
    $password = $_POST['password'] ?? '';
    $ingat    = isset($_POST['ingat']);

    // Cek user valid
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;

        // Simpan cookie jika centang 'ingat saya'
        if ($ingat) {
            setcookie('username', $username, time() + 3600, "/", "", false, true);  // Secure flag
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="checkbox"] {
            margin-top: 10px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login Pengguna</h2>
    
    <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required autofocus>
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="input-group">
            <label>
                <input type="checkbox" name="ingat"> Ingat saya
            </label>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>

</body>
</html>

