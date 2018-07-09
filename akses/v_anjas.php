<?php
include'koneksi.php';
session_start();
$idanjas = $_GET['idanjas'];
$NIS = $_GET['nis'];

$q = mysqli_query($conn, "UPDATE `tbl_anjas` SET `validasi`='1' WHERE `id_anjas`='$idanjas'");


echo "<script>
    alert('Data Berhasil Divalidasi');
    location='../rekap.php?NIS=" . $NIS . "';
  </script>";

?>
