<?php
include "koneksi.php";

$sql = "CREATE TABLE Jemput(
nik_pelapor varchar(16) PRIMARY KEY NOT NULL,
nama_pelapor varchar(100) NOT NULL,
telepon_pelapor varchar(15),
nik_korban varchar(16) NOT NULL,
nama_korban varchar(100),
telepon_korban varchar(15),
j_lansia int(8) NOT NULL,
j_bayi int(8) NOT NULL,
j_anak int(8) NOT NULL,
j_remaja int(8) NOT NULL,
j_dewasa int(8) NOT NULL,
j_sapi int(8) NOT NULL,
j_kambing int(8) NOT NULL,
j_ungas int(8) NOT NULL,
j_kucing int(8) NOT NULL,
kecamatan varchar(16) NOT NULL,
kelurahan varchar(16) NOT NULL,
dusun varchar(16) NOT NULL,
alamat_detail varchar(255) NOT NULL,
status varchar(20) NOT NULL
)";
$q = $koneksi->query($sql);
if ($q ===TRUE){
	echo "Tabel Jemput sukses dibuat";
}else{
	echo "Gagal Membuat Tabel.".$koneksi->error;
}
$koneksi->close();

?>
