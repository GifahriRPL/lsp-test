<?php
    session_start();
    include 'koneksi.php';
    if(!isset($_SESSION['costumer'])){
        header("Location: login.php");
    }
    $id_user = $_SESSION['id_user'];

    $result = mysqli_query($conn, "SELECT * FROM  printer_tb");
    $k = mysqli_query($conn, "SELECT * FROM transaksi WHERE user_id_user2 = $id_user");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Card Example</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">LSP Ecommerce</a>
    
    <!-- Tombol toggle untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigasi utama -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list.php?id=<?=$id_user?>">List</a>
            </li>
        </ul>

        <!-- Form pencarian -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <!-- Card 1 -->
        <?php  
             while($data = mysqli_fetch_assoc($result)) :
        
        ?>
        <div class="col-md-3">
            <div class="card">
                <img src="<?=$data['gambar_print']?>" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <p class="card-text"><?=$data['nama_printer']?></p>
                    <P class="text-success"><?=$data['harga_printer']?></P>

                    <a href="transaksi.php?id_printer=<?=$data['id_printer']?>" type="button" class="btn btn-sm btn-primary">Buy</a>
                    <a href="#" type="button" class="btn btn-sm btn-danger" >Detail</a>


                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <!-- end -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
