<?php
session_start();
session_destroy();
 echo '<script language="javascript">  
 alert("Logout Berhasil!");  
 window.location="index.php";  
 </script>';  
 exit();  

?>