<?php
include'koneksi.php';
session_start();
$nis = $_POST['nis'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$gender = $_POST['gender'];
$tmplahir = $_POST['tmplahir'];
$tgllahir = $_POST['tgllahir'];
$agama = $_POST['agama'];
$spp = $_POST['spp'];
$anjas = $_POST['anjas'];
$ppdb = $_POST['ppdb'];
$date = date_create($tgllahir);
$date = date_format($date,"Y-m-d");
$ynow = date('Y');


 $q = mysqli_query($conn, "INSERT INTO master_siswa (`NIS`, `password`, `nama`, `kelas`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `thn_ajaran`) VALUES ('$nis', '$password', '$nama', '$kelas', '$gender', '$tmplahir', '$date', '$agama', '$ynow');") or die(mysqli_error($conn));
 $q = mysqli_query($conn, "INSERT INTO `master_spp` (`NIS`, `pemb_spp`) VALUES ('$nis', '$spp')") or die(mysqli_error($conn));
 if ($anjas>1) {
   $q = mysqli_query($conn, "INSERT INTO `master_anjas` (`NIS`, `by_anjas`) VALUES ('$nis', '$anjas')") or die(mysqli_error($conn));
 }

 $q = mysqli_query($conn, "INSERT INTO `master_ppdb` (`NIS`, `by_ppdb`) VALUES ('$nis', '$ppdb')") or die(mysqli_error($conn));


echo "<script>
    alert('Data Berhasil Disimpan');
    location='../t_siswa.php';
  </script>";

?>
