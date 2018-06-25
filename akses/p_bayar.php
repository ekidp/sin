<?php
include'koneksi.php';
session_start();
$nis = $_GET['NIS'];

$tbspp = 0;
$bms = 0;
$tbanjas = 0;
$keg = 0;
$book = 0;

if (!empty($_POST['spp'])) {

  $spp = $_POST['spp'];

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

  $q = mysqli_query($conn, "SELECT id_master_spp FROM master_spp WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);
  $idspp = $a['id_master_spp'];

  foreach ($bulan as $key => $value) {
    $q = mysqli_query($conn, "SELECT id_master_ms FROM master_ms WHERE bulan='$value'") or die (mysqli_error($conn));
    $a = mysqli_fetch_array($q);
    $idms = $a['id_master_ms'];
    $q = mysqli_query($conn, "INSERT INTO `tbl_spp_ms` (`id_master_spp`, `NIS`, `bulan`, `tgl_bayar_spp`, `validasi`, `id_master_ms`) VALUES ('$idspp', '$nis', '$value', NOW(), '1', '$idms');");
  }
}

if (!empty($_POST['anjas'])) {

  $anjas = $_POST['anjas'];

  $q = mysqli_query($conn, "SELECT by_anjas FROM master_anjas WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);
  $banjas = $a['by_anjas'];

  foreach ($anjas as $key => $value) {
    $tbanjas += $banjas;
  }

  $q = mysqli_query($conn, "SELECT id_ms_anjas FROM master_anjas WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);
  $idanjas = $a['id_ms_anjas'];

  foreach ($anjas as $key => $value) {
    $bulan = date("Y-m-d", strtotime($value));
    $q = mysqli_query($conn, "INSERT INTO `tbl_anjas` (`id_master_anjas`, `NIS`, `tgl_bayar_anjas`, `validasi`, `bulan`) VALUES ('$idanjas', '$nis', NOW(), '1', '$bulan');");
  }

}

if (!empty($_POST['kegiatan'])) {
  $thkeg = $_POST['thkeg'];
  $keg = $_POST['kegiatan'];

  $q = mysqli_query($conn, "SELECT * FROM master_kegiatan WHERE Tahun=$thkeg");
  $a = mysqli_fetch_array($q);
  $idkeg = $a['id_master_keg'];
  $by = $a['by_keg'];

  $q = mysqli_query($conn, "SELECT * FROM tbl_kegiatan WHERE id_master_keg=$idkeg AND NIS=$nis order by id_keg desc limit 1");
  $a = mysqli_fetch_array($q);

  $ke = $a['angsuranke'];
  $telah = $a['telahbayar'];
  $sisa = $a['sisa'];

  if (is_null($sisa)) {
    $sisa = $by;
  }

  $hke = $ke + 1;
  $htelah = $telah + $keg;
  $hsisa = $sisa - $keg;

  if ($hsisa == 0) {
    $lunas = 1;
  }else {
    $lunas = 0;
  }
   $q = mysqli_query($conn, "INSERT INTO `tbl_kegiatan` (`id_master_keg`, `NIS`, `tgl_bayar_keg`, `angsuran`, angsuranke, telahbayar, sisa, `validasi`, `lunas`) VALUES ('$idkeg', '$nis', NOW(), '$keg', $hke, $htelah, $hsisa, '1', $lunas);");

}

if (!empty($_POST['buku'])) {
  $q = mysqli_query($conn, "SELECT m.id_master_buku, m.tahun, m.tingkat, m.harga_buku FROM master_bybuku m, master_siswa s, tbl_kelas_siswa k WHERE s.kelas = k.kelas AND m.tingkat = k.tingkat AND s.NIS = $nis") or die (mysqli_error($conn));
  $b = mysqli_fetch_array($q);

  $tkbuku = $b['tingkat'];
  $thbuku = $_POST['thbuku'];
  $book = $_POST['buku'];
  $idbuku = $b['id_master_buku'];

  $q = mysqli_query($conn, "INSERT INTO `tbl_bybuku` (`id_master_buku`, `NIS`, `tgl_bayar_buku`, `angsuran`, `validasi`, `ansuranke`, `telahbayar`, `sisa`, `lunas`) VALUES ($idbuku, $nis, NOW(), $book, '1', '1', '2', '2', '2');");

}

$total = $tbspp + $bms + $tbanjas + $keg + $book ;

$rp = "Rp " . number_format($total,2,',','.');

echo "<script>
if (confirm('Total Pembayaran Adalah ". $rp ."?')) {
  window.location.href = '../siswa.php';
} else {
  //history.back();
}
</script>";

?>
