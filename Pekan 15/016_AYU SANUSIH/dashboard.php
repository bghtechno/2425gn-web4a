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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
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
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-logout {
            background-color: #dc3545;
        }
        .btn:hover {
            background-color: #218838;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<header>
    <h1>Selamat datang, <?= htmlspecialchars($username) ?>!</h1>
</header>

<div class="container">
    <p>Anda telah berhasil login. Berikut adalah halaman dashboard Anda.</p>
    
    <a href="crud.php" class="btn">Go to CRUD</a>
    <a href="logout.php" class="btn btn-logout">Logout</a>
</div>

</body>
</html>

