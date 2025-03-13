<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanggar Minat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Sanggar Minat</a></div>
            <div class="menu">
                <ul>
                    <li><a href="interface.php">Home</a></li>
                    <li><a href="pengurus.php">Pengurus</a></li>
                    <li><a href="anggota.php">Anggota Aktif</a></li>
                    <li><a href="pameran.php">Pameran</a></li>
                    <li><a href="kegiatan.php">Kegiatan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <section id="pengurus">
            <div class="php-output">
            <h2 style="text-align:center; margin-bottom: 5px;">Anggota Aktif UKM Sanggar Minat 2024</h2>
                <div class="menu-php" style="margin-bottom: 5px;">
                    <ul>
                        <li><a href="tambah_anggota.php" class="tbl-abu">Tambah</a></li>
                        <li><a href="edit_anggota.php" class="tbl-abu">Edit</a></li>
                        <li><a href="hapus_anggota.php" class="tbl-abu">Hapus</a></li>
                    </ul>
                </div>
                <br><br><br><br><br>
            <?php
                $host = 'localhost';
                $user = 'root';
                $password = 'MleeXXX_203127';
                $dbname = 'samin';

                $conn = new mysqli($host, $user, $password, $dbname);
                if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
                }

                session_start();

                $sql="select nama,nim,diklat,fakultas,prodi FROM anggota_aktif ORDER BY created_at ASC";
                // Query untuk menampilkan data anggota aktif
                $query = "SELECT * FROM anggota_aktif ORDER BY created_at ASC";
                $result = mysqli_query($conn, $sql);
                $num=mysqli_num_rows($result);
                if($num > 0){
                ?>

                <table border="1" cellspacing="0" cellpadding="5" style="margin-top: 5px;">
                    <tr>
                        <th width="190">Nama</th>
                        <th width="140">NIM</th>
                        <th width="190">Fakultas</th>
                        <th width="190">Prodi</th>
                        <th width="140">Diklat</th>
                    </tr>
                    <?php while (list($nama,$nim,$diklat,$fakultas,$prodi)= mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td Valign="top"><?php echo $nama; ?></td>
                            <td Valign="top"><?php echo $nim; ?></td>
                            <td Valign="top"><?php echo $fakultas; ?></td>
                            <td Valign="top"><?php echo $prodi; ?></td>
                            <td Valign="top"><?php echo $diklat; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                }else{
	                ?>
	                <i style="text-align: center; display: block;">Belum ada data.</i>
	                <?php
                }
                ?>
                </div>
</body>
</html>