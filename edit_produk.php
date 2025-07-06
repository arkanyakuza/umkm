<?php
include 'auth.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];

  mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id=$id");
  header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
  <div class="container">
    <h3 class="mb-4">✏️ Edit Produk</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
      </div>
      <button type="submit" name="update" class="btn btn-success">Update</button>
      <a href="produk.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
