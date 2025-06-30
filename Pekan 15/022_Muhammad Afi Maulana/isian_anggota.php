<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "struktur_dpm";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

// Variabel
$id_anggota = "";
$nama_anggota = "";
$jabatan = "";
$prodi = "";
$telp_anggota = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// Aksi menghapus data
if ($op == 'delete') {
    $id_anggota = $_GET['id_anggota'];
    $sql1 = "DELETE FROM anggota WHERE id_anggota = '$id_anggota'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan hapus data";
    }
}

// Aksi mengupdate data
if ($op == 'edit') {
    $id_anggota = $_GET['id_anggota'];
    $sql1 = "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama_anggota = $r1['nama_anggota'];
    $jabatan = $r1['jabatan'];
    $prodi = $r1['prodi']; 
    $telp_anggota = $r1['telp_anggota']; 
    if ($nama_anggota == '') {
        $error = "Data tidak ditemukan";
    }
}

// Aksi menambah data
if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $jabatan = $_POST['jabatan'];
    $prodi = $_POST['prodi'];
    $telp_anggota = $_POST['telp_anggota'];
    if ($id_anggota && $nama_anggota && $jabatan && $prodi && $telp_anggota) {
        if ($op == 'edit') { 
          
          // Update data
            $sql1 = "UPDATE anggota SET nama_anggota='$nama_anggota', jabatan='$jabatan', prodi='$prodi', telp_anggota='$telp_anggota' WHERE id_anggota='$id_anggota'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { 
          
          // Tambah data baru
            $sql1 = "INSERT INTO anggota (id_anggota, nama_anggota, jabatan, prodi, telp_anggota) VALUES ('$id_anggota', '$nama_anggota', '$jabatan', '$prodi',$telp_anggota)";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA STRUKTUR DPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mx-auto {
            width: 800px
        }
        .card {
            margin-top: 60px;
        }
        .back-button {
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: blue;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            text-decoration: none; /* Menghapus garis bawah */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

      
    </style>
</head>
<body>
    <!-- Tombol Back -->
    <a href="index.php" class="back-button">kembali</a>

    <div class="mx-auto">
        <div class="card">
          <div class="card-header text-white bg-primary">
            <div class="card-header">MASUKKAN DATA DPM</div>
          </div>
            <div class="card-body">
    
                <?php if ($error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php } ?>
                <?php if ($sukses) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id_anggota" class="col-sm-2 col-form-label">NO. ANGGOTA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo $id_anggota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_anggota" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo $nama_anggota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">JABATAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $jabatan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telp_anggota" class="col-sm-2 col-form-label">NO. TELEPON</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp_anggota" name="telp_anggota" value="<?php echo $id_anggota ?>">
                        </div>
                   </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">PRODI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi ?>">
                        </div>
                    </div>
                    <div class="col-12" align="right">
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-secondary text-white">Data anggota</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NO. ANGGOTA</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>PRODI</th>
                            <th>NO. TELEPON</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM anggota ORDER BY id_anggota ASC";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_anggota = $r2['id_anggota'];
                            $nama_anggota = $r2['nama_anggota'];
                            $jabatan = $r2['jabatan'];
                            $prodi = $r2['prodi'];
                            $telp_anggota = $r2['telp_anggota'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td><?php echo $id_anggota ?></td>
                                <td><?php echo $nama_anggota ?></td>
                                <td><?php echo $jabatan ?></td>
                                <td><?php echo $prodi ?></td>
                                <td><?php echo $telp_anggota ?></td>
                                <td>
                                    <a href="isian_anggota.php?op=edit&id_anggota=<?php echo $id_anggota ?>">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="isian_anggota.php?op=delete&id_anggota=<?php echo $id_anggota ?>" onclick="return confirm('Yakin mau hapus data?')">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>