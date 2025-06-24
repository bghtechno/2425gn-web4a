CREATE DATABASE pelanggan_db;

USE pelanggan_db;

CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    alamat TEXT
);
