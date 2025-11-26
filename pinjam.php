<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

$sql = "SELECT * FROM pinjam";
$result = mysqli_query($koneksi, $sql);

if ($result === false) {
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman Perpustakaan Mulya Abadi</title>
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
            background: linear-gradient(200deg, #ff0000ff, #fffb12ff);
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Data Peminjaman Buku</h2>

    <table>
        <tr>
            <th>ID Pinjam</th>
            <th>No Seri</th>
            <th>NIP Pegawai</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // ubah status jadi teks
                $status = ($row['status'] == 1) ? "Sudah kembali" : "Belum kembali";
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_pinjam']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_seri']); ?></td>
                    <td><?php echo htmlspecialchars($row['nip_pegawai']); ?></td>
                    <td><?php echo htmlspecialchars($row['tgl_harus_kembali']); ?></td>
                    <td><?php echo htmlspecialchars($row['tgl_kembali']); ?></td>
                    <td><?php echo htmlspecialchars($row['denda']); ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data</td></tr>";
        }

        mysqli_free_result($result);
        mysqli_close($koneksi);
        ?>
    </table>

</body>

</html>