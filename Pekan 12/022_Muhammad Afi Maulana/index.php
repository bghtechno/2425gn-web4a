<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Data Pelanggan</title></head>
<body>
    <h2>Data Pelanggan</h2>
    <a href="tambah.php">+ Tambah Data</a><br><br>
    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama</th><th>Email</th><th>Alamat</th><th>Aksi</th></tr>
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM pelanggan");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['alamat']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin?')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
