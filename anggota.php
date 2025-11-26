<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

    <div class="container">
        <h2 class="mb-4 text-center">Data Anggota Perpustakaan</h2>

        <a href="tambahAnggota.php" class="btn btn-success mb-3">Tambah Data</a>
        <a href="export_pdf.php" class="btn btn-primary mb-3 float-end">⬇️ Ekspor ke PDF</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $result = mysqli_query($koneksi, "SELECT * FROM anggota");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['no_anggota']; ?></td>
                        <td><?= $row['nama_anggota']; ?></td>
                        <td><?= $row['password_anggota']; ?></td>
                        <td><?= $row['alamat_anggota']; ?></td>
                        <td><?= $row['no_telp']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>

</html>