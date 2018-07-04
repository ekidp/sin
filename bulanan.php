<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>
  <form class="" action="akses/p_bulanan.php" method="post">

    <div class="form-group">
      <h3>DATA PEMBAYARAN BULANAN</h3>
      <label for="bulan"><b>Pilih Bulan</label><br>
        <select class="selectpicker" name="bulan" required>
          <?php
          include'akses/koneksi.php';
          $q = mysqli_query($conn, "SELECT bulan from master_ms order by bulan desc limit 1");
          $a = mysqli_fetch_array($q);
          echo $a["bulan"];
          $date = date_create($a["bulan"]);

          for ($i=0; $i < 5; $i++) {
            $dateadd = date_add($date,date_interval_create_from_date_string("1 month"));
            ?>
            <option ><?= date_format($dateadd,"M Y"); ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="kegiatan"><b>Makan Siang</b></label>
        <input type="number" class="form-control" placeholder="Masukan Nominal Biaya Makan" name="hms" required><br>
        <input type="number" class="form-control" placeholder="Masukan Jumlah Hari" name="dms" required>
      </div>
      <div class="form-group">
        <label for="kegiatan"><b>Anjas</b></label>
        <input type="radio" name="panjas" value="1" checked required> 0%
        <input type="radio" name="panjas" value="2" required> 25%
        <input type="radio" name="panjas" value="3" required> 50%

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


      <script src="asset/js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="asset/js/bootstrap.min.js"></script>
      <script src="asset/js/bootstrap-select.min.js"></script>
      <script src="asset/js/i18n/defaults-en_US.js"></script>
    </body>
    </html>
