<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $ukuran = $_POST['ukuran'];
    $ikan = $_POST['ikan'];
    $hias = $_POST['hias'];
    $result = mysqli_query($conn, "INSERT INTO request VALUES 
    ('', '$nama', '$nomor', '$email', '$ukuran', '$ikan','$hias')");

    if ($result) {
        echo "
        <script>
            alert('Data Berhasil DiTambahkan!');
            document.location.href = 'dashboard.php'
        </script>";
    }else {
        echo "
        <script>
            alert('Data Gagal DiTambahkan!');
            document.location.href = 'req.html'
        </script>";
    }
}
?>