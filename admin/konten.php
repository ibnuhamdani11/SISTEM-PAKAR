<?php
error_reporting(E_ALL ^ E_NOTICE);	
if ($_GET['p']=='penyakit') {
	include "modul/penyakit.php";
}elseif ($_GET['p']=='gejala') {
	include "modul/gejala.php";
}elseif ($_GET['p']=='rule') {
	include "modul/rule.php";
}elseif ($_GET['p']=='member') {
	include "modul/member.php";
}elseif ($_GET['p']=='bobot') {
	include "modul/bobot.php";
}elseif ($_GET['p']=='info') {
	include "modul/info.php";
}elseif ($_GET['p']=='gantipassword') {
	include "modul/ganti_password.php";
}elseif ($_GET['p']=='pertanyaan') {
	include "modul/pertanyaan.php";
}elseif ($_GET['p']=='home') {
	include "modul/home.php";
}elseif ($_GET['p']=='pakar') {
	include "modul/pakar.php";
}elseif ($_GET['p']=='hasil') {
	include "modul/hasil_diagnosa.php";
}
?>