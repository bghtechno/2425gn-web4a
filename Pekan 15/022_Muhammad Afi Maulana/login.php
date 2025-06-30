<?php
session_start();
include "koneksi.php"; // Pastikan koneksi.php sesuai dengan database Anda

if (isset($_SESSION['admin'])) {
    header("location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        echo "<script>alert('Username atau password tidak boleh kosong!');</script>";
    } else {
        // Menggunakan prepared statement untuk keamanan
        $stmt = $koneksi->prepare("SELECT * FROM tb_login WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if ($data['level'] == "admin") {
                $_SESSION['admin'] = $data['nim'];
                header("location: index.php");
                exit();
            } else {
                echo "<script>alert('Login gagal, akses hanya untuk admin.');</script>";
            }
        } else {
            echo "<script>alert('Login gagal, username atau password salah.');</script>";
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('uploads/indexbg.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Arial', sans-serif;
}

        .card {
            width: 100%;
            max-width: 400px;
            border: none;
        }

        .card h2 {
            color: #343a40;
            font-weight: bold;
            background: linear-gradient(to right, blue, black); /* Gradien warna */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; /* Membuat gradien terlihat pada teks */
            text-align: center;

        }

        .card .form-label {
            font-weight: 600;
            color: #495057;
        }

        .card input {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .card input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .card button {
            height: 45px;
            font-size: 16px;
            border-radius: 8px;
        }

        .card a {
            color: #007bff;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 rounded-4">
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>