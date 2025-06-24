<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
</head>
<body>
    <h2>Tambah Data Pelanggan</h2>
    <form method="post">
        Nama: <input type="text" name="nama" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Telepon: <input type="text" name="telepon" required><br><br>
        <button type="submit">Simpan</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $insert = mysqli_query($koneksi, "INSERT INTO pelanggan (nama, email, telepon) VALUES ('$nama', '$email', '$telepon')");
        if ($insert) {
            echo "<p>Data berhasil ditambahkan. <a href='index.php'>Kembali</a></p>";
        } else {
            echo "<p>Gagal menambahkan data!</p>";
        }
    }
    ?>
</body>
</html>
