<script type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
             // General options
             mode : "textareas",
             theme : "advanced",
    });
</script>

<?php
//  koneksi database.
include_once "../config/koneksi.php";

//penambahan  error reporting. 
error_reporting(E_ALL ^ E_NOTICE);
?>
<section class="content-header">
  <?php
  if ($_GET['act'] == 'read') {
    # code...
    ?>
        <ol class="breadcrumb">
          <li><a href="index.php?p=home">Home</a></li>
          <li class="active"><a href="#">pakar</a></li>
        </ol>
</section> </br>

    <!-- Main content -->
<section class="content">
  <a href="index.php?p=pakar&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-fw fa-pakar-plus"></i>Tambah pakar</button></a>
  <div class="box">
    <div class="box-header">
      <h4 class="box-title">Data pakar</h4>
    </div>
    <!-- /.box-header -->
     <div class="panel-body">
      <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="10%">Nama</th>
                <th width="15%">Alamat</th>
                <th width="10%">No. Hp</th>
                <th width="5%">username</th>
                <th width="10%">Password</th>
                <th width="5%">Edit</th>
                <th width="5%">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $p = new eeee;
            $batas  =  5;
            $posisi = $p->cariPosisi($batas);
                $no = 0;
                $query_tampil = mysqli_query("SELECT * FROM pakar ORDER BY id_pakar ASC limit $posisi, $batas");
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
                      <?php echo $data_tampil['nama']; ?>
                    </td>
                     <td>
                      <?php echo $data_tampil['alamat']; ?> 
                    </td>
                     <td>
                      <?php echo $data_tampil['nohp']; ?>
                    </td>                  
                    <td>
                      <?php echo $data_tampil['pakarname']; ?>
                    </td>
                    <td>
                      <?php echo $data_tampil['password']; ?>
                    </td>
                    
                   <td><a href="index.php?p=pakar&&act=edit&id_edit=<?php echo $data_tampil['id_pakar']; ?>"><button type="button" class="btn btn-block btn-warning">
                      <i class="fa fa-fw fa-edit"></i></button></a>
                    </td>
                    <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="index.php?p=pakar&id_hapus=<?php echo $data_tampil['id_pakar']; ?>">
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
                  $jmldata     = mysqli_num_rows(mysqli_query("SELECT * FROM pakar "));
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
                                        <label class="col-lg-3 col-sm-3 control-label">Nama Lengkap</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa1"><input type="text" class="form-control" placeholder="Nama" name="nama">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Isi Info</label>
                                      <div class="col-lg-6">
                                        <div class="iconic-input right">
                                          <textarea type="text" class="form-control" name="alamat"></textarea>  
                                        </div>
                                      </div>
                                  </div> 
                                     <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">No. HP</label> </br>
                                       <div class="col-lg-6">
                                          <span id="biasa3"><input type="text" class="form-control" value="+62" name="nohp">
                                          <?php alert_biasa();?></span> 
                                      </div>
                                      </div>
                                      
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">username</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa4"><input type="text" class="form-control" placeholder="pakarname" name="pakarname">
                                                <?php alert_biasa();?></span> 
                                            </div>
                                        </div>
                                    </div> 
                                   <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Password</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa5"><input type="password" class="form-control" placeholder="Password" name="password">
                                                <?php alert_biasa();?></span> 
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
</section>
<?php
biasa();
}
if ($_GET['act'] == 'edit') {
  # code...
    $id_edit = @$_GET['id_edit'];
    $sql = mysqli_query("SELECT * FROM pakar WHERE id_pakar = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql);
?>
<section class="featured-doctors">
  <div class="panel-body">                              
     <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Nama Lengkap</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa1"><input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $dataEdit['nama']; ?>">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Alamat</label>
                                        <div class="col-lg-6">
                                          <textarea type="text" class="form-control" name="alamat" ><?php echo $dataEdit['alamat']; ?></textarea>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">NO. Hp</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa3"><input type="text" class="form-control" value="<?php echo $dataEdit['nohp']; ?>" name="nohp">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">pakarname</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa3"><input type="text" class="form-control" value="<?php echo $dataEdit['pakarname']; ?>" name="pakarname">
                                                <?php alert_biasa();?></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-3 col-sm-3 control-label">Password</label>
                                        <div class="col-lg-6">
                                            <div class="iconic-input right">
                                                <span id="biasa4"><input type="text" class="form-control" value="<?php echo $dataEdit['password']; ?>" name="password">
                                                <?php alert_biasa();?></span>
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
</section>
<?php
biasa();
textarea();
}
// fungsi - fungsi
// membuat variable
$nama = @$_POST['nama'];
$alamat=@$_POST['alamat'];
$nohp=@$_POST['nohp'];
$pakarname = @$_POST['pakarname'];
$password = @$_POST['password'];


// variable act
$simpan = @$_POST['simpan'];
$edit = @$_POST['edit'];

// kondisi jika simpan
if ($simpan) {
  // kondisi jika isian kosong
  if ($nama == "" || $pakarname == "" || $password == "") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan = mysqli_query("INSERT INTO pakar VALUES ('', '$nama', '$alamat', '$nohp', '$pakarname', '$password')") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Tambah data berhasil');
    window.location.href = "index.php?p=pakar&&act=read";
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
  if ($nama == "" || $pakarname == "" || $password == "") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query($titid, "UPDATE pakar SET nama = '$nama', 
      alamat = '$alamat',  nohp= '$nohp', pakarname = '$pakarname', password = '$password' WHERE id_pakar = '$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan_edit) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "index.php?p=pakar&&act=read";
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
    $hapus = mysqli_query("DELETE FROM pakar WHERE id_pakar='".$id_hapus."'");
    if ($hapus) {
        # code...
        ?>
                 <script type="text/javascript">
                alert("Data berasil dihapus");
                window.location.href = "index.php?p=pakar&&act=read";
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
 
    
