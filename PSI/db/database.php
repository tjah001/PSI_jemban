<?php
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";

$koneksi = new mysqli($namaServer, $namaPengguna, $password);

if ($koneksi->connect_error){
	die("Koneksi Gagal : ".$koneksi->connect_error."<br>");
}

$sql = "CREATE DATABASE fixpsi";
$q = $koneksi->query($sql);
if ($q === TRUE) {
	echo "Basisdata 'fixpsi' sukses dibuat";
}else {
	echo "Gagal membuat basisdata 'fixpsi' ". $koneksi->error;
}
$koneksi->close();

?>
