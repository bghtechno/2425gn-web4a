<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id=$id");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>
    <h2>Edit Data Pelanggan</h2>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $data['email'] ?>" required><br><br>
        Telepon: <input type="text" name="telepon" value="<?= $data['telepon'] ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $update = mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama', email='$email', telepon='$telepon' WHERE id=$id");
        if ($update) {
            echo "<p>Data berhasil diubah. <a href='index.php'>Kembali</a></p>";
        } else {
            echo "<p>Gagal mengubah data!</p>";
        }
    }
    ?>
</body>
</html>
