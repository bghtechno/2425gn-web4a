<?php include 'db.php'; ?>

<h2>Daftar Pelanggan</h2>
<a href="tambah.php">+ Tambah Pelanggan</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM pelanggan");
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
