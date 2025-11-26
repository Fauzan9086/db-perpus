<?php
include 'koneksi.php';

$sql = "SELECT * FROM anggota";
$result = mysqli_query($koneksi, $sql);

if ($result === false) {
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota PT. Bangkit Laksana @ 2025 </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #222;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #5af56f;
        }
        .no-data {
            text-align: center;
            font-style: italic;
        }
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h2>Daftar Anggota PT. Bangkit Laksana</h2>

    <button onclick="window.print()">Simpan ke PDF</button>

    <table>
        <tr>
            <th>No Anggota</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>No Telepon</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['no_anggota']) . "</td>
                        <td>" . htmlspecialchars($row['nama_anggota']) . "</td>
                        <td>" . htmlspecialchars($row['password_anggota']) . "</td>
                        <td>" . htmlspecialchars($row['alamat_anggota']) . "</td>
                        <td>" . htmlspecialchars($row['no_telp']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='no-data'>Tidak ada data anggota.</td></tr>";
        }

        mysqli_free_result($result);
        mysqli_close($koneksi);
        ?>
    </table>

</body>
</html>
