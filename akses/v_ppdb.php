<?php
include'koneksi.php';
session_start();
$idppdb = $_GET['idppdb'];
$NIS = $_GET['nis'];

$q = mysqli_query($conn, "UPDATE `tbl_ppdb` SET `validasi`='1' WHERE `id_ppdb`='$idppdb'");


echo "<script>
    alert('Data Berhasil Divalidasi');
    location='../rekap.php?NIS=" . $NIS . "';
  </script>";

?>
