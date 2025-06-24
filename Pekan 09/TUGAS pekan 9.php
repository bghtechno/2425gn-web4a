<!DOCTYPE html>
<html>
<head>
    <title>Belajar PHP Sederhana</title>
</head>
<body>

    <h1>Pengenalan PHP</h1>

    <?php
    // Variabel PHP
    $nama = "Afi";
    $umur = 21;
    $hobi = "coding";

    // Array data
    $mahasiswa = [
        ["nama" => "Afi", "jurusan" => "Informatika"],
        ["nama" => "Dina", "jurusan" => "Sistem Informasi"],
        ["nama" => "Rian", "jurusan" => "Teknik Komputer"]
    ];

    echo "<p>Halo, nama saya $nama. Saya berusia $umur tahun dan hobi saya adalah $hobi.</p>";

    echo "<h2>Daftar Mahasiswa</h2>";
    echo "<ul>";
    foreach ($mahasiswa as $data) {
        echo "<li>" . $data["nama"] . " - " . $data["jurusan"] . "</li>";
    }
    echo "</ul>";
    ?>

</body>
</html>
