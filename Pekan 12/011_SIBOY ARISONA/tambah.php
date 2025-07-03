<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO pelanggan (nama, email) VALUES ('$nama', '$email')");
    header("Location: index.php");
}
?>

<h2>Tambah Pelanggan</h2>
<form method="post">
    Nama: <input type="text" name="nama"><br><br>
    Email: <input type="text" name="email"><br><br>
    <button type="submit">Simpan</button>
</form>
