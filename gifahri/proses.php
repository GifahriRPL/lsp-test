<?php
$nama = $_POST["nama"];
$nilai = $_POST["nilai"];
if ($nilai >=80){
    $predikat = "A";
}
elseif ($nilai >=70){
    $predikat = "B";
}
elseif ($nilai >=60){
    $predikat = "C";
}
elseif ($nilai >=50){
    $predikat = "D";
}
elseif ($nilai <50){
    $predikat = "E";
}
echo "nama siswa:". " " .$nama."<br><br>";
echo "Nilai akhir:". " ". $nilai. "<br><br>";
echo "predikat nilai:". " ". $predikat;
?>