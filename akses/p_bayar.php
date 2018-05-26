<?php
include'koneksi.php';
session_start();
$nis = $_GET['NIS'];
$spp = $_POST['spp'];
$anjas = $_POST['anjas'];
$tkkeg = $_POST['tkkeg'];
$thkeg = $_POST['thkeg'];
$keg = $_POST['kegiatan'];
$tkbuku = $_POST['tkbuku'];
$thbuku = $_POST['thbuku'];
$book = $_POST['buku'];



$q = mysqli_query($conn, "SELECT pemb_spp FROM master_spp WHERE NIS=$nis");
$a = mysqli_fetch_array($q);
$bspp = $a['pemb_spp'];


$q = mysqli_query($conn, "SELECT pemb_spp FROM master_spp WHERE NIS=$nis");
$a = mysqli_fetch_array($q);
$ms = $a['pemb_spp'];

echo "<script>
if (confirm('Are you sure you want to save this thing into the database?')) {
  " . $nis . "
} else {
  history.back();
}
			</script>";


?>
