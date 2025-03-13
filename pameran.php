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
            <h2 style="text-align:center; margin-bottom: 5px;">Pameran Sanggar Minat 2024</h2>
                <div class="menu-php" style="margin-bottom: 5px;">
                    <ul>
                        <li><a href="tambah_pameran.php" class="tbl-abu">Tambah</a></li>
                        <li><a href="edit_pameran.php" class="tbl-abu">Edit</a></li>
                        <li><a href="hapus_pameran.php" class="tbl-abu">Hapus</a></li>
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

                $sql="SELECT tanggal,nama,tempat,katalog,keterangan FROM pameran";
                // Query untuk menampilkan data pameran
                $query = "SELECT * FROM pameran";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Query gagal: " . mysqli_error($conn));
                }
                $num=mysqli_num_rows($result);
                if($num > 0){
                ?>

                <table border="1" cellspacing="0" cellpadding="5" style="margin-top: 5px;">
                    <tr>
                        <th width="120">Tanggal</th>
                        <th width="100">Nama Pameran</th>
                        <th width="100">Tempat</th>
                        <th width="120">Katalog</th>
                        <th width="320">Keterangan</th>
                    </tr>
                    <?php while (list($tanggal,$nama,$tempat,$katalog,$keterangan)= mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $tanggal; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $tempat; ?></td>
                            <td><a href="<?php echo $katalog; ?>" target="_blank"><?php echo $katalog; ?></a></td>
                            <td style="text-align: justify; vertical-align: top;"><?php echo $keterangan ; ?></td>
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