<?php
include 'db.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");
header("Location: index.php");
exit;
?>
//untuk hapus data
