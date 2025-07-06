-- Buat database
CREATE DATABASE erp_umkm;
USE erp_umkm;

-- Tabel user (untuk login)
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Masukkan user admin (password: admin123)
INSERT INTO user (username, password) VALUES ('admin', MD5('admin123'));

-- Tabel produk
CREATE TABLE produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(100),
  harga INT,
  stok INT
);

-- Tabel pelanggan
CREATE TABLE pelanggan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  email VARCHAR(100),
  no_hp VARCHAR(20),
  alamat TEXT
);

-- Tabel penjualan
CREATE TABLE penjualan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  produk_id INT,
  pelanggan_id INT,
  jumlah INT,
  tanggal DATE,
  FOREIGN KEY (produk_id) REFERENCES produk(id),
  FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id)
);
