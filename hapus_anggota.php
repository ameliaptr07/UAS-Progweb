<?php
$conn = mysqli_connect('localhost', 'root', 'MleeXXX_203127', 'samin');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nim_hapus = $_POST['nim'];

    if ($nim_hapus) {
        $sql = "DELETE FROM anggota_aktif WHERE nim = '$nim_hapus'";

        if (mysqli_query($conn, $sql)) {
            echo "Data anggota berhasil dihapus!";
        } else {
            echo "Gagal menghapus data anggota.";
        }
    } else {
        echo "Mohon masukkan NIM anggota.";
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Anggota</title>
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
            border: 0px solid #ddd; /* Border antar sel */
            padding: 10px; /* Ruang di dalam sel */
            text-align: left; /* Teks rata kiri */
        }

        input[type="textfield"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px; /* Membuat sudut menjadi bulat */
            width: calc(100% - 22px); /* Sesuaikan dengan tabel */
            box-sizing: border-box; /* Menghitung padding dalam ukuran */
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
    <h2>Hapus Data Anggota Aktif</h2>
    <form method="POST" action="">
    <table>
    <tr>
		<td>NIM</td>
		<td><input type="textfield" name="nim" maxlength="50" size="50" /></td>
	</tr>
    <tr></tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Hapus"></td>
	</tr>
</table>
    <br><br>
    <a href="anggota.php" class="button">Kembali ke Daftar Anggota Aktif</a>
</body>
</html>