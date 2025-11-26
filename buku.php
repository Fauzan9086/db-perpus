<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php'; 

$sql = "SELECT * FROM buku";

$result = mysqli_query($koneksi, $sql);
if ($result === false) {
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku Perpustakaan Mulya Abadi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 10px auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #181818ff;
            text-align: center;
        }

        th {
            background: linear-gradient(200deg, #00fff2ff, #125dffff);
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Data Buku Perpustakaan Mulya Abadi</h2>

    <table>
        <tr>
            <th>Kode Buku</th>
            <th>Kode Pengarang</th>
            <th>Judul Buku</th>
            <th>Kode Penerbit</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['kode_buku']); ?></td>
                    <td><?php echo htmlspecialchars($row['kode_pengarang']); ?></td>
                    <td><?php echo htmlspecialchars($row['judul_buku']); ?></td>
                    <td><?php echo htmlspecialchars($row['kode_penerbit']); ?></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center;'>Tidak ada data</td></tr>";
        }

        mysqli_free_result($result);
        mysqli_close($koneksi);
        ?>

    </table>

</body>

</html>