<?php
$dbname='samin';
$host='localhost';
$password='MleeXXX_203127';
$username='root';

//Koneksi Ke MySQL

$conn = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
echo "Koneksi Gagal.";
exit();
}
?>