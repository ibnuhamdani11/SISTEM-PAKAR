<?php  
  include("../config/koneksi.php");
  $act = $_GET['act'];
  if($act=="bobot_gejala"){
  $kode_penyakit = @$_GET['kode_penyakit'];
?>

<script src="../config/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../config/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="active"> Bobot gejala</a></li>
  </ol>
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
      <form class="form-horizontal" role="form" method="POST" action="?p=bobot&&act=simpanbobot_gejala" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-lg-3">
          </div>
            <div class="col-lg-6">
              <header class="panel-heading">
                <b> Daftar Data penyakit</b>
              </header>
              <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                <!-- <select class="form-control input-sm m-bot15" name="kode_penyakit"> -->
                <option value="?p=bobot&&act=bobot_gejala&&kode_penyakit" selected="selected">[ Daftar Penyakit ]</option>                                                 
                  <!-- <option value="?rule&&act=relasi&&kode_penyakit">[ Daftar Penyakit ]</option> -->
                  <?php
                    $qryp = mysqli_query($titid, "SELECT * FROM tabel_penyakit");
                    while($datap = mysqli_fetch_array($qryp)){
                    if($datap['kode_penyakit']==$kode_penyakit){
                      $cek = "selected";
                    }
                    else{
                      $cek = "";
                    }
                      echo "<option value='?p=bobot&&act=bobot_gejala&kode_penyakit=$datap[kode_penyakit]' $cek>$datap[nm_penyakit]</option>";
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
              <!-- <b> Daftar Data Gejala</b> -->
            </header>
              <table id="example1" class="table table-striped table-bordered table-hover">
                <tbody>
                <th width="20%">Daftar Data Gejala</th>
                <th width="20%">Bobot</th>
                <?php
                  $no=0;
                  $qry = mysqli_query($titid, "SELECT id_rule,kode_penyakit,rule.kode_gejala,bobot,nm_gejala FROM rule,tabel_gejala WHERE kode_penyakit='$kode_penyakit' AND rule.kode_gejala=tabel_gejala.kode_gejala") or die(mysqli_error());
                  while ($data=mysqli_fetch_array($qry)){
                    $no++;
                    ++$a;
                    /*$qryr = mysqli_query($titid, "SELECT * FROM rule WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$data[kode_gejala]'");
                    $cocok = mysqli_num_rows($qryr);
                    if($cocok==1){
                       $cek = "checked";
                    }
                      else{
                        $cek = "";
                    }*/
                ?>
                <tr class="gradeX">
                  <td><!-- <input type="checkbox" name="cekgejala[]" value="<?php //echo $data['kode_gejala'];?>" <?php //echo $cek;?> /> -->&nbsp;<?php echo "[".$data['kode_gejala']."]&nbsp;".$data['nm_gejala'];?> </td>
                  <input type="hidden" name="kode_gejala[]" value="<?php echo $data['kode_gejala']?>" />
                  <td><span id="sprytextfield<?php echo $a; ?>">
                  <input name="bobot[]" type="text" size="2" maxlength="3" value="<?php echo $data['bobot']; ?>"/>
                  <span class="textfieldRequiredMsg"><img src="../cancel_f2.png"width="10" height="10"> Bobot harus diisi.</span>
                <span class="textfieldInvalidFormatMsg"><img src="../cancel_f2.png"width="10" height="10"> Nilai harus berupa angka.</span>
                <span class="textfieldMaxCharsMsg"><img src="../cancel_f2.png"width="10" height="10"> Maksimal 3 angka.</span>
                <span class="textfieldMinValueMsg"><img src="../cancel_f2.png"width="10" height="10"> Minimal 1 persen.</span>
                <span class="textfieldMaxValueMsg"><img src="../cancel_f2.png"width="10" height="10"> Maksimal 100 persen.</span></td>
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
            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" onclick="return confirm('Apakah anda yakin bobot gejala ini sudah benar?')"/>&nbsp;
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
        elseif($act=="simpanbobot_gejala"){
          $kode_penyakit = $_POST['kode_penyakit'];
          $bobot = $_POST['bobot'];
          $kode_gejala = $_POST['kode_gejala'];
          
          
          
                
         $jum = count($bobot);
          $total = 0;
          for($i = 0; $i < $jum; ++$i){
              $total=$total + $bobot[$i];
              }
          
          if ($total==100){
          
            for($i = 0; $i < $jum; ++$i){
              $qryr = mysqli_query($titid, "UPDATE  rule SET bobot='$bobot[$i]' WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala[$i]'");
              echo "<meta http-equiv=\"refresh\" content=\"0; url=?p=bobot&&act=bobot_gejala\">";
              }
            }else{
            echo "<meta http-equiv=\"refresh\" content=\"0; url=?p=bobot&&act=bobot_gejala\">";;
            }
      }
    ?>
  </section> 
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11","integer",{minValue:1,maxValue:100, maxChars:3, validateOn:["blur"]});

//-->
</script>