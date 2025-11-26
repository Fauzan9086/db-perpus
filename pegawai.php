<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

$sql = "SELECT * FROM pegawai";
$result = mysqli_query($koneksi, $sql);

if ($result === false) {
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Pegawai Perpustakaan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 10px auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #181818ff;
            text-align: center;
        }

        th {
            background: linear-gradient(200deg, #00a2ff, #00ff88);
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Data Pegawai Perpustakaan</h2>

    <table>
        <tr>
            <th>NIP Pegawai</th>
            <th>Password</th>
            <th>Nama Pegawai</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // ubah JK jadi teks
                $jk = ($row['jk'] == 1) ? "Laki-laki" : "Perempuan";
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nip_peg']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pegawai']); ?></td>
                    <td><?php echo $jk; ?></td>
                    <td><?php echo htmlspecialchars($row['alamat_pegawai']); ?></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>Tidak ada data</td></tr>";
        }

        mysqli_free_result($result);
        mysqli_close($koneksi);
        ?>
    </table>

</body>

</html>