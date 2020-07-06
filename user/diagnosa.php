
  <style type="text/css">
/* untuk pemakaian di blog/website anda, yang di copy hanya css di bawah ini*/

  /* style untuk link popup */
  a.popup-link {
    padding:17px 0;
    text-align: center;
    margin:7% auto;
    position: relative;
    width: 300px;
    color: #fff;
    text-decoration: none;
    background-color: #FFBA00;
    border-radius: 3px;
    box-shadow: 0 5px 0px 0px #eea900;
    display: block;
  }
  a.popup-link:hover {
    background-color: #ff9900;
    box-shadow: 0 3px 0px 0px #eea900;
    -webkit-transition:all 1s;
    -moz-transition:all 1s;
    transition:all 1s;
  }
  /* end link popup*/

  /*style untuk popup */  
  #popup {
    visibility: hidden;
    opacity: 0;
    margin-top: -200px;
  }
  #popup:target {
    visibility:visible;
    opacity: 1;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    margin:0;
    z-index: 99999999999;
    -webkit-transition:all 1s;
    -moz-transition:all 1s;
    transition:all 1s;
  }

  @media (min-width: 768px){
    .popup-container {
      width:600px;
    }
  }
  @media (max-width: 767px){
    .popup-container {
      width:100%;
    }
  }
  .popup-container {
    position: relative;
    margin:7% auto;
    padding:30px 50px;
    background-color: #C9BAAB;
    color:#333;
    border-radius: 3px;
  }

  a.popup-close {
    position: absolute;
    top:3px;
    right:3px;
    background-color: #333;
    padding:7px 10px;
    font-size: 20px;
    text-decoration: none;
    line-height: 1;
    color:#fff;
  }

  /* style untuk isi popup */


  .popup-form {
    margin:10px auto;
  }
    .popup-form h2 {
      margin-bottom: 5px;
      font-size: 20px;
      text-transform: uppercase;
      color: #000;
    }
    .popup-form .input-group {
      margin:10px auto;
      
    }
      .popup-form .input-group input {
        padding:17px;
        text-align: center;
        margin-bottom: 10px;
        border-radius:3px;
        font-size: 16px; 
        display: block;
        width: 100%;
      }
      .popup-form .input-group input:focus {
        outline-color:#FB8833; 
      }
      .popup-form .input-group input[type="email"] {
        border:0px;
        position: relative;
      }
      .popup-form .input-group input[type="submit"] {
        background-color: #6190F2;
        color: #fff;
        border: 0;
        cursor: pointer;
      }
      .popup-form .input-group input[type="submit"]:focus {
        box-shadow: inset 0 3px 7px 3px #ea7722;
      }

  </style>
<?php
include ("config/koneksi.php");

