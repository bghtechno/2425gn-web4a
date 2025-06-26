<?php
include 'koneksi.php';

// Ambil ID dari parameter URL dan sanitasi
$id_pelanggan = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data pelanggan berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id = $id_pelanggan");
$pelanggan = mysqli_fetch_assoc($result);

// Inisialisasi pesan
$pesan = '';
$berhasil = false;

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaBaru = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
    $emailBaru = mysqli_real_escape_string($koneksi, $_POST['email_pelanggan']);
    $telpBaru = mysqli_real_escape_string($koneksi, $_POST['telepon_pelanggan']);

    // Validasi input
    if (empty($namaBaru) || empty($emailBaru) || empty($telpBaru)) {
        $pesan = 'Semua field harus diisi!';
    } else {
        $sql = "UPDATE pelanggan 
                SET nama = '$namaBaru', email = '$emailBaru', telepon = '$telpBaru' 
                WHERE id = $id_pelanggan";
        $ubah = mysqli_query($koneksi, $sql);

        if ($ubah) {
            $berhasil = true;
            $pesan = 'Data berhasil diperbarui. <a href="index.php">Kembali ke daftar</a>';
        } else {
            $pesan = 'Terjadi kesalahan saat memperbarui data.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pelanggan</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }
        .form-container {
            background: #fff;
            max-width: 500px;
            margin: auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .pesan {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }
        .sukses {
            background-color: #d4edda;
            color: #155724;
        }
        .gagal {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Edit Pelanggan</h2>

    <?php if ($pesan): ?>
        <div class="pesan <?= $berhasil ? 'sukses' : 'gagal' ?>"><?= $pesan ?></div>
    <?php endif; ?>

    <form method="post">
        <label for="nama_pelanggan">Nama:</label>
        <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?= htmlspecialchars($pelanggan['nama']) ?>" required>

        <label for="email_pelanggan">Email:</label>
        <input type="email" name="email_pelanggan" id="email_pelanggan" value="<?= htmlspecialchars($pelanggan['email']) ?>" required>

        <label for="telepon_pelanggan">Telepon:</label>
        <input type="text" name="telepon_pelanggan" id="telepon_pelanggan" value="<?= htmlspecialchars($pelanggan['telepon']) ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>

