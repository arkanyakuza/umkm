<?php
include 'auth.php';
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);
  $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
  $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

  mysqli_query($koneksi, "INSERT INTO pelanggan (nama, email, no_hp, alamat) 
    VALUES ('$nama', '$email', '$no_hp', '$alamat')");

  echo "<script>alert('Pelanggan berhasil ditambahkan!'); window.location='pelanggan.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pelanggan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">

  <div class="container">
    <h3 class="mb-4">➕ Tambah Pelanggan</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control">
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"></textarea>
      </div>

      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>

</body>
</html>
