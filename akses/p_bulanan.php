<?php
include'koneksi.php';
session_start();
$bulan = $_POST['bulan'];
$hms = $_POST['hms'];
$dms = $_POST['dms'];
$panjas = $_POST['panjas'];
$date = date_create($bulan);
$date = date_format($date,"Y-m-d");

$q = mysqli_query($conn, "INSERT INTO `master_ms` (`bulan`, `harga`, `jml_hari`) VALUES ('$date', '$hms', '$dms')");
$q = mysqli_query($conn, "INSERT INTO `master_potanjas` (`bulan`, `potongan`) VALUES ('$date', '$panjas')");



echo "<script>
    alert('Data Berhasil Disimpan');
    location='../tagihan.php';
  </script>";

?>
