<?php

//Include file koneksi, untuk koneksikan ke database
include "../koneksi.php";
$pemasukan = $_POST["jumlah"];
$tanggal = date("Y-m-d");
$sumber = $_POST["sumber"];
//Cek apakah ada kiriman form dari method post
$sql = "INSERT INTO pemasukan (jumlah,tanggal,sumber) VALUES ('$pemasukan', '$tanggal', '$sumber')";
//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
$hasil = mysqli_query($kon, $sql);
if ($hasil) {
    header("Location:riwayat.php");
} else {
    echo "<div class='alert alert-danger'> Data Gagal ditambah.</div>";
}
