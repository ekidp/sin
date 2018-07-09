<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>
  <?php
  include 'akses/koneksi.php';
  $ms = $_GET['ms'];
  $anjas = $_GET['anjas'];
   ?>
  <form class="" action="akses/p_edit_bulanan.php?ms=<?= $ms ?>&anjas=<?= $anjas ?>" method="post">
    <div class="form-group">
      <h3>DATA PEMBAYARAN BULANAN</h3>
      <?php

        $q = mysqli_query($conn, "SELECT harga, jml_hari FROM master_ms WHERE id_master_ms = $ms");
        $a = mysqli_fetch_array($q);
        $harga = $a['harga'];
        $hari = $a['jml_hari'];
        $q = mysqli_query($conn, "SELECT potongan FROM master_potanjas WHERE idpotanjas = $anjas");
        $a = mysqli_fetch_array($q);
        $pot = $a['potongan'];
       ?>
      <div class="form-group">
        <label for="kegiatan"><b>Makan Siang</b></label>
        <input type="number" class="form-control" placeholder="Masukan Nominal Biaya Makan" name="hms" value="<?= $harga ?>" required><br>
        <input type="number" class="form-control" placeholder="Masukan Jumlah Hari" name="dms" value="<?= $hari ?>" required>
      </div>
      <div class="form-group">
        <label for="kegiatan"><b>Anjas</b></label>
        <input type="radio" name="panjas" value="1" required <?php if ($pot==1) { echo "checked"; }?>> 0%
        <input type="radio" name="panjas" value="2" required <?php if ($pot==2) { echo "checked"; }?>> 25%
        <input type="radio" name="panjas" value="3" required <?php if ($pot==3) { echo "checked"; }?>> 50%

        <br>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>


      <script src="asset/js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="asset/js/bootstrap.min.js"></script>
      <script src="asset/js/bootstrap-select.min.js"></script>
      <script src="asset/js/i18n/defaults-en_US.js"></script>
    </body>
    </html>
