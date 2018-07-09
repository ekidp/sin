<?php
include'koneksi.php';
session_start();
$idms = $_GET['ms'];
$idanjas = $_GET['anjas'];

$hms = $_POST['hms'];
$dms = $_POST['dms'];
$panjas = $_POST['panjas'];

$q = mysqli_query($conn, "UPDATE `master_ms` SET `harga`='$hms', `jml_hari`='$dms' WHERE `id_master_ms`='$idms';");
$q = mysqli_query($conn, "UPDATE `master_potanjas` SET `potongan`='$panjas' WHERE `idpotanjas`='$idanjas';");



echo "<script>
    alert('Data Berhasil Disimpan');
    location='../tagihan.php';
  </script>";

?>
