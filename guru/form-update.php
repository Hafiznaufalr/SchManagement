<?php 

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

$kode_guru = $_GET['kode_guru'];

$query = "SELECT * FROM guru WHERE kode_guru = $kode_guru";

$result = mysqli_query($connect, $query);

$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
   <link rel="stylesheet" href="css/form-create.css">
</head>
<body>
<div class="form" >
    <form action="update.php" method="post" class="form-container">
    <h2 class="form-header">Update Data guru</h2>
    <table>
      <br>
    <p>
         <input type="text" name="nama_guru" id="nama" value="<?php echo $row['nama_guru']; ?> ">
      <br>
     
         <input type="text" name="jumlah_jam" id="jumlah_jam" value="<?php echo $row['jumlah_jam']; ?>">
         
      <br>
      <input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>">
      <br>
      <input type="text" name="telp" id="telp" value="<?php echo $row['telp']; ?>">
      <br>
      <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>">
      <br>
         <input type="hidden" name="kode_guru" value="<?php echo $row['kode_guru']; ?>">
         <input type="submit" name="btnSimpan" value="Simpan" >
         </p>
     
    </table>
    </form>
</body>
</html>