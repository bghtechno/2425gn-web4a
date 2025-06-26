<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Pengolahan Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error { color: red; }
        .success { color: green; }
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Pengolahan Data</h2>

    <?php
    $output = '';
    $errorMsg = '';

    // Fungsi untuk validasi dan proses input
    function prosesData($namaLengkap, $alamatEmail) {
        if (empty($namaLengkap) || empty($alamatEmail)) {
            return ['error' => 'Semua field harus diisi.'];
        } elseif (!filter_var($alamatEmail, FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Format email tidak valid.'];
        } else {
            return [
                'success' => true,
                'data' => [
                    'Nama Lengkap' => htmlspecialchars($namaLengkap),
                    'Email' => htmlspecialchars($alamatEmail)
                ]
            ];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namaInput = $_POST['nama_user'];
        $emailInput = $_POST['email_user'];

        $hasil = prosesData($namaInput, $emailInput);

        if (isset($hasil['error'])) {
            $errorMsg = $hasil['error'];
        } else {
            $data = $hasil['data'];
            $output = "<div class='success'>Data berhasil diproses!</div>";
            $output .= "<table>";
            foreach ($data as $key => $value) {
                $output .= "<tr><th>$key</th><td>$value</td></tr>";
            }
            $output .= "</table>";
        }
    }
    ?>

    <?php if (!empty($errorMsg)): ?>
        <p class="error"><?php echo $errorMsg; ?></p>
    <?php endif; ?>

    <?php echo $output; ?>

    <form method="post" action="">
        <label for="nama_user">Nama Lengkap:</label>
        <input type="text" id="nama_user" name="nama_user">

        <label for="email_user">Email:</label>
        <input type="text" id="email_user" name="email_user">

        <input type="submit" value="Kirim Data">
    </form>
</div>

</body>
</html>

