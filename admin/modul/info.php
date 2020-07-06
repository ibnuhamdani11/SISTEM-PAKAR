<?php
  //  koneksi database.
  include_once "../config/koneksi.php";

  //penambahan  error reporting. 
  error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
  if ($_GET['act'] == 'read') {
  # code...
?>
<ol class="breadcrumb">
  <li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"><a href="#">Info</a></li>
</ol></br>
<!-- Main content -->
<section class="content">
  <a href="index.php?p=info&&act=add"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Tambah Info</button></a>
  <div class="box">
    <div class="box-header">
      <h4 class="box-title">Read Data Info</h4>
    </div>
      <!-- /.box-header -->
      <div class="panel-body">
        <div class="table-responsive">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="15%">Judul Info</th>
                <th width="60%">Info</th>
                <th width="10%">Edit</th>
                <th width="10%">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 0;
                $query_tampil = mysqli_query("SELECT * FROM info ORDER BY id_info");
                while ($data_tampil = mysqli_fetch_array($query_tampil)) {
                # code...
                $no++;
              ?>
              <tr>
                <td>
                  <?php echo $no; ?>
                </td>
                <td>
                <?php echo $data_tampil['judul']; ?>
                </td>
                <td>
                  <?php echo $data_tampil['nm_info']; ?>
                </td>
                <td><a href="?p=info&&act=edit&id_edit=<?php echo $data_tampil['id_info']; ?>"><button type="button" class="btn btn-block btn-warning">
                  <i class="fa fa-fw fa-edit"></i></button></a>
                </td>
                <td><a onclick="return confirm('Yakin ingin menghapus data ?')" href="index.php?p=info&id_hapus=<?php echo $data_tampil['id_info']; ?>">
                  <button type="button" class="btn btn-block btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
      </div>
    </div>
    </div>
        <!-- /.box-body -->
  </div>
      <!-- /.box -->
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
  <ol class="breadcrumb">
    <li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="index.php?p=info&&act=read"> Data Info</a></li>
    <li class="active"><a href="#">Tambah Info</a></li>
  </ol>
</section>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Judul Info</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="text" class="form-control" placeholder="Info" name="judul" value="">
              <?php alert_biasa();?></span>
            </div>
          </div>
      </div> 
      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Isi Info</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <textarea type="text" class="form-control" name="nm_info"></textarea>  
            </div>
          </div>
      </div> 
      <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
          <button type="reset" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Reset</button>
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
    $sql = mysqli_query("SELECT * FROM info WHERE id_info = '$id_edit'") or die (mysqli_error());
    $dataEdit = mysqli_fetch_array($sql); 
  ?>
</section>
<section class="featured-doctors">
  <div class="panel-body">                              
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
      <label class="col-lg-3 col-sm-3 control-label">Judul Info</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <span id="biasa1"><input type="text" class="form-control" placeholder="Nama Penyakit" name="judul" value="<?php echo $dataEdit['judul'];?>">
              <?php alert_biasa();?></span>
            </div>
          </div>
      </div> 

      <div class="form-group">
        <label class="col-lg-3 col-sm-3 control-label">Isi Info</label>
          <div class="col-lg-6">
            <div class="iconic-input right">
              <textarea type="text" class="form-control" name="nm_info"><?php echo $dataEdit['nm_info'];?></textarea>  
            </div>
          </div>
      </div>       
      <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
          <button type="reset" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Reset</button>
          <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
        </div>
      </div> 
    </form>
  </div>  
  <?php
  biasa();
    }
    // fungsi
    $judul = @$_POST['judul'];
    $nm_info = @$_POST['nm_info'];


    $simpan = @$_POST['simpan'];
    $edit = @$_POST['edit'];
    if($simpan){
      if ($judul==""|| $nm_info == ""  ) {
    # code...
  ?>
  <script type="text/javascript">
    alert("Inputan tidak boleh ada yang kosong ");
  </script>
  <?php
    } else {
    
      $querysimpan = mysqli_query("INSERT INTO info values('','$judul', '$nm_info')") or die (mysqli_error());
       if ($querysimpan) {
  ?>
  <script type="text/javascript">
    alert("Tambah data berasil");
    window.location.href = "index.php?p=info&&act=read";
  </script>
  <?php
    } else {
  ?>
  <script type="text/javascript">
    alert("Data info gagal diupload ");
  </script>
  <?php
     }
   }
   }if ($edit) {
  // kondisi jika isian kosong
  if ($judul==""|| $nm_info=="") {
    ?>
    <!-- pesan -->
    <script type="text/javascript">
    alert('Inputan tidak boleh ada yang kosong.');
    </script>
    <?php
  }
  // kondisi jika isian sudah diisi semua
  else {
    $querysimpan_edit = mysqli_query("UPDATE info SET judul= '$judul', nm_info= '$nm_info' WHERE id_info='$id_edit'") or die (mysqli_error());
    // kondisi jika query berhasil
    if ($querysimpan_edit) {
      ?>
      <!-- pesan -->
      <script type="text/javascript">
    alert('Edit data berhasil');
    window.location.href = "index.php?p=info&&act=read";
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
   
  // kondisi jika hapus.
  
  # code...
     if (isset($_GET['id_hapus'])) {
    $id_hapus=$_GET['id_hapus'];
    # code...
    $hapus = mysqli_query($titid, "DELETE FROM info WHERE id_info='".$id_hapus."'");
    if ($hapus) {
        # code...
        ?>
                 <script type="text/javascript">
                alert("Data berasil dihapus");
                window.location.href = "index.php?p=info&&act=read";
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
    