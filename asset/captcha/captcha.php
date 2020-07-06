<?php
session_start();
header("Content-type: image/jpg");
//generate Code
function RandomCode($max){
//Huruf dan angka yang akan di acak
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
//capthcacapthcacapthcacapthcacapthcacapthcacapthcacapthcacapthca
$char = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y",
			  "Z","1","2","3","4","5","6","7","8","9");
$keys = array();
while(count($keys) < $max) {
    $x = mt_rand(0, count($char)-1);
    if(!in_array($x, $keys)) {
       $keys[] = $x;   
    }		
}
$random='';
foreach($keys as $key => $val){
   $random .= $char[$val];  
}
return $random;
}
// $font_size = '20';
$font='./font/BALONXB.TTF'; //setting font yang akan digunakan
$images='./images/apa.jpg'; //gambar yang akan digunakan sebagai background
$im = imagecreatefromjpeg("$images")or die("Cannot Initialize new GD image stream");
$text_color = imagecolorallocate($im, 255, 255, 255); //menentukan warna text
//Generate kode yang akan dituliskan pada gambar sebanyak 6
$text=RandomCode(6);
//Buat sessi untuk pengecekan pada halaman lain
$_SESSION['captcha']=$text;
echo $text;
//Tuliskan text pada gambar
imagettftext($im, 40, 0, 20, 60, $text_color, $font, $text);
imagejpeg($im);
imagedestroy($im);
?> 