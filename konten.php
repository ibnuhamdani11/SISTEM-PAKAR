<?php
error_reporting(E_ALL ^ E_NOTICE);	
if ($_GET['p']=='galeri'){ 
	include "user/gallery.php";
}elseif ($_GET['p']=='about') {
	include "user/about.php";
}elseif ($_GET['p']=='diagnosa') {
	include "user/diagnosa.php";
}elseif ($_GET['p']=='petunjuk') {
	include "user/petunjuk.php";
}elseif ($_GET['p']=='home') {
	include "user/home.php";
}elseif ($_GET['p']=='history') {
	include "user/history.php";
}elseif ($_GET['p']=='register') {
	include "user/register.php";
}elseif ($_GET['p']=='gantipass') {
	include "user/gantipass.php";
}elseif ($_GET['p']=='lupapass') {
	include "user/lupa_pswd.php";
}elseif ($_GET['p']=='') {
}
?>