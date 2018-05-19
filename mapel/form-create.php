<?php

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


$query = "SELECT kode_guru, nama_guru FROM guru";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/form-create.css">
    <script src="js/validasi.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form" >
    <form action="create.php" method="post" class="form-container">
    <h2 class="form-header">Tambah Data Mapel</h2>
   <p>
       <br>
    <input type="text" class="form-input" name="kode_mapel" placeholder="kode" id="kode">
   <br>
    <input type="text" class="form-input" name="mapel" placeholder="Mata Pelajaran" id="mapel">
    <br>
    <input type="text" class="form-input" name="alokasi_waktu" placeholder="Alokasi Waktu" id="alokasi_waktu">
    <br>
    <input type="text" class="form-input" name="semester" placeholder="Semester" id="semester">
    <br>
    <select name="kode_guru" id="kode_guru">
            <option value="NULL">Tidak ada pengajar</option>
            <?php
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $data['kode_guru']; ?>">
            <?php echo $data['nama_guru']; ?>
            </option>
            <?php
            }
            ?>
        </select>
    <br>
    <input type="submit" value="simpan" onclick="return validasiMapel()">
</p>
    </form>
    </div>
</body>
</html>