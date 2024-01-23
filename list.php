<?php
    session_start();
    include 'koneksi.php';

    $id = $_SESSION['id_user'];
    $result = mysqli_query($conn, "SELECT * FROM transaksi WHERE user_id_user2 = $id AND konfirmasi_pembayaran = 1");
    $no = 1;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Data Pembelian</title>
</head>
<body>

<div class="container mt-4">
  <h2>Data Pembelian</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php while($data = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?=$no++?></td>
        <td><img src="<?=$data['gambar_print']?>" alt=""></td>
        <td><?=$data['nama_printer']?></td>
        <td><?=$data['jumlah']?></td>
        <td><?=$data['harga']?></td>
      </tr>
      <?php endwhile ?>
      <!-- Tambahkan baris data sesuai kebutuhan -->
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
