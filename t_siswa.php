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
     <form class="" action="akses/p_siswa.php" method="post">
         <h3>FORM DATA SISWA BARU</h3>
           <div class="form-group">
             <label for="nis">NIS :</label>
             <input type="number" name="nis" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="password">Password :</label>
             <input type="password" name="password" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="nama">Nama :</label>
             <input type="text" name="nama" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="kelas">Kelas :</label>
             <select class="form-control" name="kelas"  required>

               <?php
                include 'akses/koneksi.php';
                $q = mysqli_query($conn, "SELECT * FROM tbl_kelas_siswa order by tingkat asc");
                while ($a = mysqli_fetch_array($q)) {
                  echo "<option> " . $a['kelas'] . " </option>";
                }
                ?>
             </select>
           </div>
           <div class="form-group">
             <label for="gender">Jenis Kelamin :</label><br>
             <input type="radio" name="gender" value="L" checked>Laki-Laki</input>
             <input type="radio" name="gender" value="P">Perempuan</input>
           </div>
           <div class="form-group">
             <label for="tmplahir">Tempat Lahir :</label>
             <input type="text" name="tmplahir" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="tgllahir">Tanggal Lahir :</label>
             <input type="date" name="tgllahir" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="agama">Agama :</label>
             <select class="form-control" name="agama" required>
               <option value="islam">Islam</option>
               <option value="katolik">Katolik</option>
               <option value="protestan">Protestan</option>
               <option value="hindu">Hindu</option>
               <option value="budha">Budha</option>
               <option value="konghucu">Konghucu</option>
             </select>
           </div>
           <div class="form-group">
             <label for="spp">Biaya SPP :</label>
             <input type="number" name="spp" value="" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="anjas">Biaya Anjas</label>
             <input type="number" name="anjas" value="" class="form-control">
           </div>
           <div class="form-group">
             <label for="ppdb">Biaya PPDB</label>
             <input type="number" name="ppdb" value="" class="form-control" required>
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
