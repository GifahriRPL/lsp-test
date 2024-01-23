<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'lsp_test';
    

    $conn = mysqli_connect($server, $user, $pass, $db);

    if(!$conn){
        echo "koneksi gagal".mysqli_connect_error();
    }


?>