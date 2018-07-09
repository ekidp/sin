<?php
include'koneksi.php';
session_start();
$nis = $_GET['NIS'];

$tbspp = 0;
$bms = 0;
$tbanjas = 0;
$keg = 0;
$book = 0;
$ppdb = 0;

$norek = $_POST['norek'];
$noref = $_POST['noref'];

$q = mysqli_query($conn, "INSERT INTO transfer (norek, noref) VALUES ('$norek', '$noref')") or die (mysqli_error($conn));
$q = mysqli_query($conn, "SELECT idtransfer FROM transfer WHERE norek='$norek' AND noref='$noref'");
$a = mysqli_fetch_array($q);

$idtransfer = $a['idtransfer'];

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
    $q = mysqli_query($conn, "INSERT INTO `tbl_spp_ms` (`id_master_spp`, `NIS`, `bulan`, `tgl_bayar_spp`, `validasi`, `id_master_ms`, idtransfer) VALUES ('$idspp', '$nis', '$value', NOW(), '0', '$idms', '$idtransfer');");
  }
}

if (!empty($_POST['anjas'])) {

  $anjas = $_POST['anjas'];

  $q = mysqli_query($conn, "SELECT by_anjas, potongan FROM master_anjas WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);
  $banjas = $a['by_anjas'];

  if ($a['potongan']==3) {
    $potong = 50;
  }elseif ($a['potongan']==2) {
    $potong = 25;
  }else {
    $potong = 0;
  };

  foreach ($anjas as $key => $value) {
    $tbanjas += $banjas;
    $bulan = date("Y-m-d", strtotime($value));

    $q = mysqli_query($conn, "SELECT idpotanjas FROM master_potanjas WHERE bulan='$value'");
    $a = mysqli_fetch_array($q);
    $idpot = $a['idpotanjas'];

    if ($idpot==3) {
      $pot = 50;
    }elseif ($idpot==2) {
      $pot = 25;
    }else {
      $pot = 0;
    }

  };

  $potong = $tbanjas * ($pot / 100);

  $tbanjas = $tbanjas - $potong;



  $q = mysqli_query($conn, "SELECT id_ms_anjas FROM master_anjas WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);
  $idanjas = $a['id_ms_anjas'];

  foreach ($anjas as $key => $value) {
    $bulan = date("Y-m-d", strtotime($value));

    $q = mysqli_query($conn, "INSERT INTO `tbl_anjas` (`id_master_anjas`, `tgl_bayar_anjas`, `validasi`, `bulan`, idtransfer) VALUES ('$idanjas', NOW(), '0', '$bulan', $idtransfer);");
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
   $q = mysqli_query($conn, "INSERT INTO `tbl_kegiatan` (`id_master_keg`, `NIS`, `tgl_bayar_keg`, `angsuran`, angsuranke, telahbayar, sisa, `validasi`, `lunas`, idtransfer) VALUES ('$idkeg', '$nis', NOW(), '$keg', $hke, $htelah, $hsisa, '0', $lunas, $idtransfer);");

}

if (!empty($_POST['buku'])) {
  $q = mysqli_query($conn, "SELECT m.id_master_buku, m.tahun, m.tingkat, m.harga_buku FROM master_bybuku m, master_siswa s, tbl_kelas_siswa k WHERE s.kelas = k.kelas AND m.tingkat = k.tingkat AND s.NIS = $nis") or die (mysqli_error($conn));
  $b = mysqli_fetch_array($q);

  $tkbuku = $b['tingkat'];
  $thbuku = $_POST['thbuku'];
  $book = $_POST['buku'];
  $idbuku = $b['id_master_buku'];

  $q = mysqli_query($conn, "SELECT * FROM tbl_bybuku WHERE id_master_buku=$idbuku AND NIS=$nis order by id_buku desc limit 1");
  $a = mysqli_fetch_array($q);

  $ke = $a['angsuranke'];
  $telah = $a['telahbayar'];
  $sisa = $a['sisa'];

  if (is_null($sisa)) {
    $sisa = $b['harga_buku'];
  }

  $hke = $ke + 1;
  $htelah = $telah + $book;
  $hsisa = $sisa - $book;

  if ($hsisa == 0) {
    $lunas = 1;
  }else {
    $lunas = 0;
  }

  $q = mysqli_query($conn, "INSERT INTO `tbl_bybuku` (`id_master_buku`, `NIS`, `tgl_bayar_buku`, `angsuran`, `validasi`, `angsuranke`, `telahbayar`, `sisa`, `lunas`, idtransfer) VALUES ($idbuku, $nis, NOW(), $book, '0', $hke, $htelah, $hsisa, $lunas, $idtransfer);");

}

if (!empty($_POST['ppdb'])) {
  $ppdb = $_POST['ppdb'];

  $q = mysqli_query($conn, "SELECT * FROM master_ppdb WHERE NIS=$nis");
  $a = mysqli_fetch_array($q);

  $idppdb = $a['id_master_ppdb'];
  $by = $a['by_ppdb'];

  $q = mysqli_query($conn, "SELECT * FROM tbl_ppdb WHERE id_master_ppdb=$idppdb order by id_ppdb desc limit 1");
  $a = mysqli_fetch_array($q);

  $ke = $a['angsuranke'];
  $telah = $a['telahbayar'];
  $sisa = $a['sisa'];

  if (is_null($sisa)) {
    $sisa = $by;
  }

  $hke = $ke + 1;
  $htelah = $telah + $ppdb;
  $hsisa = $sisa - $ppdb;

  if ($hsisa == 0) {
    $lunas = 1;
  }else {
    $lunas = 0;
  }
   $q = mysqli_query($conn, "INSERT INTO `tbl_ppdb` (`id_master_ppdb`, `tgl_angsuran`, `angsuran`, angsuranke, telahbayar, sisa, `validasi`, `lunas`, idtransfer) VALUES ('$idppdb', NOW(), '$ppdb', $hke, $htelah, $hsisa, '0', $lunas, $idtransfer);")or die(mysqli_error($conn));

}

$total = $tbspp + $bms + $tbanjas + $keg + $book + $ppdb;

$q = mysqli_query($conn, "UPDATE `transfer` SET `total`='$total' WHERE `idtransfer`='$idtransfer'")

$rp = "Rp " . number_format($total,2,',','.');

echo "<script>
if (confirm('Total Pembayaran Adalah ". $rp ."?')) {
  window.location.href = '../siswa.php';
} else {
  //history.back();
}
</script>";

?>
