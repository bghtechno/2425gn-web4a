<?php
// Memulai sesi PHP
session_start();
// Menyertakan file koneksi untuk database
include "koneksi.php";

// Memeriksa apakah admin sudah login
if (isset($_SESSION['admin'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #6c63ff, #4a47a3);
            color: #fff;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: 600;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar ul li a:hover {
            background: #ffd700;
            color: #4a47a3;
        }

        /* Hero Section */
        .hero {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .hero .btn {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 500;
            color: #4a47a3;
            background: #ffd700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition:  all 0.3s ease-in-out;
            text-decoration: none; /* Menghapus garis bawah */
        }

        .hero .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            background: rgba(0, 0, 0, 0.4);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">M Afi Maulana</div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Welcome to Struktur DPM</h1>
            <p>Mengisi data dengan mudah</p>
            <a href="isian_anggota.php" class="btn">Daftar</a>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2024 Struktur DPM. All Rights Reserved.
    </footer>
</body>
</html>

<?php
} else {
    header("Location: login.php");
    exit(); // Hentikan eksekusi setelah redirect
}
?>
