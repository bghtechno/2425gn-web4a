<?php
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Inisialisasi data (di database nyata, akan menggunakan MySQL)
$crud_data = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com']
];

// Proses CRUD (Create, Read, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Create: menambah data baru
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = count($crud_data) + 1;
        $crud_data[] = ['id' => $id, 'name' => $name, 'email' => $email];
    } elseif (isset($_POST['update'])) {
        // Update: mengubah data yang ada
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        foreach ($crud_data as &$item) {
            if ($item['id'] == $id) {
                $item['name'] = $name;
                $item['email'] = $email;
                break;
            }
        }
    } elseif (isset($_POST['delete'])) {
        // Delete: menghapus data
        $id = $_POST['id'];
        $crud_data = array_filter($crud_data, fn($item) => $item['id'] !== $id);
        $crud_data = array_values($crud_data);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Data Pengguna</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
           

