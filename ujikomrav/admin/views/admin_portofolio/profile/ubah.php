<?php
error_reporting(0);
if (isset($_POST['simpan'])) {
  $Nama = $_POST['nama'];
  $Jabatan = $_POST['jabatan'];
  $Perusahaan = $_POST['perusahaan'];
  $Foto = $_POST['Foto'];

  if(empty($Foto)) {
    $simpan = mysqli_query($conn, 
    "update user set Nama='$Nama', Jabatan='$Jabatan', Perusahaan='$Perusahaan'
     where id=1"
    );
  } else {
    $simpan = mysqli_query($conn, 
    "update user set Nama='$Nama', Jabatan='$Jabatan', Perusahaan='$Perusahaan'
    Foto='$Foto' where id=1"
    );
  }

 

  if($simpan) {
    $pesan = "<div class='alert alert-success'>Profile berhasil diperbaharui</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Ops terjadi kesalahan</div>";
  }
}

$query = mysqli_query($conn, "SELECT * FROM `user`");
$data = mysqli_fetch_assoc($query);
?>

<div class="container-fluid px-2 px-md-4">
  <div class="card card-body min-height-400 border-radius-xl mt-4card card-body min-height-400 border-radius-xl mt-4">
    <div class="col-12 mt-4">
      <div class="mb-5 ps-3">
        <h1>
          Ubah Profile <?=$data['nama']?>
          <a href="?menu=profile" class="btn btn-secondary btn-sm"  style="margin-left: 55rem; margin-top: -7rem;">BACK</a>
        </h1>
      </div>
      <?=@$message?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>NAMA</label>
          <input type="text" name="nama" class="form-control" value="<?=$data['nama']?>" required>
        </div>
        <div class="form-group">
          <label>JABATAN</label>
          <input type="text" name="jabatan" class="form-control" value="<?=$data['jabatan']?>" required>
        </div>
        <div class="form-group">
          <label>PERUSAHAAN</label>
          <input type="text" name="perusahaan" class="form-control" value="<?=$data['perusahaan']?>" required>
        </div>
        <div class="form-group">
          <label>UPLOAD FOTO</label>
          <img src="../public/assets/img/<?=$data['foto']?>" width="300px">
          <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>