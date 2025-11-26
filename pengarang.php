<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php'; // pastikan koneksi.php membuat $koneksi (mysqli)

$sql = "SELECT * FROM pengarang";

// jalankan query
$result = mysqli_query($koneksi, $sql);
if ($result === false) {
    // Jika query gagal, tampilkan error dan hentikan eksekusi
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Nama Pengarang Buku Yang Ada di Perpustakaan Mulya Abadi</title>
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
            background: linear-gradient(1000deg, #1143afff, #ffffffff, #1143afff );
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Pengarang Buku</h2>


    <table>
        <tr>
            <th>Kode Pengarang</th>
            <th>Nama Pengarang</th>
            <th>Alamat_Pengarang</th>    
        </tr>
        <?php
        // Cek jumlah baris > 0 (bukan > 7)
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['kode_pengarang']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pengarang']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat_pengarang']); ?></td>
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