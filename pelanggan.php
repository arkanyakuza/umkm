<?php
include 'auth.php';
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pelanggan</title>
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
      <h3 class="mb-4">👥 Data Pelanggan</h3>

      <a href="tambah_pelanggan.php" class="btn btn-success mb-3">➕ Tambah Pelanggan</a>

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['no_hp']}</td>
                    <td>{$row['alamat']}</td>
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
