<?php
include 'auth.php';
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Penjualan & Stok</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .main-wrapper { display: flex; min-height: 100vh; }
    .main-content { padding: 30px; flex-grow: 1; background-color: #fff; }
  </style>
</head>
<body>

  <div class="main-wrapper">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
      <h3 class="mb-4">📈 Laporan Penjualan & Stok</h3>

      <!-- Laporan Stok -->
      <h5 class="mb-3">📦 Laporan Stok Produk</h5>
      <table class="table table-bordered">
        <thead class="table-secondary">
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $produk = mysqli_query($koneksi, "SELECT * FROM produk");
          while ($row = mysqli_fetch_assoc($produk)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_produk']}</td>
                    <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                    <td>{$row['stok']}</td>
                  </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>

      <!-- Laporan Penjualan -->
      <h5 class="mt-5 mb-3">🛒 Laporan Transaksi Penjualan</h5>
      <table class="table table-bordered">
        <thead class="table-secondary">
          <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $laporan = mysqli_query($koneksi, "
            SELECT penjualan.*, produk.nama_produk, pelanggan.nama 
            FROM penjualan
            JOIN produk ON penjualan.produk_id = produk.id
            JOIN pelanggan ON penjualan.pelanggan_id = pelanggan.id
          ");
          while ($row = mysqli_fetch_assoc($laporan)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_produk']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>{$row['tanggal']}</td>
                  </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
