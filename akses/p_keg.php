<?php
include'koneksi.php';
session_start();
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];

$q = mysqli_query($conn, "INSERT INTO `master_kegiatan` (`Tahun`, `by_keg`) VALUES ('$tahun', '$harga')");


echo "<script>
    alert('Data Berhasil Disimpan');
    location='../kegiatan.php';
  </script>";

?>
