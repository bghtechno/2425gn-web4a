CREATE DATABASE db_pelanggan;

USE db_pelanggan;

CREATE TABLE pelanggan (
    id_Pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    telepon VARCHAR(20),
    Alamat VARCHAR(20)
);
