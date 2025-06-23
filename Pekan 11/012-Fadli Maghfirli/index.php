//  Tugas membuat formulir dengan PHP

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Sederhana</title>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    
    <?php if (isset($error)): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    
    <?php if (isset($success)): ?>
        <p style="color:green"><?= $success ?></p>
    <?php endif; ?>
    
    <form method="post">
        Nama: <input type="text" name="nama" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    
    // Validasi sederhana
    if (empty($nama) || empty($email)) {
        $error = "Nama dan email harus diisi!";
    } else {
        $success = "Pendaftaran berhasil dengan nama: $nama ($email)";
    }
}
?>
