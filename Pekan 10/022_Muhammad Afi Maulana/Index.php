<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        input, select { padding: 5px; margin: 5px; }
    </style>
</head>
<body>

<h2>Kalkulator PHP Sederhana</h2>

<form method="POST">
    <label>Angka 1: </label>
    <input type="number" name="angka1" required><br>

    <label>Angka 2: </label>
    <input type="number" name="angka2" required><br>

    <label>Operasi: </label>
    <select name="operator">
        <option value="+">Tambah</option>
        <option value="-">Kurang</option>
        <option value="*">Kali</option>
        <option value="/">Bagi</option>
    </select><br>

    <button type="submit" name="hitung">Hitung</button>
</form>

<?php
// Kontrol alur: cek jika tombol hitung ditekan
if (isset($_POST['hitung'])) {
    // Variabel dan Tipe Data
    $angka1 = (float) $_POST['angka1'];
    $angka2 = (float) $_POST['angka2'];
    $operator = $_POST['operator'];
    $hasil = 0;

    // Operator dan Percabangan
    switch ($operator) {
        case '+':
            $hasil = $angka1 + $angka2;
            break;
        case '-':
            $hasil = $angka1 - $angka2;
            break;
        case '*':
            $hasil = $angka1 * $angka2;
            break;
        case '/':
            // Validasi pembagian dengan 0
            if ($angka2 == 0) {
                echo "<p style='color:red;'>Error: Tidak bisa dibagi dengan nol!</p>";
                exit;
            }
            $hasil = $angka1 / $angka2;
            break;
        default:
            echo "Operator tidak dikenal";
            exit;
    }

    // Output hasil
    echo "<h3>Hasil: $angka1 $operator $angka2 = $hasil</h3>";
}
?>

</body>
</html>
