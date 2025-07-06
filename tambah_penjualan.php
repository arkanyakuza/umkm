<?php
include 'auth.php';
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $produk_id = intval($_POST['produk']);
  $pelanggan_id = intval($_POST['pelanggan']);
  $jumlah = intval($_POST['jumlah']);
  $tanggal = date('Y-m-d');

  // Validasi produk
  $produk = mysqli_query($koneksi, "SELECT stok FROM produk WHERE id = $produk_id");
  if (mysqli_num_rows($produk) == 0) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='tambah_penjualan.php';</script>";
    exit;
  }
  $data = mysqli_fetch_assoc($produk);
  $stok_sekarang = $data['stok'];

  // Validasi stok cukup
  if ($jumlah > $stok_sekarang) {
    echo "<script>alert('Stok tidak mencukupi!'); window.location='tambah_penjualan.php';</script>";
    exit;
  }

  // Simpan penjualan
  $insert = mysqli_query($koneksi, "INSERT INTO penjualan (produk_id, pelanggan_id, jumlah, tanggal) 
    VALUES ($produk_id, $pelanggan_id, $jumlah, '$tanggal')");

  // Kurangi stok produk jika insert berhasil
  if ($insert) {
    mysqli_query($koneksi, "UPDATE produk SET stok = stok - $jumlah WHERE id = $produk_id");
    echo "<script>alert('Transaksi berhasil disimpan'); window.location='penjualan.php';</script>";
    exit;
  } else {
    echo "<script>alert('Gagal menyimpan transaksi!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Penjualan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
  <div class="container">
    <h3 class="mb-4">➕ Tambah Penjualan</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Produk</label>
        <select name="produk" class="form-control" required>
          <option value="">-- Pilih Produk --</option>
          <?php
          $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE stok > 0");
          while ($p = mysqli_fetch_assoc($produk)) {
            echo "<option value='{$p['id']}'>{$p['nama_produk']} (Stok: {$p['stok']})</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label>Pelanggan</label>
        <select name="pelanggan" class="form-control" required>
          <option value="">-- Pilih Pelanggan --</option>
          <?php
          $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
          if (mysqli_num_rows($pelanggan) == 0) {
            echo "<option value=''>Belum ada data pelanggan</option>";
          } else {
            while ($p = mysqli_fetch_assoc($pelanggan)) {
              echo "<option value='{$p['id']}'>{$p['nama']}</option>";
            }
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required min="1">
      </div>

      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="penjualan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
