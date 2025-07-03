<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran</title>
</head>
<body>
    <h2>Form Pendaftaran</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        if (!$nama || !$email) {
            echo "<p style='color:red'>Nama dan email wajib diisi!</p>";
        } else {
            echo "<p style='color:green'>Pendaftaran berhasil:<br>Nama: $nama<br>Email: $email</p>";
        }
    }
    ?>

    <form method="post">
        Nama: <input type="text" name="nama"><br><br>
        Email: <input type="text" name="email"><br><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
