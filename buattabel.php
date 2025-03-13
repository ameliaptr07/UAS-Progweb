<?php
$dbname='samin';
$host='localhost';
$password='MleeXXX_203127';
$username='root';

// koneksi ke MySQL
$conn = mysqli_connect($host,$username,$password,$dbname);

// membuat koneksi
if(!$conn){
	die("Koneksi Failed : ".mysqli_connect_error()); }
	
// membuat tabel pengurus
$sql = "CREATE TABLE pengurus (
	jabatan VARCHAR(50) NULL,
	nama VARCHAR(50) Null,
	nim CHAR(15) NOT NULL,
	fakultas VARCHAR(50) Null,
	prodi VARCHAR(100) Null,
	constraint pk_datapengurus primary key(nim)
)";

// membuat tabel anggota aktif
$sql = "CREATE TABLE anggota_aktif (
	nama VARCHAR(50) Null,
	nim CHAR(15) NOT NULL,
	diklat INT NULL,
	fakultas VARCHAR(50) Null,
	prodi VARCHAR(100) Null,
	constraint pk_dataanggota primary key(nim)
)";

// membuat tabel pameran
$sql = "CREATE TABLE pameran (
	tanggal VARCHAR(100) NOT NULL,
	nama VARCHAR(100) NOT Null,
	tempat VARCHAR(100) NOT NULL,
	katalog VARCHAR(255) Null,
	keterangan VARCHAR(10000) Null,
	constraint pk_datapameran primary key(tanggal, nama)
)";

// membuat tabel kegiatan
$sql = "CREATE TABLE kegiatan (
	tanggal VARCHAR(100) NOT NULL,
	nama VARCHAR(100) NOT Null,
	tempat VARCHAR(100) NULL,
	keterangan VARCHAR(10000) Null,
	artikel VARCHAR(255) Null,
	constraint pk_datapameran primary key(tanggal, nama)
)";

if (mysqli_query($conn, $sql)){
	echo "Tabel berhasil dibuat";
	}else {
	echo "Tabel gagal dibuat :".mysqli_error($conn); }
	mysqli_close($conn);
?>