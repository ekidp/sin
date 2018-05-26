<?php
include'koneksi.php';
session_start();
$nis = $_GET['NIS'];
$spp = $_POST['spp'];
$anjas = $_POST['anjas'];
$thkeg = $_POST['thkeg'];
$keg = $_POST['kegiatan'];
$tkbuku = $_POST['tkbuku'];
$thbuku = $_POST['thbuku'];
$book = $_POST['buku'];

$bms = 0;

$tbspp = 0;
$tbanjas = 0;
$q = mysqli_query($conn, "SELECT pemb_spp FROM master_spp WHERE NIS=$nis");
$a = mysqli_fetch_array($q);
$bspp = $a['pemb_spp'];

foreach ($spp as $key => $value) {
  $tbspp += $bspp;
}

foreach ($spp as $key => $value) {
  $bulan[] = date("Y-m-d", strtotime($value));
}

foreach ($bulan as $key => $value) {
  $q = mysqli_query($conn, "SELECT jml_hari,harga FROM master_ms WHERE bulan = '$value'");
  $a = mysqli_fetch_array($q);
  $harga = $a['harga'];
  $hari = $a['jml_hari'];
  $bms += ($harga * $hari);
}

$q = mysqli_query($conn, "SELECT by_anjas FROM master_anjas WHERE NIS=$nis");
$a = mysqli_fetch_array($q);
$banjas = $a['by_anjas'];

foreach ($anjas as $key => $value) {
  $tbanjas += $banjas;
}

$total = $tbspp + $bms + $tbanjas + $keg + $book ;

$rp = "Rp " . number_format($total,2,',','.');

echo "<script>
if (confirm('Total Pembayaran Adalah ". $rp ."?')) {
  " . $nis . "
} else {
  history.back();
}
			</script>";


?>
