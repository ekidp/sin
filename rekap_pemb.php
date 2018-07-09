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
    <div class="table-responsive">
      <table data-toggle="table" data-search="true" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">Kelas</th>
            <th data-sortable="true">Nama Siswa</th>
            <th data-sortable="true">NIS</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include'akses/koneksi.php';
          session_start();
          $q = mysqli_query($conn, "SELECT * from master_siswa order by kelas asc") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
          ?>
          <tr>
            <td><?= $a['kelas']?></td>
            <td><?= $a['nama']?></td>
            <td><?= $a['NIS']?></td>
            <td>
              <div class="btn-group">
              <button class="btn btn-primary center-block" onclick="window.location='rekap.php?NIS=<?= $a['NIS']?>';" >Pilih</button>
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
