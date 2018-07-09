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
    $q = mysqli_query($conn, "SELECT tahun from master_kegiatan order by tahun desc limit 1");
    $a = mysqli_fetch_array($q);
   ?>
   <div class="container">
     <form class="" action="akses/p_keg.php" method="post">
         <h3>TAMBAH DATA KEGIATAN</h3>
           <div class="form-group">
             <label for="tahun">Tahun</label>
             <input type="text" class="form-control" name="tahun" value="<?= $a['tahun']+1 ?>" disabled>
           </div>
           <div class="form-group">
             <label for="harga">Harga</label>
             <input type="number" class="form-control" name="harga" value="">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
   </div>



      <script src="asset/js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="asset/js/bootstrap.min.js"></script>
      <script src="asset/js/bootstrap-select.min.js"></script>
      <script src="asset/js/i18n/defaults-en_US.js"></script>
    </body>
    </html>
