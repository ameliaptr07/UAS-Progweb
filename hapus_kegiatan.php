<?php
$conn = mysqli_connect('localhost', 'root', 'MleeXXX_203127', 'samin');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nama_hapus = $_POST['nama'];

    if ($nama_hapus) {
        // Fix: Closing quote for tanggal field is added
        $sql = "DELETE FROM kegiatan WHERE nama = '$nama_hapus'";

        if (mysqli_query($conn, $sql)) {
            echo "Data kegiatan berhasil dihapus!";
        } else {
            echo "Gagal menghapus data kegiatan.";
        }
    } else {
        echo "Mohon masukkan Nama Kegiatan.";
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Kegiatan</title>
    <style>
        body {
            background-color: #c2c1c0;
            text-align: center;
            padding: 20px;
            color: white;
        }
        table {
            margin: auto;
            width: 50%;
            font-family: Arial, sans-serif;
            background-color: #000000;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table td {
            border: 0px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }


        input[type="textfield"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 22px); 
            box-sizing: border-box; 
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #c2c1c0;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #ff0000;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000000;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }

        .button:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>
    <h2>Hapus Data Kegiatan</h2>
    <form method="POST" action="">
    <table>
    <tr>
		<td>Nama Kegiatan</td>
		<td><input type="textfield" name="nama" maxlength="100" size="50" /></td>
	</tr>
    <tr></tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Hapus"></td>
	</tr>
</table>
    <br><br>
    <a href="kegiatan.php" class="button">Kembali ke Daftar Kegiatan</a>
</body>
</html>
