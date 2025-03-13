<?php
	$conn = mysqli_connect('localhost','root', 'MleeXXX_203127');
	if(mysqli_connect_errno()){
	echo "koneksi ke server gagal";
	}
	$sql = "CREATE DATABASE samin";
		if(mysqli_query($conn, $sql))
		{ echo "Database Berhasil dibuat";
		} else{ echo "Gagal membuat Database :".mysqli_error($conn); }
		mysqli_close($conn);
?>