$act=$_GET['act'];
@$induk=$_GET['induk'];
$u=$_SESSION['username'];
@$s=$_GET['s'];
if($act=="diagnosa"){
  if($induk==""){
    $induk='';
    $s ='';
    $sqlg = "SELECT * FROM tabel_gejala where  kode_ya='$induk' AND kode_tidak='$s'";
    }else{
    $induk   = $_GET['induk'];
    $sqlg = "SELECT * FROM tabel_gejala where  kode_ya='$induk'";
    }
  
  if($s!=''){
    $s   = $_GET['s'];
    $sqlg = "SELECT * FROM tabel_gejala where  kode_tidak='$s'";
  }
  $qryg = mysqli_query($titid, $sqlg);
  $datag = mysqli_fetch_array($qryg);
  
  $kode_gejala  = $datag['kode_gejala'];
  $nama_gejala  = $datag['nm_gejala'];

?>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Diagnosa</a></li>
      </ol>
<section class="about-featured parallax">
<h3 class="lite"><span>Selamat Datang di menu Diagnosis, Untuk Melakukan Diagnosis Silahkan Tekan Tombol Diagnosis</span></h3>
<a href="#popup" class="popup-link">Diagnosis</a>
<div class="popup-wrapper" id="popup">
  <div class="popup-container">
    <form action="?p=diagnosa&act=diagnosis" role="form" method="post" class="popup-form">
    
       <h2>Jawab Pertanyaan di Bawah Ini, Sesuai dengan Gejala yang Balita Anda Rasakan !</h2>
      <div class="input-group">
<input  name="kode_gejala" value="<?php echo $kode_gejala;?>" type="hidden"/>
        <p><?php echo " &nbsp; Apakah Anda mengalami <b>$nama_gejala</b> ?";?></p>
        <p>
        <center><label>YA(Benar)<input type="radio" name="jawaban" value="Y" checked="checked"></label></center>
        
        <center><label>Tidak(Salah)</label></center>
        <input type="radio" name="jawaban" value="T">
         <br/>
        <input type="submit" value="Jawab">
        </p>
      </div>
      
      <a class="popup-close" href="#closed">X</a>
    </form>
  </div>
</div>
</section>
<?php

$u=$_SESSION['username'];
$cek_induk=mysqli_num_rows(mysqli_query($titid, "SELECT * FROM tabel_gejala where  kode_ya='$induk'"));
$cek_simpul=mysqli_num_rows(mysqli_query($titid, "SELECT * FROM tabel_gejala where  kode_tidak='$s'"));
$sql_cekh = "SELECT * FROM tmp_penyakit 
       WHERE username='$u' 
       GROUP BY kode_penyakit";
$qry_cekh = mysqli_query($titid, $sql_cekh);
$hsl_cekh = mysqli_num_rows($qry_cekh);
if ($cek_induk == 0 or $cek_simpul==0) {
  
  $hsl_data = mysqli_fetch_array($qry_cekh);
  $cek_gejala_valid=mysqli_num_rows(mysqli_query($titid, "SELECT * FROM tmp_gejala where status='1'"));
  $cek_gejala_penyakit=mysqli_num_rows(mysqli_query($titid, "SELECT rule.* FROM rule,tmp_penyakit where rule.kode_penyakit=tmp_penyakit.kode_penyakit"));
  $hasilbobot= mysqli_query($titid, "SELECT bobot
FROM rule, tmp_gejala
WHERE kode_penyakit = '$hsl_data[kode_penyakit]'
AND rule.kode_gejala = tmp_gejala.kode_gejala
AND tmp_gejala.status =1");
  
  $bobot = mysqli_fetch_array($hasilbobot);
  $jum = mysqli_num_rows($hasilbobot);
  $persentase = 0;
  for($i = 0; $i < $jum; ++$i){
      $persentase=$persentase + $bobot[bobot];
      }
  
  if ($persentase==0){
    $sql_pasien = "SELECT * FROM user WHERE username='$u'";
      $qry_pasien = mysqli_query($titid, $sql_pasien);
      $hsl_pasien = mysqli_fetch_array($qry_pasien);
    $sql_in = "INSERT INTO hasil_diagnosa SET
          username='$hsl_pasien[username]',
          kode_penyakit='',
          tanggal_diagnosa=NOW(),
          persentase='0'";
    mysqli_query($titid, $sql_in);
             
  echo "<meta http-equiv=\"refresh\" content=\"0; url=index2.php?p=diagnosa&act=hasil0\">";
  exit;
  }else{  
  $sql_pasien = "SELECT * FROM user WHERE username='$u'";
  $qry_pasien = mysqli_query($titid, $sql_pasien);
  $hsl_pasien = mysqli_fetch_array($qry_pasien);
    $sql_in = "INSERT INTO hasil_diagnosa SET
          username='$hsl_pasien[username]',
          kode_penyakit='$hsl_data[kode_penyakit]',
          tanggal_diagnosa=NOW(),
          persentase='$persentase'";
    mysqli_query($titid, $sql_in);
             
  echo "<meta http-equiv=\"refresh\" content=\"0; url=index2.php?p=diagnosa&act=hasil\">";
  exit;
  }
}
}

if($act=="diagnosis"){
  
# Baca variabel Form (If Register Global ON)
$jawaban  = $_REQUEST['jawaban'];
$kode_gejala   = $_REQUEST['kode_gejala'];

# Mendapatkan username
$u=$_SESSION['username'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kode_gejala, $u) {
  $sql_sakit = "SELECT rule.* FROM rule,tmp_penyakit 
          WHERE rule.kode_penyakit=tmp_penyakit.kode_penyakit 
          ORDER BY rule.kode_penyakit,rule.kode_gejala";
  $qry_sakit = mysqli_query($titid, $sql_sakit);
  while ($data_sakit = mysqli_fetch_array($qry_sakit)) {
    $sqltmp = "INSERT INTO tmp_analisa (username, kode_penyakit,kode_gejala)
          VALUES ('$u','$data_sakit[kode_penyakit]','$data_sakit[kode_gejala]')";
    mysqli_query($titid, $sqltmp);
  }
}

# Fungsi hapus tabel tmp_gejala
function AddTmpGejala($kode_gejala, $u,$status) {
  $sql_gejala = "INSERT INTO tmp_gejala (username,kode_gejala,status) VALUES ('$u','$kode_gejala','1')";
  echo $sql_gejala;
  mysqli_query($titid, $sql_gejala);
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($u) {
  $sql_del = "DELETE FROM tmp_penyakit WHERE username='$u'";
  mysqli_query($titid, $sql_del);
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($u) {
  $sql_del = "DELETE FROM tmp_analisa WHERE username='$u'";
  mysqli_query($titid, $sql_del);
}

# PEMERIKSAAN
if ($jawaban == "Y") {
  $sql_analisa = "SELECT * FROM tmp_analisa ";
  $qry_analisa = mysqli_query($titid, $sql_analisa);
  $data_cek = mysqli_num_rows($qry_analisa);
  if ($data_cek >= 1) {
    # Kode saat tmp_analisa tidak kosong
    DelTmpSakit($u);
    $sql_tmp = "SELECT * FROM tmp_analisa 
          WHERE kode_gejala='$kode_gejala' 
          AND username='$u'";
    $qry_tmp = mysqli_query($titid, $sql_tmp);
    while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
      $sql_rsakit = "SELECT * FROM rule 
              WHERE kode_penyakit='$data_tmp[kode_penyakit]' 
              GROUP BY kode_penyakit";
      $qry_rsakit = mysqli_query($titid, $sql_rsakit);
      while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
        // Data penyakit yang mungkin dimasukkan ke tmp
        $sql_input = "INSERT INTO tmp_penyakit (username,kode_penyakit)
               VALUES ('$u','$data_rsakit[kode_penyakit]')";
        mysqli_query($titid, $sql_input);
      }
    } 
    // Gunakan Fungsi
    DelTmpAnlisa($u);
    AddTmpAnalisa($kode_gejala, $u);
    $status = '1';
    AddTmpGejala($kode_gejala, $u,$status);
    
    
  } 
  else {
    # Kode saat tmp_analisa kosong
    $sql_rgejala = "SELECT * FROM rule WHERE kode_gejala='$kode_gejala'";
    $qry_rgejala = mysqli_query($titid, $sql_rgejala);
    while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
      $sql_rsakit = "SELECT * FROM rule 
               WHERE kode_penyakit='$data_rgejala[kode_penyakit]' 
               GROUP BY kode_penyakit";
      $qry_rsakit = mysqli_query($titid, $sql_rsakit);
      while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
        // Data penyakit yang mungkin dimasukkan ke tmp
        $sql_input = mysqli_query($titid, "INSERT INTO tmp_penyakit (username,kode_penyakit)
               VALUES ('$u','$data_rsakit[kode_penyakit]')");
      }
    } 
    // Menggunakan Fungsi
    AddTmpAnalisa($kode_gejala, $u);
    $status = '1';
    AddTmpGejala($kode_gejala, $u,$status);
    
  }
  echo "<meta http-equiv=\"refresh\" content=\"0; url=index2.php?p=diagnosa&act=diagnosa&induk=$kode_gejala&&#popup\">";
}


if ($jawaban == "T") {
  $sql_analisa = "SELECT * FROM tmp_analisa ";
  $qry_analisa = mysqli_query($titid, $sql_analisa);
  $data_cek = mysqli_num_rows($qry_analisa);
  if ($data_cek >= 1) {
    # Kode saat tmp_analisa tidak kosong
    DelTmpSakit($u);
    $sql_tmp = "SELECT * FROM tmp_analisa 
          WHERE kode_gejala='$kode_gejala' 
          AND username='$u'";
    $qry_tmp = mysqli_query($titid, $sql_tmp);
    while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
      $sql_rsakit = "SELECT * FROM rule 
              WHERE kode_penyakit='$data_tmp[kode_penyakit]' 
              GROUP BY kode_penyakit";
      $qry_rsakit = mysqli_query($titid, $sql_rsakit);
      while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
        // Data penyakit yang mungkin dimasukkan ke tmp
        $sql_input = "INSERT INTO tmp_penyakit (username,kode_penyakit)
               VALUES ('$u','$data_rsakit[kode_penyakit]')";
        mysqli_query($titid, $sql_input);
      }
    } 
    // Gunakan Fungsi
    DelTmpAnlisa($u);
    AddTmpAnalisa($kode_gejala, $u);
    $status = '0';
    AddTmpGejala($kode_gejala, $u,$status);
  } 
  else {
    # Kode saat tmp_analisa kosong
    $sql_rgejala = "SELECT * FROM rule WHERE kode_gejala='$kode_gejala'";
    $qry_rgejala = mysqli_query($titid, $sql_rgejala);
    while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
      $sql_rsakit = "SELECT * FROM rule 
               WHERE kode_penyakit='$data_rgejala[kode_penyakit]' 
               GROUP BY kode_penyakit";
      $qry_rsakit = mysqli_query($titid, $sql_rsakit);
      while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
        // Data penyakit yang mungkin dimasukkan ke tmp
        $sql_input = mysqli_query($titid, "INSERT INTO tmp_penyakit (username,kode_penyakit)
               VALUES ('$u','$data_rsakit[kode_penyakit]')");
      }
    } 
    // Menggunakan Fungsi
    AddTmpAnalisa($kode_gejala, $u);
    $status = '0';
    AddTmpGejala($kode_gejala, $u,$status);
  }
  echo "<meta http-equiv=\"refresh\" content=\"0; url=index2.php?p=diagnosa&act=diagnosa&s=$kode_gejala&induk=$kode_gejala&&#popup\">";
}



}
if ($act=="hasil"){
$u=$_SESSION['username'];
$qry = mysqli_query($titid, "SELECT * FROM hasil_diagnosa, tabel_penyakit, user WHERE tabel_penyakit.kode_penyakit=hasil_diagnosa.kode_penyakit AND hasil_diagnosa.username='$u' AND hasil_diagnosa.username=user.username ORDER BY hasil_diagnosa.id_diagnosa DESC LIMIT 1") or die (mysqli_error());
$data = mysqli_fetch_array($qry);
$id = $data['id_diagnosa'];
mysqli_query($titid, "TRUNCATE TABLE `tmp_analisa`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_gejala`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_penyakit`");
?>
<div class="text-area-user" align="justify">  
<br>
<ol class="breadcrumb">
        <li><a href="index2.php?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Hasil Diagnosa</a></li>
      </ol><br />
<form action="javascript: void(0)" method="post" align="left" cellpadding="5">
<table width="100%"  cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="2" class="subtitle" align="center"><strong><h4>Data Pasien</h4></strong></td><br/>
  </tr>
  <tr>
    <td width="22%"><strong>Nama  </strong></td>
    <td width="2%">:</td>
    <td width="76%"><?php echo $data['username'];?></td>
  </tr>
   <tr>
    <td><strong>Usia</strong></td>
    <td>:</td>
    <td><?php echo $data['umur'];?> tahun</td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin</strong></td>
    <td>:</td>
    <td><?php if ($data['jenis_kelamin']=='L') echo "Laki-laki"; else echo "Perempuan";?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $data['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA" class="style3"></td>
  </tr>
  <tr>
    <td colspan="2" class="subtitle" align="center"><strong><h4>Hasil Diagnosa</h4></strong></td><br/>
  </tr>
  
  <tr>
    <td><strong>Nama Penyakit</strong></td>
    <td>:</td>
    <td><?php echo $data['nm_penyakit'];?></td>
  </tr>
  <tr>
    <td><strong>Persentase</strong></td>
    <td>:</td>
    <td><?php 
    $persentase = $data['persentase'];
    if($persentase>100){
       echo '100';
    }else{
       echo $data['persentase'];
    }
   ?> persen</td>
  </tr>
  <tr>
    <td valign="top"><strong>Gejala Umum</strong></div></td>
    <td valign="top">:</td>
    <td>
      <?php
    $sql_gejala = "SELECT tabel_gejala.* FROM tabel_gejala,rule
            WHERE tabel_gejala.kode_gejala=rule.kode_gejala 
            AND rule.kode_penyakit='$data[kode_penyakit]' ";
    $qry_gejala = mysqli_query($titid, $sql_gejala);
      $i=0;
      while($hsl_gejala=mysqli_fetch_array($qry_gejala)){
        $i++;
        echo "$i. $hsl_gejala[nm_gejala] <br>";
      } 
      ?>    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Definisi</strong></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['definisi'];?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Pengobatan/Pencegahan</strong></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['pengobatan'];?></td>
  </tr>
  <tr>
    <td><strong>Waktu Diagnosa</strong></td>
    <td>:</td>
    <td><?php echo $data['tanggal_diagnosa'];?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
     
     <td colspan="3" align="center"><a href="fpdf/html2pdf/diagnosa.php?id=<?php echo $data['id_diagnosa'];?>"><button type="button" class="btn btn-block btn-warning">
                        <i class="fa fa-fw fa-print">PRINT</i></button></a>
                      </td>
  </tr>
</table>
</div>


<?php
}


if ($act=="hasil0"){
$u=$_SESSION['username'];
$qry = mysqli_query($titid, "SELECT * FROM hasil_diagnosa, user WHERE hasil_diagnosa.username='$u' AND hasil_diagnosa.username=user.username ORDER BY hasil_diagnosa.id_diagnosa DESC LIMIT 1");
$data = mysqli_fetch_array($qry);
$id = $data['id_diagnosa'];
mysqli_query($titid, "TRUNCATE TABLE `tmp_analisa`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_gejala`");
mysqli_query($titid, "TRUNCATE TABLE `tmp_penyakit`");
?>
<div class="text-area-user" align="justify">  
<br>
<div class="title">Hasil Diagnosa</div>
<br />
<form action="javascript: void(0)" onclick="popup('cetak2.php?u=<?php echo $u;?>&id=<?php echo $id;?>')" method="post" align="left" cellpadding="5">
<table  cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User (Pasien) </td>
  </tr>
  <tr>
    <td width="170"><strong>Nama </strong></td>
    <td width="7">:</td>
    <td width="896"><?php echo $data['username'];?></td>
  </tr>
   <tr>
    <td><strong>Usia</strong></td>
    <td>:</td>
    <td><?php echo $data['usia'];?> tahun</td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin</strong></td>
    <td>:</td>
    <td><?php if ($data['jenis_kelamin']=='L') echo "Laki-laki"; else echo "Perempuan";?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $data['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="3" class="subtitle">Hasil Diagnosa</td>
  </tr>
  
  <tr>
    <td valign="top"><div align="right"><strong>Kesimpulan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top">Hasil kesimpulan diagnosa, anda tidak mengalami jenis penyakit Diabetes Melitus Tipe apapun, disebabkan tidak ada tabel_gejala yang anak anda alami.</td>
  </tr>
 
  <tr>
    <td><div align="right"><strong>Waktu Diagnosa</strong></div></td>
    <td>:</td>
    <td><?php echo $data['tanggal_diagnosa'];?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
<input type="submit" name="submit" value="Cetak"/></td>
  </tr>
</table>
</div>


<?php
}
?>