<?php
include'koneksi.php';
session_start();
$idspp = $_GET['idspp'];
$NIS = $_GET['nis'];

$q = mysqli_query($conn, "UPDATE `tbl_spp_ms` SET `validasi`='1' WHERE `id_spp_ms`='$idspp'");


echo "<script>
    alert('Data Berhasil Divalidasi');
    location='../rekap.php?NIS=" . $NIS . "';
  </script>";

?>
