<?php
include 'auth.php';
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard ERP UMKM</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .main-wrapper {
      display: flex;
      min-height: 100vh;
    }
    .main-content {
      padding: 30px;
      flex-grow: 1;
      background-color: #fff;
    }
  </style>
</head>
<body>

  <div class="main-wrapper">
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama -->
    <div class="main-content">
      <h3 class="mb-3">📊 Dashboard ERP UMKM</h3>
      <p>Selamat datang, <b><?= $_SESSION['username'] ?></b> | <a href="logout.php">Logout</a></p>

      <div class="row g-4 mt-4">
        <div class="col-md-3"><a href="produk.php" class="btn btn-outline-primary w-100">📦 Produk</a></div>
        <div class="col-md-3"><a href="pelanggan.php" class="btn btn-outline-success w-100">👥 Pelanggan</a></div>
        <div class="col-md-3"><a href="penjualan.php" class="btn btn-outline-warning w-100">🛒 Penjualan</a></div>
        <div class="col-md-3"><a href="laporan.php" class="btn btn-outline-dark w-100">📈 Laporan</a></div>
      </div>
    </div>
  </div>

</body>
</html>
