<?php
// Upload gambar untuk berita

function Uploadgbr($fupload_name){
  //direktori banner
  $vdir_upload = "../../../foto_penyakit/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["upload"]["tmp_name"], $vfile_upload);
}

function Uploadsip($fupload_name){
  //direktori banner
  $vdir_upload = "foto_sip/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["upload"]["tmp_name"], $vfile_upload);
}

?>
