//  Contoh membuat form input dengan PHP

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Registrasi</title>
</head>
<body>
    <h2>Registrasi Pengguna</h2>

    <?php if (isset($pesanError)): ?>
        <p style="color:red"><?= $pesanError ?></p>
    <?php endif; ?>

    <?php if (isset($pesanSukses)): ?>
        <p style="color:green"><?= $pesanSukses ?></p>
    <?php endif; ?>

    <form method="post">
        Nama Lengkap: <input type="text" name="inputNama" required><br><br>
        Alamat Email: <input type="email" name="inputEmail" required><br><br>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPengguna = $_POST['inputNama'];
    $emailPengguna = $_POST['inputEmail'];

    // Cek input
    if (empty($namaPengguna) || empty($emailPengguna)) {
        $pesanError = "Silakan isi semua kolom yang tersedia!";
    } else {
        $pesanSukses = "Data berhasil dikirim atas nama: $namaPengguna ($emailPengguna)";
    }
}
?>
