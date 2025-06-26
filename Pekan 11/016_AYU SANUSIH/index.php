<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Pengguna</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f3;
            padding: 30px;
        }

        .form-container {
            background-color: white;
            max-width: 450px;
            margin: auto;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .message {
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }

        .error { background-color: #f8d7da; color: #721c24; }
        .success { background-color: #d4edda; color: #155724; }

        .profile {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 15px;
            margin-top: 20px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Daftar Akun Baru</h2>

    <?php
    $feedback = '';
    $showProfile = false;
    $user = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputNama = trim($_POST['input_nama']);
        $inputEmail = trim($_POST['input_email']);

        if ($inputNama === '' || $inputEmail === '') {
            $feedback = '<div class="message error">Semua field wajib diisi!</div>';
        } elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            $feedback = '<div class="message error">Format email tidak valid.</div>';
        } else {
            $user = [
                'nama' => htmlspecialchars($inputNama),
                'email' => htmlspecialchars($inputEmail)
            ];
            $feedback = '<div class="message success">Pendaftaran berhasil!</div>';
            $showProfile = true;
        }
    }
    ?>

    <?= $feedback ?>

    <form method="post">
        <label for="input_nama">Nama Lengkap:</label>
        <input type="text" id="input_nama" name="input_nama" placeholder="Masukkan nama Anda" required>

        <label for="input_email">Email:</label>
        <input type="email" id="input_email" name="input_email" placeholder="Masukkan email aktif" required>

        <button type="submit">Kirim Pendaftaran</button>
    </form>

    <?php if ($showProfile): ?>
        <div class="profile">
            <strong>Data Pendaftar:</strong><br>
            Nama: <?= $user['nama'] ?><br>
            Email: <?= $user['email'] ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>

