<?php
include'koneksi.php';
session_start();
$idkeg = $_GET['idkeg'];
$NIS = $_GET['nis'];

$q = mysqli_query($conn, "UPDATE `tbl_kegiatan` SET `validasi`='1' WHERE `id_keg`='$idkeg'");


echo "<script>
    alert('Data Berhasil Divalidasi');
    location='../rekap.php?NIS=" . $NIS . "';
  </script>";

?>
