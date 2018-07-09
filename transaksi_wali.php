<?php
include 'akses/koneksi.php';
session_start();
$_SESSION["NIS"] = '30071014';
$NIS = $_SESSION["NIS"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/css/bootstrap-select.min.css" rel="stylesheet">

</head>
<body>

  <div class="container">
    <form method="post" action="akses/p_bayar_wali.php?NIS=<?= $NIS ?>">
      <div class="form-group">
        <label for="spp">SPP Dan Makan Sehat</label><br/>
        <?php
        $q = mysqli_query($conn, "SELECT bulan from tbl_spp_ms where NIS='$NIS' order by bulan desc limit 1") or die (mysqli_error($conn));
        $count = mysqli_num_rows($q);
        if ($count==0) {
          $year = date("Y");
          $date = "$year-01-01";
        }else {
          $a = mysqli_fetch_array($q);
          $date = $a['bulan'];
        }
        ?>
        <select class="selectpicker" name="spp[]"  multiple>
          <?php
          for ($i=0; $i < 12; $i++) {
            $date = date ("M Y", strtotime("+1 month", strtotime($date)));
            ?>
            <option value="<?= $date ?> "><?= $date ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="anjas">Anjas</label><br/>
        <?php
        $q = mysqli_query($conn, "SELECT t.bulan from tbl_anjas t, master_anjas m where m.id_mS_anjas=t.id_master_anjas AND m.NIS='$NIS' order by bulan desc limit 1") or die (mysqli_error($conn));
        $count = mysqli_num_rows($q);
        if ($count==0) {
          $year = date("Y");
          $date = "$year-01-01";
        }else {
          $a = mysqli_fetch_array($q);
          $date = $a['bulan'];
        }
        ?>
        <select class="selectpicker" name="anjas[]"  multiple>
          <?php
          for ($i=0; $i < 12; $i++) {
            $date = date ("M Y", strtotime("+1 month", strtotime($date)));
            ?>
            <option value="<?= $date ?> "><?= $date ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="kegiatan">Kegiatan</label><br/>
        <select class="selectpicker" name="thkeg">
          <?php
          $qq = mysqli_query($conn, "SELECT m.id_master_keg, m.tahun from  master_kegiatan m, master_siswa s WHERE m.tahun >= s.thn_ajaran AND s.NIS = $NIS");

          while ($aa = mysqli_fetch_array($qq)) {
            echo "<option>" . $aa["tahun"] . "</option>";
            $idmasterkeg[] = $aa["id_master_keg"];
          }
          ?>
        </select>
        <input type="number" class="form-control" placeholder="Masukan Nominal" name="kegiatan">

        <?php
        foreach ($idmasterkeg as $key => $value) {
          $q = mysqli_query($conn, "SELECT * FROM master_kegiatan WHERE id_master_keg = $value");
          $a = mysqli_fetch_array($q);
          $tahun = $a['Tahun'];
          $bykeg = $a['by_keg'];
          $q = mysqli_query($conn, "select m.Tahun, k.sisa, k.lunas, k.angsuranke from tbl_kegiatan k, master_kegiatan m where k.NIS=$NIS AND m.id_master_keg = $value AND k.id_master_keg = m.id_master_keg order by sisa asc limit 1");
          $a = mysqli_fetch_array($q);

          if ($a['lunas'] == 1) {
            $lunas = "Lunas";
          }else {
            $lunas = "Belum Lunas";
          };
          if (is_null($a['sisa'])) {
            $a['sisa'] = $bykeg;
            $a['angsuranke'] = 0;
          };

          echo $tahun . " : Sisa : " . $a['sisa'] . " | Status : " . $lunas . " | Angsuran Ke : " . $a['angsuranke'] ."<br>";
        }

        ?>

      </div>
      <div class="form-group">
        <label for="buku">Buku</label><br/>

        <select class="selectpicker" name="thbuku">
          <?php
          $qq = mysqli_query($conn, "SELECT thn_ajaran from master_siswa WHERE NIS = $NIS") or die (mysqli_error($conn));
          $aa = mysqli_fetch_array($qq);
          $tahun = $aa['thn_ajaran'];
          for ($i=0; $i < 6; $i++) {
            echo "<option>" . $tahun . "</option>";
            $tahun += 1;
          }
          ?>
        </select>

        <input type="number" class="form-control" placeholder="Masukan Nominal" name="buku" >
        <?php

        $q = mysqli_query($conn, "SELECT m.tahun, m.tingkat, m.harga_buku FROM master_bybuku m, master_siswa s, tbl_kelas_siswa k WHERE s.kelas = k.kelas AND m.tingkat = k.tingkat AND s.NIS = $NIS") or die (mysqli_error($conn));
        $b = mysqli_fetch_array($q);

        $q = mysqli_query($conn, "SELECT m.harga_buku, m.tingkat, m.tahun, b.sisa, b.lunas, b.angsuranke FROM master_bybuku m, tbl_bybuku b, master_siswa s, tbl_kelas_siswa k WHERE s.kelas = k.kelas AND k.tingkat = m.tingkat AND m.id_master_buku = b.id_master_buku AND b.NIS = s.NIS AND s.NIS = $NIS ORDER BY b.tgl_bayar_buku DESC LIMIT 1") or die (mysqli_error($conn));
        $a = mysqli_fetch_array($q);

        if ($a['lunas'] == 1) {
          $lunas = "Lunas";
        }else {
          $lunas = "Belum Lunas";
        };

        if (is_null($a['sisa'])) {
          $a['sisa'] = $b['harga_buku'];
          $a['tahun'] = $b['tahun'];
          $a['tingkat'] = $b['tingkat'];
          $a['angsuranke'] = 0;
        };

        echo $a['tahun'] . " : Tingkat : " . $a['tingkat'] . " | Sisa : " . $a['sisa'] . " | Status : " . $lunas . " | Angsuran Ke : " . $a['angsuranke'] . "<br>";


        ?>

      </div>
      <div class="form-group">
        <label for="ppdb">PPDB</label><br/>

        <input type="number" class="form-control" placeholder="Masukan Nominal" name="ppdb">

        <?php
        $q = mysqli_query($conn, "SELECT * FROM master_ppdb WHERE NIS=$NIS") or die (mysqli_error($conn));
        $b = mysqli_fetch_array($q);

        $idppdb = $b['id_master_ppdb'];

        $q = mysqli_query($conn, "SELECT m.by_ppdb, m.id_master_ppdb, b.sisa, b.lunas, b.angsuranke FROM master_ppdb m, tbl_ppdb b WHERE m.id_master_ppdb = b.id_master_ppdb AND b.id_master_ppdb = $idppdb order by b.id_ppdb desc limit 1") or die (mysqli_error($conn));
        $a = mysqli_fetch_array($q);

        if ($a['lunas'] == 1) {
          $lunas = "Lunas";
        }else {
          $lunas = "Belum Lunas";
        };

        if (is_null($a['sisa'])) {
          $a['sisa'] = $b['by_ppdb'];
          $a['angsuranke'] = 0;
        };

        echo "Sisa : " . $a['sisa'] . " | Status : " . $lunas . " | Angsuran Ke : " . $a['angsuranke'] . "<br>";

        ?>

      </div>
      <div class="form-group">
        <h3>Bukti Transfer</h3>
        <label for="norek">Nomor Rekening :</label>
        <input type="number" name="norek" value="" class="form-control" required>
        <label for="noref">Nomor Ref :</label>
        <input type="number" name="noref" value="" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="asset/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/js/bootstrap-select.min.js"></script>
  <script src="asset/js/i18n/defaults-en_US.js"></script>
</body>
</html>
