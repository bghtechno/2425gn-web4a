<!DOCTYPE html>
<html>
<head>
    <title>Form Olah Data</title>
</head>
<body>
    <h2>Form Input Data</h2>
    
    <?php if(isset($error)): ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <?php if(isset($hasil)): ?>
        <p><?php echo $hasil; ?></p>
    <?php endif; ?>
    
    <form method="post">
        Nama: <input type="text" name="nama"><br><br>
        Email: <input type="text" name="email"><br><br>
        <input type="submit" name="submit" value="Proses Data">
    </form>
</body>
</html>

<?php
    // Proses data jika form disubmit
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        // Validasi sederhana
        if(empty($nama) || empty($email)) {
            $error = "Nama dan email harus diisi!";
        } else {
            // Simpan data ke array
            $data = [
                'nama' => ($nama),
                'email' => ($email)
            ];
            
            // Tampilkan hasil
            $hasil = "Data berhasil diolah:<br>
                     Nama: ".$data['nama']."<br>
                     Email: ".$data['email'];
        }
    }
?>
