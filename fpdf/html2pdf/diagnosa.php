<?php  
session_start();  
ob_start();  
include_once("../../config/koneksi.php"); //buat koneksi ke database
	  $u=$_SESSION['username'];
	  
$qry = mysqli_query($titid, "SELECT * FROM hasil_diagnosa, tabel_penyakit, user WHERE tabel_penyakit.kode_penyakit=hasil_diagnosa.kode_penyakit AND hasil_diagnosa.username=user.username AND hasil_diagnosa.id_diagnosa='$_GET[id]' ORDER BY hasil_diagnosa.id_diagnosa DESC LIMIT 1") or die (mysqli_error());
$data = mysqli_fetch_array($qry);
$id = $data['id_diagnosa'];
mysqli_query($titid, "TRUNCATE TABLE `tmp_analisa`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_gejala`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_penyakit`");
?>  
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
<title>Hasil Diagnosa</title>  
</head>  
<body>   
<h1 align='center'> Hasil Diagnosa Saudara/i <?php echo $data['nama'];?></h1> 
<p bgcolor="f0f0f0"><h4 >Biodata User (Pasien)</h4></p>
<table border="0">  
 <tr>  
    <td width="100">Nama</td>  
    <td width="10">:</td>  
    <td width="600"><?php echo $data['nama'];?></td>  
  </tr>  
  <tr>  
    <td>Usia</td>  
    <td>:</td>  
    <td><?php echo $data['umur'];?></td>  
  </tr>  
  <tr>  
    <td>Jenis kelamin</td>  
    <td>:</td>  
    <td><?php echo $data['jk'];?></td>  
  </tr>  
   <tr>  
    <td>Alamat</td>  
    <td>:</td>  
    <td><?php echo $data['alamat'];?></td>  
  </tr>  
</table>
<p><h4>Hasil Diagnosa</h4></p>
<table border="0" bgcolor="">  
 <tr>  
    <td width="150">Penyakit yang diderita</td>  
    <td width="10">:</td>  
    <td width="380"><?php echo $data['nm_penyakit'];?></td>  
  </tr> 
  
  <tr>
    <td width="150">Gejala Umum</td>
    <td width="10">:</td>
    <td width="380">
      <?php
    $sql_gejala = "SELECT tabel_gejala.* FROM tabel_gejala,rule
            WHERE tabel_gejala.kode_gejala=rule.kode_gejala
            AND rule.kode_penyakit='$data[kode_penyakit]'";
    $qry_gejala = mysqli_query($titid, $sql_gejala);
      $i=0;
      while($hsl_gejala=mysqli_fetch_array($qry_gejala)){
        $i++;
        echo $i.$hsl_gejala['nm_gejala']; ?><br><?php
      } 
      ?>   </td>
  </tr>
  
  
  <tr>  
    <td width="150">Definisi</td>  
    <td width="10">:</td>  
    <td width="400"><?php echo $data['definisi'];?></td>  
  </tr> 
   <tr>  
    <td width="150">Pengobatan/Pencegahan</td>  
    <td width="5">:</td>  
    <td width="400"><?php echo $data['pengobatan'];?></td>  
  </tr> 
  
  <tr>  
    <td width="150">Waktu Diagnosa</td>  
    <td width="10">:</td>  
    <td width="400"><?php echo $data['tanggal_diagnosa'];?></td>  
  </tr> 
</table>

</body>  
</html><!-- Akhir halaman HTML yang akan di konvert -->  
<?php  
$filename="diagnosa".$id.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
//==========================================================================================================  
$content = ob_get_clean();  
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';  
 require_once(dirname(__FILE__).'/html2pdf.class.php');  
 try  
 {  
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 10, 30, 30));  
  $html2pdf->setDefaultFont('Arial');  
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
  $html2pdf->Output($filename);  
 }  
 catch(HTML2PDF_exception $e) { echo $e; }  
?>  