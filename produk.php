<?php
include 'auth.php';
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Produk</title>
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
      <h3 class="mb-4">📦 Data Produk</h3>
      <a href="tambah_produk.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
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
                    <td>
                      <a href='edit_produk.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                      <a href='hapus_produk.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                    </td>
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
