<?php
include'koneksi.php';
session_start();
$idbuku = $_GET['idbuku'];
$NIS = $_GET['nis'];

$q = mysqli_query($conn, "UPDATE `tbl_bybuku` SET `validasi`='1' WHERE `id_buku`='$idbuku'");


echo "<script>
    alert('Data Berhasil Divalidasi');
    location='../rekap.php?NIS=" . $NIS . "';
  </script>";

?>
