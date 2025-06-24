<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
</head>
<body>

<h2>Data Pendaftaran</h2>

<?php
// Cek apakah data dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $gender = $_POST['gender'] ?? '';
    $prodi = $_POST['prodi'];

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($gender) || empty($prodi)) {
        echo "<p style='color:red;'>Semua field harus diisi!</p>";
        echo "<a href='index.php'>Kembali ke form</a>";
        exit;
    }

    // Tampilkan data
    echo "<p><strong>Nama:</strong> $nama</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Jenis Kelamin:</strong> $gender</p>";
    echo "<p><strong>Program Studi:</strong> $prodi</p>";
} else {
    echo "<p>Form harus diakses melalui POST.</p>";
}
?>

</body>
</html>
