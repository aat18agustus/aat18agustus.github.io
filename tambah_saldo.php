<?php

//Include file koneksi, untuk koneksikan ke database
include "koneksi.php";
$pemasukan = $_POST["jumlah"];
$no = 0;
$no++;
//Cek apakah ada kiriman form dari method post
$sql = "INSERT INTO saldo ( 'no', 'pemasukan') VALUES ('$no', '$pemasukan')";
//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
$hasil = mysqli_query($kon, $sql);
if ($hasil) {
    header("Location:riwayat.php");
} else {
    echo "<div class='alert alert-danger'> Data Gagal ditambah.</div>";
}
