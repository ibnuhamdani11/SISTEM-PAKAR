<?php
//  koneksi database.
include_once "../config/koneksi.php";

//penambahan  error reporting. 
error_reporting(E_ALL ^ E_NOTICE);

function kdauto($tabel, $inisial){
    $struktur   = mysqli_query($titid, "SELECT * FROM $tabel");
    $field      = mysqli_field_name($struktur,0);
    $panjang    = mysqli_field_len($struktur,0);
    $qry  = mysqli_query($titid, "SELECT max(".$field.") FROM ".$tabel);
    $row  = mysqli_fetch_array($qry);
    if ($row[0]=="") {
    $angka=0;
    }
    else {
    $angka= substr($row[0], strlen($inisial));
    }
    $angka++;
    $angka      =strval($angka);
    $tmp  ="";
    for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
    $tmp=$tmp."0";
    }
    return $inisial.$tmp.$angka;
    }
?>
    <section class="content-header">
      

<?php
if ($_GET['act'] == 'read') {
  # code...
  ?>
      <ol class="breadcrumb">
        <li><a href="?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Gejala</a></li>
      </ol>
    </section> </br>

    <!-- Main content -->
    <section class="content">
          <a href="?p=gejala&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Gejala</i></button></a>
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Data Gejala</h4>
            </div>
            <!-- /.box-header -->
             <div class="panel-body">
        <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Kode</th>
                  <th>Gejala</th>
                  <th>Gejala ya</th>
                  <th>Gejala tidak</th>
                  <th width="10%">Edit</th>
                  <th width="10%">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php
             $p = new eeee;
            $batas  =  10;
            $posisi = $p->cariPosisi($batas);
                  $no = 0;
                  $query_tampil = mysqli_query($titid, "SELECT * FROM tabel_gejala ORDER by kode_gejala asc limit $posisi, $batas");
                    (mysqli_error());
                  while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                    # code...
                    $no++;
                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php 
                        echo $data_tampil['kode_gejala']; 
                        ?>
                      </td>
                      <td>
                        <?php echo $data_tampil['nm_gejala']; ?>
                      </td>
                      <td>
                        <?php echo $data_tampil['kode_ya']; ?>
                      </td>
                      <td>
                        <?php echo $data_tampil['kode_tidak']; ?>
                      </td>
                      <td><a href="?p=gejala&&act=edit&id_edit=<?php echo $data_tampil['kode_gejala']; ?>"><button type="button" class="btn btn-block btn-warning">
                        <i class="fa fa-fw fa-edit"></i></button></a>
                      </td>
                      <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="?p=gejala&id_hapus=<?php echo $data_tampil['kode_gejala']; ?>">
                        <button type="button" class="btn btn-block btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                      </td>
                      </tr>
                    <?php
                  }
                ?>
                </tbody>
                
              </table>
              <div class="pagination">
              <ul class="pagination">
                <?php
                  $jmldata     = mysqli_num_rows(mysqli_query($titid, "SELECT * FROM tabel_gejala "));
                  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
                  echo "  $linkHalaman ";
                ?>
              </ul>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      </section>
      <!-- /.row -->
  <?php
}
?>

