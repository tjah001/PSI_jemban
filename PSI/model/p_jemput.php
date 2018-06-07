<?php

include "../conf/koneksi.php";

$nik_pelapor = $_POST['nik_pelapor'];
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
$dusun = $_POST['dusun'];
$alamat_detail = $_POST['alamat_detail'];
$status = $_POST['status'];
$nama_lengkap = $_POST['nama_lengkap'];

$sql = "INSERT INTO jemput (nik_pelapor,nama_pelapor,telepon_pelapor,nik_korban,nama_korban,telepon_korban,j_lansia,j_bayi,j_anak,j_remaja,j_dewasa,j_sapi,j_kambing,j_ungas,j_kucing,kecamatan,kelurahan,dusun,alamat_detail,status,nama_lengkap)
VALUES ('$nik_pelapor', '$nama_pelapor', '$telepon_pelapor', '$nik_korban', '$nama_korban', '$telepon_korban', '$j_lansia', '$j_bayi', '$j_anak', '$j_remaja', '$j_dewasa', '$j_sapi', '$j_kambing', '$j_ungas', '$j_kucing', '$kecamatan', '$kelurahan',
	      '$dusun', '$alamat_detail','$status','$nama_lengkap')";
$q = $koneksi->query($sql);

if($q === TRUE){
	echo '<script>window.alert("Data berhasil ditambah");window.location=("../view/form_jemput.php");</script>';
}
else {
  echo "Terjadi kesalahan ".$koneksi->error;
}

$koneksi->close();

?>
