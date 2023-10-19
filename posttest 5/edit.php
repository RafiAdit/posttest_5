<?php
require "koneksi.php";
$id = $_GET["id"];

$result = mysqli_query($conn, "select * from request where id='$id'");

$request = [];

while ($row = mysqli_fetch_assoc($result)) {
    $request[] = $row;
}

$request = $request[0];

if (isset($_POST["ubah"])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $ukuran = $_POST['ukuran'];
    $ikan = $_POST['ikan'];
    $hias = $_POST['hias'];

    $result = mysqli_query($conn, "update request set nama='$nama', nomor='$nomor', email='$email', ukuran='$ukuran', ikan='$ikan' , hias='$hias' where id = '$id'");

    if ($result) {
        echo "
                <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'dashboard.php';
                </script>
            ";
    } else {
        echo "
            <script>
            alert('Data Gagal Diubah!');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="cv_style.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="cv.html">ABOUT ME</a></li>
                <li><a href="#">REQUEST</a></li>
                <li><a href="dashboard.php">DAFTAR REQUEST</a></li>
            </ul>
            </div>
        </div>
    </header>
    <div class="container1">
        <h1>Edit Request Aquarium</h1>
        <form action="" method="post">
            <label for="nama">Nama:</label>
            
            <input type="text" id="nama" value="<?=$request['nama']?>" name="nama" required>

            <label for="nomor">Nomor WhatsApp:</label>
            <input type="number" id="nomor" value="<?=$request['nomor']?>" name="nomor" required>

            <label for="email">Email:</label>
            <input type="email" id="email" value="<?=$request['email']?>" name="email" required>

            <label for="ukuran">Ukuran Aquarium:</label>
            <input type="text" id="ukuran" value="<?=$request['ukuran']?>" name="ukuran" required>

            <label for="ikan">Jenis Ikan yang Diinginkan:</label>
            <input type="text" id="ikan" value="<?=$request['ikan']?>" name="ikan" required>

            <label for="hias">Hiasan yang Diinginkan:</label>
            <input type="text" id="hias" value="<?=$request['hias']?>" name="hias" required>

            <input type="submit" name="ubah" value="Kirim">
        </form>
</body>

</html>