<?php
    session_start();
include 'koneksi.php';

    $id_printer = $_GET['id_printer'];
    $id_user = $_SESSION['id_user'];
    $result = mysqli_query($conn, "SELECT * FROM printer_tb WHERE id_printer = $id_printer");
    $data = mysqli_fetch_assoc($result);


    // Logika pembayaran
    if(isset($_POST['submit'])){

    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $nama_barang = $data['nama_printer'];
    $harga = $_POST['harga'];

    $hasil = $jumlah*$harga;
    
    $query = mysqli_query($conn, "INSERT INTO transaksi VALUES('', '$nama_barang', '$jumlah', '$hasil', '$keterangan', '$id_printer', '','$id_user','')");
    header("Location: index.php");
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Konfirmasi Pembayaran</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Konfirmasi Pembayaran</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="namaPengirim" class="form-label">Jumlah</label>
                            <input name="jumlah" type="number" min="1" class="form-control" id="namaPengirim" required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Tambahkan keterangan jika diperlukan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga</label>
                            <input name="harga" type="number" value="<?=$data['harga_printer']?>" readonly class="form-control" id="namaPengirim" required>
                        </div>
                        <div class="mb-3">
                            <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">
                                Konfirmasi Pembayaran
                            </button> -->
                            <input type="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Gambar disini -->
            <img src="<?=$data['gambar_print']?>" alt="Gambar Pembayaran" class="img-fluid">
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengkonfirmasi pembayaran?</p>
                <!-- Informasi tambahan atau ringkasan pembayaran bisa ditambahkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- Script Bootstrap dan Popper.js (diperlukan untuk modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
