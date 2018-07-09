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
  <link href="asset/table/bootstrap-table.min.css" rel="stylesheet">


</head>
<body>
  <div class="container">
    <button class="btn btn-primary" onclick="window.location='t_keg.php';" >Tambah</button>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tahun</th>
            <th data-sortable="true">Biaya Kegiatan</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include'akses/koneksi.php';
          session_start();
          $num = 0;
          $q = mysqli_query($conn, "SELECT * FROM master_kegiatan") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
            $num++;

          ?>
          <tr>
            <td><?= $num ?></td>
            <td><?= $a['Tahun']?></td>
            <td><?= $a['by_keg']?></td>

            <td>
              <div class="btn-group">
              <button class="btn btn-primary center-block" onclick="window.location='e_bulanan.php?ms=<?= $a['id_master_ms']?>&anjas=<?= $a['idpotanjas']?>';" >Edit</button>
            </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="asset/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/table/bootstrap-table.min.js"></script>
<script src="asset/table/locale/bootstrap-en-US.js"></script>

</body>
</html>
