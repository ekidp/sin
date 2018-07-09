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
    <h2>SPP</h2>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tanggal Bayar</th>
            <th data-sortable="true">Bulan</th>

          </tr>
        </thead>
        <tbody>
          <?php
          include'akses/koneksi.php';
          session_start();
          $_SESSION["NIS"] = '30071014';
          $NIS = $_SESSION["NIS"];
          $n = 0;
          $q = mysqli_query($conn, "SELECT * from tbl_spp_ms WHERE NIS='$NIS' order by bulan asc") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
            $n++;
            ?>
            <tr>
              <td><?= $n?></td>
              <td><?= $a['tgl_bayar_spp']?></td>
              <td><?= date("M Y", strtotime($a['bulan']))?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <h2>ANJAS</h2>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tanggal Bayar</th>
            <th data-sortable="true">Bulan</th>

          </tr>
        </thead>
        <tbody>
          <?php
          $n = 0;
          $q = mysqli_query($conn, "SELECT t.id_anjas, t.validasi, t.tgl_bayar_anjas, t.bulan from tbl_anjas t, master_anjas m WHERE t.id_master_anjas = m.id_ms_anjas AND m.NIS='$NIS' order by bulan asc") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
            $n++;
            ?>
            <tr>
              <td><?= $n?></td>
              <td><?= $a['tgl_bayar_anjas']?></td>
              <td><?= date("M Y", strtotime($a['bulan']))?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <h2>KEGIATAN</h2>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tahun</th>
            <th data-sortable="true">Tanggal Bayar</th>
            <th data-sortable="true">Angsuran</th>
            <th data-sortable="true">Angsuran Ke</th>
            <th data-sortable="true">Telah Bayar</th>
            <th data-sortable="true">Sisa</th>
            <th data-sortable="true">Status</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $n = 0;
          $q = mysqli_query($conn, "SELECT t.id_keg, m.Tahun, t.tgl_bayar_keg, t.angsuran, t.angsuranke, t.telahbayar, t.sisa, t.validasi, t.lunas FROM master_kegiatan m, tbl_kegiatan t WHERE m.id_master_keg = t.id_master_keg AND t.NIS = '$NIS' order by Tahun asc") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
            $n++;
            if ($a['lunas'] == 1) {
              $status = 'Lunas';
            }else {
              $status = 'Belum Lunas';
            }
            ?>
            <tr>
              <td><?= $n ?></td>
              <td><?= $a['Tahun'] ?></td>
              <td><?= $a['tgl_bayar_keg'] ?></td>
              <td><?= $a['angsuran'] ?></td>
              <td><?= $a['angsuranke'] ?></td>
              <td><?= $a['telahbayar'] ?></td>
              <td><?= $a['sisa'] ?></td>
              <td><?= $status ?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
    <h2>BUKU</h2>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tahun</th>
            <th data-sortable="true">Tingkat</th>
            <th data-sortable="true">Tanggal Bayar</th>
            <th data-sortable="true">Angsuran</th>
            <th data-sortable="true">Angsuran Ke</th>
            <th data-sortable="true">Telah Bayar</th>
            <th data-sortable="true">Sisa</th>
            <th data-sortable="true">Status</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $n = 0;
          $q = mysqli_query($conn, "SELECT t.id_buku, m.tahun, m.tingkat, t.tgl_bayar_buku, t.angsuran, t.angsuranke, t.telahbayar, t.sisa, t.validasi, t.lunas FROM master_bybuku m, tbl_bybuku t WHERE m.id_master_buku = t.id_master_buku AND t.NIS = '$NIS' order by tahun asc") or die (mysqli_error($conn));
          while($a = mysqli_fetch_array($q)){
            $n++;
            if ($a['lunas'] == 1) {
              $status = 'Lunas';
            }else {
              $status = 'Belum Lunas';
            }
            ?>
            <tr>
              <td><?= $n ?></td>
              <td><?= $a['tahun'] ?></td>
              <td><?= $a['tingkat'] ?></td>
              <td><?= $a['tgl_bayar_buku'] ?></td>
              <td><?= $a['angsuran'] ?></td>
              <td><?= $a['angsuranke'] ?></td>
              <td><?= $a['telahbayar'] ?></td>
              <td><?= $a['sisa'] ?></td>
              <td><?= $status ?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <h2>PPDB</h2>
    <div class="table-responsive">
      <table data-toggle="table" data-pagination="true">
        <thead>
          <tr>
            <th data-sortable="true">No</th>
            <th data-sortable="true">Tanggal Bayar</th>
            <th data-sortable="true">Angsuran</th>
            <th data-sortable="true">Angsuran Ke</th>
            <th data-sortable="true">Telah Bayar</th>
            <th data-sortable="true">Sisa</th>
            <th data-sortable="true">Status</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $n = 0;
          $q = mysqli_query($conn, "SELECT t.id_ppdb, t.tgl_angsuran, t.angsuran, t.angsuranke, t.telahbayar, t.sisa, t.validasi, t.lunas FROM master_ppdb m, tbl_ppdb t WHERE m.id_master_ppdb = t.id_master_ppdb AND m.NIS = '$NIS' ") or die (mysql_error($conn));
          while($a = mysqli_fetch_array($q)){
            $n++;
            if ($a['lunas'] == 1) {
              $status = 'Lunas';
            }else {
              $status = 'Belum Lunas';
            }
            ?>
            <tr>
              <td><?= $n ?></td>
              <td><?= $a['tgl_angsuran'] ?></td>
              <td><?= $a['angsuran'] ?></td>
              <td><?= $a['angsuranke'] ?></td>
              <td><?= $a['telahbayar'] ?></td>
              <td><?= $a['sisa'] ?></td>
              <td><?= $status ?></td>

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
