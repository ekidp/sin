<?php
include'koneksi.php';
session_start();
$nis = $_GET['NIS'];
if (!empty($_POST['spp'])) {
    $spp = $_POST['spp'];
}

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

// INSERT INTO DATABASE
$q = mysqli_query($conn, "SELECT id_master_spp FROM master_spp WHERE NIS=$nis");
$a = mysqli_fetch_array($q);
$idspp = $a['id_master_spp'];

// foreach ($bulan as $key => $value) {
//   $q = mysqli_query($conn, "SELECT id_master_ms FROM master_ms WHERE bulan='$value'") or die (mysqli_error($conn));
//   $a = mysqli_fetch_array($q);
//   $idms = $a['id_master_ms'];
//   $q = mysqli_query($conn, "INSERT INTO `tbl_spp_ms` (`id_master_spp`, `NIS`, `bulan`, `tgl_bayar_spp`, `validasi`, `id_master_ms`) VALUES ('$idspp', '$nis', '$value', NOW(), '1', '$idms');");
// }
//
// $q = mysqli_query($conn, "SELECT id_ms_anjas FROM master_anjas WHERE NIS=$nis");
// $a = mysqli_fetch_array($q);
// $idanjas = $a['id_ms_anjas'];
//
// foreach ($anjas as $key => $value) {
//   $bulan = date("Y-m-d", strtotime($value));
//   $q = mysqli_query($conn, "INSERT INTO `tbl_anjas` (`id_master_anjas`, `NIS`, `tgl_bayar_anjas`, `validasi`, `bulan`) VALUES ('$idanjas', '$nis', NOW(), '1', '$bulan');");
// }
//
// $q = mysqli_query($conn, "SELECT id_master_keg FROM master_kegiatan WHERE Tahun=$thkeg");
// $a = mysqli_fetch_array($q);
// $idkeg = $a['id_master_keg'];
//
// $q = mysqli_query($conn, "INSERT INTO `tbl_kegiatan` (`id_master_keg`, `NIS`, `tgl_bayar_keg`, `angsuran`, `validasi`, `lunas`) VALUES ('$idkeg', '$nis', NOW(), '$keg', '1', '0');");
//
// $q = mysqli_query($conn, "SELECT id_master_buku FROM master_bybuku WHERE tahun=$thbuku AND tingkat=$tkbuku");
// $a = mysqli_fetch_array($q);
// $idbuku = $a['id_master_buku'];
//
// $q = mysqli_query($conn, "INSERT INTO `tbl_bybuku` (`id_master_buku`, `NIS`, `tgl_bayar_buku`, `angsuran`, `validasi`) VALUES ('$idbuku', '$nis', NOW(), '$book', '1');");

echo "<script>
if (confirm('Total Pembayaran Adalah ". $rp ."?')) {
  window.location.href = '../siswa.php';
} else {
  history.back();
}
			</script>";


?>
