<?php
$conn = mysqli_connect('localhost', 'root', 'MleeXXX_203127', 'samin');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangani form submit
if (isset($_POST['submit'])) {
    $tanggal_baru = $_POST['tanggal'];
    $nama_baru = $_POST['nama'];
    $tempat_baru = $_POST['tempat'];
    $keterangan_baru = $_POST['keterangan'];
    $artikel_baru = $_POST['artikel'];

    if ($tanggal_baru && $nama_baru && $tempat_baru && $keterangan_baru && $artikel_baru) {
        $update_query = "UPDATE kegiatan SET 
                         tanggal = '$tanggal_baru', 
                         tempat = '$tempat_baru',  
                         keterangan = '$keterangan_baru',
                         artikel = '$artikel_baru' 
                         WHERE nama = '$nama_baru'";

        if (mysqli_query($conn, $update_query)) {
            echo "Data kegiatan berhasil diperbarui!";
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($conn);
        }
    } else {
        echo "Mohon lengkapi semua data.";
    }
}

// Untuk pengisian data berdasarkan NAMA
$data = null;
if (isset($_POST['cari_nama'])) {
    $nama = $_POST['nama'];
    $query = "SELECT * FROM Kegiatan WHERE nama = '$nama'";
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
    <title>Perbarui Data Kegiatan</title>
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
    <h2>Perbarui Data Kegiatan</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama Kegiatan</td>
                <td>
                    <input type="text" name="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" maxlength="100" placeholder="Masukkan Nama Kegiatan" />
                    <input type="submit" name="cari_nama" value="Cari">
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="text" name="tanggal" value="<?php echo isset($data['tanggal']) ? $data['tanggal'] : ''; ?>" maxlength="100" /></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td><input type="text" name="tempat" value="<?php echo isset($data['tempat']) ? $data['tempat'] : ''; ?>" maxlength="100" /></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?php echo isset($data['keterangan']) ? $data['keterangan'] : ''; ?>" maxlength="10000" /></td>
            </tr>
            <tr>
                <td>Link Artikel</td>
                <td><input type="text" name="artikel" value="<?php echo isset($data['artikel']) ? $data['artikel'] : ''; ?>" maxlength="255" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Perbarui"></td>
            </tr>
        </table>
    </form>
    <br><br>
    <a href="kegiatan.php" class="button">Kembali ke Daftar Kegiatan</a>
</body>
</html>
