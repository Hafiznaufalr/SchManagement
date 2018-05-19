<?php
include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


?>
<!DOCTYPE html>
<html lang="en">                   
<head>
    <link rel="stylesheet" href="css/form-create.css">
    <script src="js/validasi.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>
<body>
<div class="form" >
    <form action="create.php" method="post" class="form-container">
    <h2 class="form-header">Tambah Data guru</h2>
   <p>
       <br>
    <input type="text" class="form-input" name="nama_guru" placeholder="Nama" id="nama_guru">
   <br>
    <input type="text" class="form-input" name="jumlah_jam"placeholder="Jumlah Jam" id="jumlah_jam">
    <br>
    <input type="text" class="form-input" name="alamat"placeholder="Alamat" id="alamat">
    <br>
    <input type="text" class="form-input" name="telp"placeholder="Telepon" id="telp">
    <br>
    <input type="text" class="form-input" name="email"placeholder="E-Mail" id="email">
    <br>
    <input type="submit" value"simpan"  onclick="return validasiMapel()">
</p>
    </form>
    </div>
</body>
</html>