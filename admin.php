<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
    }

    include 'koneksi.php';

    $result = mysqli_query($conn, "SELECT * FROM transaksi");

    if(isset($_POST["konfirmasi"])){
        $konfirmasi = $_POST['konfirmasi'];
        mysqli_query($conn, "UPDATE transaksi SET konfirmasi_pembayaran = 1  WHERE id_transaksi=$konfirmasi");
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Halaman Admin</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pengaturan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Keluar</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2>Transaksi Pembayaran</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID PEMESAN</th>
                <th scope="col">JUMAH</th>
                <th scope="col">TOTAL HARGA</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            <?php while( 
             $data = mysqli_fetch_assoc($result)

            ) : ?>
            <tr>
                <th scope="row"><?=$no++?></th>
                <td><?=$data['user_id_user2']?></td>
                <td><?=$data['jumlah']?></td>
                <td><?=$data['harga']?></td>
                <td>
                    <?php if($data['konfirmasi_pembayaran'] == 0){ ?>
                        <form action="" method="post">
                            <button type="submit" value="<?=$data['id_transaksi']?>" name="konfirmasi" class="btn btn-success">Konfirmasi</button>
                        </form>
                    <?php }?>
                </td>
            </tr>
            <?php endwhile?>
            <!-- Tambahkan data pengguna lainnya sesuai kebutuhan -->
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