<?php
if ($_GET['act'] == 'add') {
  # code...
  ?>

          <section class="featured-doctors">
                    <div class="panel-body">                              
                                <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data" >
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Kode Gejala</label>
                                        <div class="col-lg-6">
                                            <input type="hidden" class="form-control" name="kode_gejala" maxlength="5"  value="<?php echo kdauto("tabel_gejala","G"); ?>" >
                                            <input name="kode_gejala" type="text" id="id_tran_msk" size="15" value="<?php echo kdauto("tabel_gejala","G"); ?>" disabled="disabled" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Gejala</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                               <span id="biasa1"><input type="text" class="form-control" placeholder="gejala" name="nm_gejala">
                                              <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Gejala ini muncul setelah</label>
                                    </div> 
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Jawaban ya pada </label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="kode_ya">   
                                              <option value=''>- TIDAK ADA -</option>                                              
                                              <?php
                                               $tampil="SELECT * FROM tabel_gejala  ORDER by kode_gejala asc";
                                                $qryTampil=mysqli_query($titid, $tampil);
                                                while ($s=mysqli_fetch_array($qryTampil)) {
                                              ?>
                                                <option value="<?php echo $s['kode_gejala']; ?>"><?php echo $s['nm_gejala']; ?>[<?php echo $s['kode_gejala']; ?>]</option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Jawaban tidak pada </label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="kode_tidak"> 
                                              <option value=''>- TIDAK ADA -</option>                                                
                                              <?php
                                               $tampil="SELECT * FROM tabel_gejala ORDER by kode_gejala asc";
                                                $qryTampil=mysqli_query($titid, $tampil);
                                                while ($s=mysqli_fetch_array($qryTampil)) {
                                              ?>
                                                <option value="<?php echo $s['kode_gejala']; ?>"><?php echo $s['nm_gejala']; ?>[<?php echo $s['kode_gejala']; ?>]</option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <input type="reset" class="btn btn-danger" value="Reset">
                                            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                                        </div>
                                    </div> 
                                </form>
                    </div>  
<?php
biasa();
}
if ($_GET['act'] == 'edit') {
  # code...
    $id_edit = @$_GET['id_edit'];
    $sql = mysqli_query($titid, "SELECT * FROM tabel_gejala WHERE kode_gejala = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql);
  ?>
 <section class="featured-doctors">
                    <div class="panel-body">                              
                                <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Kode Gejala</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <input type="text" class="form-control" placeholder="Gejala" name="kode_gejala"  value="<?php echo $dataEdit['kode_gejala']; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Gejala</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa1"><input type="text" class="form-control" placeholder="Gejala" name="nm_gejala"  value="<?php echo $dataEdit['nm_gejala']; ?>">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Jawaban ya pada </label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="kode_ya">   
                                              <option value=''>- TIDAK ADA -</option>                                              
                                              <?php
                                               $tampil="SELECT * FROM tabel_gejala  ORDER by kode_gejala asc";
                                                $qryTampil=mysqli_query($titid, $tampil);
                                                while ($s=mysqli_fetch_array($qryTampil)) {
                                              ?>
                                                <option value="<?php echo $s['kode_gejala']; ?>"><?php echo $s['nm_gejala']; ?></option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Jawaban tidak pada </label>
                                        <div class="col-lg-6">
                                          <div class="iconic-input right">
                                            <select class="form-control input-sm m-bot15" name="kode_tidak"> 
                                              <option value=''>- TIDAK ADA -</option>                                                
                                              <?php
                                               $tampil="SELECT * FROM tabel_gejala ORDER by kode_gejala asc";
                                                $qryTampil=mysqli_query($titid, $tampil);
                                                while ($s=mysqli_fetch_array($qryTampil)) {
                                              ?>
                                                <option value="<?php echo $s['kode_gejala']; ?>"><?php echo $s['nm_gejala']; ?>[<?php echo $s['kode_gejala']; ?>]</option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <input type="reset" class="btn btn-danger" value="Reset">
                                            <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
                                        </div>
                                    </div> 
                                    </form>
                    </div>  
<?php
biasa();
}
// fungsi - fungsi
// membuat variable
$kode_gejala=@$_POST['kode_gejala'];
$nm_gejala = @$_POST['nm_gejala'];
$kode_ya =@$_POST['kode_ya'];
$kode_tidak =@$_POST['kode_tidak'];


// variable act
$simpan = @$_POST['simpan'];
$edit = @$_POST['edit'];

// kondisi jika simpan
if ($simpan) {
  // kondisi jika isian kosong
  if ($kode_gejala==""||$nm_gejala == "" ) {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong. <?php echo $kode_gejala  AND $kode_ya ?>');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan = mysqli_query($titid, "INSERT INTO tabel_gejala VALUES ('$kode_gejala',' $nm_gejala', '$kode_ya', '$kode_tidak')") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
        alert('Tambah data berhasil');
        window.location.href = "?p=gejala&&act=read";
      </script>
   <?php 
    }
    // kondisi jika query gagal
    else {
       ?>
       <!-- pesan -->
      <script type="text/javascript">
    alert('Tambah data gagal');
    </script>
   <?php 
    }
  }
}if ($edit) {
  // kondisi jika isian kosong
  if ($nm_gejala == "" ) {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query($titid, "UPDATE tabel_gejala SET nm_gejala = '$nm_gejala' WHERE kode_gejala = '$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan_edit) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "?p=gejala&&act=read";
    </script>
   <?php 
    }
    // kondisi jika query gagal
    else {
       ?>
       <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data gagal');
    </script>
   <?php 
    }
  }
}

// fungsi hapus
    if (isset($_GET['id_hapus'])) {
    $id_hapus=$_GET['id_hapus'];
    # code...
    $hapus = mysqli_query($titid, "DELETE FROM tabel_gejala WHERE kode_gejala='".$id_hapus."'");
    if ($hapus) {
        # code...
        ?>
                 <script type="text/javascript">
                alert("Data berasil dihapus");
                window.location.href = "?p=gejala&&act=read";
                </script>
            <?php
            } else {
            ?>
                <script type="text/javascript">
                alert("Data gagal dihapus");
                </script>   
            <?php
    }
}
?>
    </section>
    <!-- /.content -->
