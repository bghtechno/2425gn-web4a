<!DOCTYPE html>
<html>
<head>
    <title>Form Pengolahan Data Sederhana</title>
</head>
<body>
    <h2>Formulir Input</h2>
    
    <?php
        $nama = $_POST['nama'] ?? '';
        $email = $_POST['email'] ?? '';
        $error = '';
        $hasil = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = trim($nama);
            $email = trim($email);

            if ($nama === '' || $email === '') {
                $error = "Semua field wajib diisi!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Format email tidak valid!";
            } else {
                $hasil = "Data telah diproses:<br>Nama: $nama<br>Email: $email";
            }
        }
    ?>

    <?php if($error): ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if($hasil): ?>
        <p style="color:green"><?php echo $hasil; ?></p>
    <?php endif; ?>

    <form method="post">
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <input type="submit" value="Kirim Data">
    </form>
</body>
</html>
