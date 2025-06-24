<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO pelanggan (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Data</title></head>
<body>
    <h2>Tambah Pelanggan</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required><br>
        Email: <input type="email" name="email" required><br>
        Alamat: <textarea name="alamat" required></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

//untuk tambah data
