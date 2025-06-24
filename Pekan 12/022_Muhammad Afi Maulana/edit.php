<?php
include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pelanggan WHERE id = $id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE pelanggan SET nama='$nama', email='$email', alamat='$alamat' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Data</title></head>
<body>
    <h2>Edit Pelanggan</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
        Alamat: <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
//untuk edit data
