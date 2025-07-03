<?php
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM pelanggan WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $conn->query("UPDATE pelanggan SET nama='$nama', email='$email' WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Pelanggan</h2>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
    Email: <input type="text" name="email" value="<?= $data['email'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
