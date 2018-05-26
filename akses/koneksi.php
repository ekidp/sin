<?php
$conn = mysqli_connect("localhost","root","","administrasi");

if(mysqli_connect_errno()){
	echo "Koneksi Database gagal :". mysqli_connect_errno();
}
?>
