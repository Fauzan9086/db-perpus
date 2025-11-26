<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Tambah Data Anggota</h2>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">No Anggota</label>
                <input type="text" class="form-control" name="no_anggota">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_anggota">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password_anggota">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat_anggota"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">No Telepon</label>
                <input type="text" class="form-control" name="no_telp">
            </div>

            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST['simpan'])) {
    $no     = $_POST['no_anggota'];
    $nama   = $_POST['nama_anggota'];
    $pass   = $_POST['password_anggota'];
    $alamat = $_POST['alamat_anggota'];
    $telp   = $_POST['no_telpon'];

    $query = "INSERT INTO anggota (no_anggota, nama_anggota, password_anggota, alamat_anggota, no_telp)
              VALUES ('$no', '$nama', '$pass', '$alamat', '$telp')";

    mysqli_query($koneksi, $query);

    header("Location: anggota.php");
}
?>