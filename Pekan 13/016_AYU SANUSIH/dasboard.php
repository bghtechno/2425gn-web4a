<?php
session_start();

// Cek apakah sesi login ada
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);  // Sanitasi untuk mencegah XSS
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .message {
            padding: 15px;
            background-color: #e9f7f6;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #28a745;
            font-size: 16px;
        }
        .alert {
            padding: 15px;
            background-color: #f8d7da;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #721c24;
            font-size: 16px;
        }
        .logout-btn {
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard Pengguna</h1>
</header>

<div class="container">
    <h2>Selamat datang, <?= $username ?>!</h2>
    
    <?php
    // Menampilkan cookie jika ada
    if (isset($_COOKIE['username'])) {
        echo "<div class='message'>Anda login sebagai: <strong>{$_COOKIE['username']}</strong> (cookie disimpan)</div>";
    }
    ?>

    <p>Dashboard ini memungkinkan Anda untuk mengelola profil dan pengaturan akun Anda. Pastikan untuk menjaga keamanan akun Anda dengan keluar setelah selesai.</p>
    
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>

