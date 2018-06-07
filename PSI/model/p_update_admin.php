<?php

include "../conf/koneksi.php";

if (isset($_POST['submit'])){
  $nik_pelapor = $_POST['nik_pelapor'];
  $dusun = $_POST['dusun'];
  $alamat_detail = $_POST['alamat_detail'];

  $nama_pelapor = $_POST['nama_pelapor'];
  $telepon_pelapor = $_POST['telepon_pelapor'];

  $nik_korban = $_POST['nik_korban'];
  $nama_korban = $_POST['nama_korban'];
  $telepon_korban = $_POST['telepon_korban'];

  $j_lansia = $_POST['j_lansia'];
  $j_bayi = $_POST['j_bayi'];
  $j_anak = $_POST['j_anak'];

  $j_remaja = $_POST['j_remaja'];
  $j_dewasa = $_POST['j_dewasa'];

  $j_sapi = $_POST['j_sapi'];
  $j_kambing = $_POST['j_kambing'];
  $j_ungas = $_POST['j_ungas'];
  $j_kucing = $_POST['j_kucing'];

  $kecamatan = $_POST['kecamatan'];
  $kelurahan = $_POST['kelurahan'];

  $nama_lengkap = $_POST['nama_lengkap'];
  $status = $_POST['status'];
}

$sql = "UPDATE jemput set nik_pelapor = '$nik_pelapor',
dusun = '$dusun',
alamat_detail = '$alamat_detail',

kecamatan = '$kecamatan',
kelurahan = '$kelurahan',

j_lansia = '$j_lansia',
j_bayi = '$j_bayi',
j_anak = '$j_anak',
j_remaja = '$j_remaja',
j_dewasa = '$j_dewasa',

j_sapi = '$j_sapi',
j_kambing = '$j_kambing',
j_ungas = '$j_ungas',
j_kucing = '$j_kucing',

nama_pelapor = '$nama_pelapor',
telepon_pelapor = '$telepon_pelapor',

nik_korban = '$nik_korban',
nama_korban = '$nama_korban',
telepon_korban = '$telepon_korban',
nama_lengkap='$nama_lengkap',
status='$status'

WHERE nik_pelapor='$nik_pelapor'";

$q = $koneksi->query($sql);

if($q === TRUE){
	echo '<script>window.location=("../view/home_admin.php");
  </script>';
}
else {
  echo "Terjadi kesalahan ".$koneksi->error;
}

$koneksi->close();

?>
