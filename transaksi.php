<?php
include'akses/koneksi.php';
session_start();
$NIS = $_GET["NIS"];
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
    <form method="post" action="akses/p_bayar.php?NIS=<?= $NIS ?>">
      <div class="form-group">
        <label for="spp">SPP Dan Makan Sehat</label><br/>
        <select class="selectpicker" name="spp[]"  multiple required>
          <?php

          $q = mysqli_query($conn, "SELECT bulan from tbl_spp_ms where NIS='$NIS' order by bulan desc limit 1");
          $count = mysqli_num_rows($q);
          if ($count==0) {
            $year = date("Y");
            $date = date_create("$year-01-01");
          }else {
            $a = mysqli_fetch_array($q);
            $date = date_create($a["bulan"]);
          }
          for ($i=0; $i < 12; $i++) {
            $dateadd = date_add($date,date_interval_create_from_date_string("1 month"));
            ?>
            <option value="<?php $dateadd ?> "><?= date_format($dateadd,"M Y"); ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="anjas">Anjas</label><br/>
        <select class="selectpicker" name="anjas[]" multiple required>
          <?php
          $q = mysqli_query($conn, "SELECT bulan from tbl_anjas where NIS='$NIS' order by bulan desc limit 1");
          $count = mysqli_num_rows($q);
          if ($count==0) {
            $year = date("Y");
            $date = date_create("$year-01-01");
          }else {
            $a = mysqli_fetch_array($q);
            $date = date_create($a["bulan"]);
          }
          for ($i=0; $i < 12; $i++) {
            ?>
            <option value="<?php date_add($date,date_interval_create_from_date_string("1 month")) ?>"><?= date_format(date_add($date,date_interval_create_from_date_string("1 month")),"M Y"); ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="kegiatan">Kegiatan</label><br/>
        <select class="selectpicker" name="tkkeg">
          <option disabled selected value> -- select an option -- </option>
          <?php
          for ($i=1; $i < 7; $i++) {
            echo "<option>" . $i . "</option>";
          }
          ?>
        </select>
        <select class="selectpicker" name="thkeg">
          <?php
          $qq = mysqli_query($conn, "SELECT m.tahun from  master_kegiatan m, master_siswa s WHERE m.tahun >= s.thn_ajaran AND s.NIS = $NIS");

          while ($aa = mysqli_fetch_array($qq)) {
            echo "<option>" . $aa["tahun"] . "</option>";
          }
          ?>
        </select>
        <input type="number" class="form-control" placeholder="Masukan Nominal" name="kegiatan">
        <input type="number" class="form-control" name="sisakegiatan" disabled>
      </div>
      <div class="form-group">
        <label for="buku">Buku</label><br/>
        <select class="selectpicker" name="tkbuku">
          <option disabled selected value> -- select an option -- </option>
          <?php
          for ($i=1; $i < 7; $i++) {
            echo "<option>" . $i . "</option>";
          }
          ?>
        </select>
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
        <input type="number" class="form-control" name="sisabuku" disabled>
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
