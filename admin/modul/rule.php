<?php  
  include("../config/koneksi.php");
  $act = $_GET['act'];
  if($act=="relasi"){
  $kode_penyakit = @$_GET['kode_penyakit'];
?>

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="#">Relasi Gejala</a></li>
  </ol></br>
  <script type="text/javascript">
<!--
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }
  //-->
  </script>
  <section class="featured-doctors">
    <div class="panel-body">                              
      <form class="form-horizontal" role="form" method="POST" action="?p=rule&&act=simpanrelasi" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-lg-3">
          </div>
            <div class="col-lg-6">
              <header class="panel-heading">
                <b> Daftar Data penyakit</b>
              </header>
              <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                <!-- <select class="form-control input-sm m-bot15" name="kode_penyakit"> -->
                <option value="?p=rule&&act=relasi&&kode_penyakit" selected="selected">[ Daftar Penyakit ]</option>                                                 
                  <!-- <option value="?rule&&act=relasi&&kode_penyakit">[ Daftar Penyakit ]</option> -->
                  <?php
                    $qryp = mysqli_query($titid "SELECT * FROM tabel_penyakit");
                    while($datap = mysqli_fetch_array($qryp)){
                    if($datap['kode_penyakit']==$kode_penyakit){
                      $cek = "selected";
                    }
                    else{
                      $cek = "";
                    }
                      echo "<option value='?p=rule&&act=relasi&kode_penyakit=$datap[kode_penyakit]' $cek>$datap[nm_penyakit]</option>";
                      // echo "<option value='$datap[kode_penyakit]' $s>$datap[nm_penyakit]</option>";
                    }
                  ?>
                </select>
              <input type="hidden" name="kode_penyakit" value="<?php echo $kode_penyakit;?>">
            </div>
          <div class="col-lg-3">
          </div>
        </div>  
        <div class="form-group">
          <div class="col-lg-3">
        </div>
          <div class="col-lg-6">
            <header class="panel-heading">
              <b> Daftar Data Gejala</b>
            </header>
              <table id="example1" class="table table-striped table-bordered table-hover">
                <tbody>
                <?php
                  $no=0;
                  $qry = mysqli_query($titid "SELECT * FROM tabel_gejala ORDER BY kode_gejala");
                  while ($data=mysqli_fetch_array($qry)){
                    $no++;
                    $qryr = mysqli_query($titid "SELECT * FROM rule WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$data[kode_gejala]'");
                    $cocok = mysqli_num_rows($qryr);
                    if($cocok==1){
                       $cek = "checked";
                    }
                      else{
                        $cek = "";
                    }
                ?>
                <tr class="gradeX">
                  <td><input type="checkbox" name="cekgejala[]" value="<?php echo $data['kode_gejala'];?>" <?php echo $cek;?> />&nbsp;<?php echo "[".$data['kode_gejala']."]&nbsp;".$data['nm_gejala'];?> </td>
                </tr>
                <?php
                } ?>

                </tbody>
              </table>
          </div>
          <div class="col-lg-3">
          </div>
        </div> 
        <div class="form-group">
          <div class="col-lg-offset-3 col-lg-9">
            <button type="reset" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Reset</button>
            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" onclick="return confirm('Apakah anda yakin data relasi ini akan disimpan?')"/>&nbsp;
          </div>
        </div> 
      </form>
    </div> 
    <?php
      }
      if($act=="berhasil"){
      $kode_penyakit = $_GET['kode_penyakit'];
    ?>

    <?php
      }
        elseif($act=="simpanrelasi"){
        $kode_penyakit = @$_POST['kode_penyakit'];
        $cekgejala = @$_POST['cekgejala'];

        $jum = count($cekgejala);
        if($jum==0){
          echo "<meta http-equiv=\"refresh\" content=\"0; url=?p=rule&&act=relasi\">";
        }
        else{
          $qpil = mysqli_query($titid "SELECT * FROM rule WHERE kode_penyakit='$kode_penyakit'");
          while($datapil = mysqli_fetch_array($qpil)){
          for($i = 0; $i < $jum; ++$i){
          if($datapil['kode_gejala'] != $cekgejala[$i]){
             mysqli_query($titid "DELETE FROM rule WHERE kode_penyakit='$kode_penyakit' AND NOT kode_gejala IN('$cekgejala[$i]')");
            }
          }
        }
      for($i = 0; $i < $jum; ++$i){
      $qryr = mysqli_query($titid "SELECT * FROM rule WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$cekgejala[$i]'");
      $cocok = mysqli_num_rows($qryr);
      if(!$cocok==1){
         mysqli_query($titid "INSERT INTO rule (kode_penyakit, kode_gejala) VALUES ('$kode_penyakit', '$cekgejala[$i]')");
          $gejala = $cekgejala[$i].",";
          echo "<meta http-equiv=\"refresh\" content=\"0; url=?p=rule&&act=relasi\">";
        }
      }
      echo "<meta http-equiv=\"refresh\" content=\"0; url=?p=rule&&act=relasi\">";
      }
      }
    ?>
  </section> 
