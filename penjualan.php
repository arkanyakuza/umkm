<?php
include 'auth.php';
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Penjualan</title>
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
      <h3 class="mb-4">🛒 Data Penjualan</h3>
      <a href="tambah_penjualan.php" class="btn btn-primary mb-3">+ Tambah Penjualan</a>

      <table class="table table-bordered">
        <thead class="table-dark">
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
          $sql = mysqli_query($koneksi, "
            SELECT penjualan.*, produk.nama_produk, pelanggan.nama 
            FROM penjualan
            JOIN produk ON penjualan.produk_id = produk.id
            JOIN pelanggan ON penjualan.pelanggan_id = pelanggan.id
          ");
          while ($row = mysqli_fetch_assoc($sql)) {
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
