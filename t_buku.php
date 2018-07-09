<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
     <form class="" action="akses/p_buku.php" method="post">
         <h3>TAMBAH DATA BUKU</h3>
           <div class="form-group">
             <label for="tahun">Tahun</label>
             <select class="form-control" name="tahun">
               <option><?= date("Y") ?></option>
               <option><?= date("Y")+1 ?></option>
             </select>
           </div>
           <div class="form-group">
             <label for="tingkat">Tingkat</label>
             <select class="form-control" name="tingkat">
               <?php
                for ($i=1; $i < 7; $i++) {
                  echo "<option>" . $i . "</option>";
                }
                ?>
             </select>
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
