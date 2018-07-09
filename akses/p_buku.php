<?php
include'koneksi.php';
session_start();
$tahun = $_POST['tahun'];
$tingkat = $_POST['tingkat'];
$harga = $_POST['harga'];

$q = mysqli_query($conn, "INSERT INTO `master_bybuku` (`tahun`, `harga_buku`, tingkat) VALUES ('$tahun', '$harga', '$tingkat')") or die (mysqli_error($conn));


echo "<script>
    alert('Data Berhasil Disimpan');
    location='../buku.php';
  </script>";

?>
