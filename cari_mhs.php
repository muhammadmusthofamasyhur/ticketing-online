<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Syntax untuk mengambil semua data dari table mahasiswa
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>

<head>
    <title>Halaman Utama</title>
</head>

<body>
    <a href="index.php">Kembali Ke Menu Utama</a>
    <form action="" method="GET" style="margin-top: 1em">
        <input style="padding:1em 2em; width:80%;" type="text" name="cari_nama" placeholder="Cari Data Berdasarkan Nama">
    </form>

    <?php if (isset($_GET['cari_nama'])) : ?>

        <?php
        $cari_nama = $_GET['cari_nama'];
        $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari_nama%' LIMIT 1 ");
        ?>

        <?php if ($result->num_rows > 0) : ?>
            <table width='80%' border=1>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Update</th>
                </tr>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['nim'] . "</td>";
                    echo "<td>" . $user_data['nama'] . "</td>";
                    echo "<td>" . $user_data['jenis_kelamin'] . "</td>";
                    echo "<td>" . $user_data['alamat'] . "</td>";
                    echo "<td>" . $user_data['tgl_lahir'] . "</td>";
                    echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
                }
                ?>
            </table>
        <?php else : ?>
            <table width='80%' border=1>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td colspan="6" align="center">Data tidak di temukan!</td>
                </tr>
            </table>
        <?php endif; ?>


    <?php endif; ?>
</body>

</html>