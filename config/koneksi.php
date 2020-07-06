<?php
//memanggil fungsi validasi
require_once('fungsi_validasi.php');

// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "pakaranak";

// Koneksi dan memilih database di server
$titid = mysqli_connect($server,$username,$password, $database);
/*mysqli_select_db($database) or die("Database tidak bisa dibuka");*/

// buat variabel untuk validasi dari file fungsi_validasi.php
/*$val = new Lokovalidasi;*/
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>