<?php
$conn = mysqli_connect('localhost', 'root', 'MleeXXX_203127', 'samin');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangani form submit
if (isset($_POST['submit'])) {
    $jabatan_baru = $_POST['jabatan'];
    $nama_baru = $_POST['nama'];
    $nim_baru = $_POST['nim'];
    $fakultas_baru = $_POST['fakultas'];
    $prodi_baru = $_POST['prodi'];

    if ($jabatan_baru && $nama_baru && $nim_baru && $fakultas_baru && $prodi_baru) {
        $update_query = "UPDATE pengurus SET 
                         jabatan = '$jabatan_baru', 
                         nama = '$nama_baru', 
                         fakultas = '$fakultas_baru', 
                         prodi = '$prodi_baru' 
                         WHERE nim = '$nim_baru'";

        if (mysqli_query($conn, $update_query)) {
            echo "Data pengurus berhasil diperbarui!";
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($conn);
        }
    } else {
        echo "Mohon lengkapi semua data.";
    }
}

// Tangani pengisian data berdasarkan NIM
$data = null;
if (isset($_POST['cari_nim'])) {
    $nim = $_POST['nim'];
    $query = "SELECT * FROM pengurus WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
    }
}

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perbarui Data Pengurus</title>
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
       
        input[type="text"] {
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
    <h2>Perbarui Data Pengurus</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>NIM</td>
                <td>
                    <input type="text" name="nim" value="<?php echo isset($data['nim']) ? $data['nim'] : ''; ?>" maxlength="50" placeholder="Masukkan NIM" />
                    <input type="submit" name="cari_nim" value="Cari">
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td><input type="text" name="jabatan" value="<?php echo isset($data['jabatan']) ? $data['jabatan'] : ''; ?>" maxlength="50" /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" maxlength="100" /></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td><input type="text" name="fakultas" value="<?php echo isset($data['fakultas']) ? $data['fakultas'] : ''; ?>" maxlength="100" /></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi" value="<?php echo isset($data['prodi']) ? $data['prodi'] : ''; ?>" maxlength="100" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Perbarui"></td>
            </tr>
        </table>
    </form>
    <br><br>
    <a href="pengurus.php" class="button">Kembali ke Daftar Pengurus</a>
</body>
</html>
