<?php
include'akses/koneksi.php';
session_start();

if (empty($_GET["NIS"])) {
  echo "<script type='text/javascript'>location.href = 'siswa.php';</script>";
}else {
  $NIS = $_GET["NIS"];
}

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
        <?php
        $q = mysqli_query($conn, "SELECT bulan from tbl_spp_ms where NIS='$NIS' order by bulan desc limit 1");
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
          $q = mysqli_query($conn, "SELECT bulan from tbl_anjas where NIS='$NIS' order by bulan desc limit 1");
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
                $q = mysqli_query($conn, "select m.Tahun, k.sisa, k.lunas from tbl_kegiatan k, master_kegiatan m where k.NIS=$NIS AND m.id_master_keg = $value AND k.id_master_keg = m.id_master_keg order by sisa asc limit 1");
                $a = mysqli_fetch_array($q);

                if ($a['lunas'] == 1) {
                  $lunas = "Lunas";
                }else {
                  $lunas = "Belum Lunas";
                }

                echo $tahun . " : Sisa : " . $a['sisa'] . " Status : " . $lunas . "<br>";
              }

              ?>


      </div>
      <div class="form-group">
        <label for="buku">Buku</label><br/>
        <select class="selectpicker" name="tkbuku">
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
