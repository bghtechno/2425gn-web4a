<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran</title>
</head>
<body>
    <h2>Formulir Pendaftaran</h2>
    <form action="proses.php" method="POST">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
        <input type="radio" name="gender" value="Perempuan" required> Perempuan<br><br>

        <label>Program Studi:</label><br>
        <select name="prodi" required>
            <option value="">-- Pilih --</option>
            <option value="Informatika">Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
        </select><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
