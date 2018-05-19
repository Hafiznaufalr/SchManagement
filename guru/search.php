<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$cari = $_GET['cari'];
$kategori = $_GET['kategori'];

$query = "SELECT * FROM guru WHERE $kategori LIKE '%$cari%'";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/search.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Guru</title>
  

<body onload="myFunction()">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<div id="sideNavigation" class="sidenav">
<img src="img/tels.png" alt="">
  <h1>SEKOLAH</h1>
  <a href="../mapel/read.php">Mata Pelajaran</a>
  <a href="../login/logout.php">Log out||<?php echo $_SESSION ['user']; ?></a>
</div>
 
    
    <h2>Data Guru</h2>
<br>
    <table class="table">
    <tr>
          <th>Kode Guru</th>
          <th>Nama Guru</th>
          <th>Jumlah jam</th>   
          <th>Alamat</th>   
          <th>Telepon</th>   
          <th>E-mail</th>   
          <th colspan='2'>Aksi</th> 
    </tr>
    
    <?php
    if($num > 0)
    {
        $no = 1;
        while($data = mysqli_fetch_assoc($result))
        {
        echo "<tr>";
        echo "<td>". $data ['kode_guru'] . "</td>";
        echo "<td>" . $data ['nama_guru']. "</td>";
        echo "<td>" .  $data ['jumlah_jam'] . "</td>";
        echo "<td>" .  $data ['alamat'] . "</td>";
        echo "<td>" .  $data ['telp'] . "</td>";
        echo "<td>" .  $data ['email'] . "</td>";
        echo "<td><a id='edit' href ='form-update.php?kode_guru=".$data['kode_guru']."'> Edit</a>  ";
        echo "<td><a id='hapus' href ='delete.php?kode_guru=".$data['kode_guru']."'onclick='return confirm(\"Apakah anda yakin akan menhapus data\")'>Hapus</a>  ";
        echo "</tr>";

        $no++;
        }
    }
    else
    {
        echo "<td colspan = '3'>Tidak ada data </td>";

    }
    ?>
    
    </table>
    <br>
    <a href="../guru/read.php"><input type="submit" value="Kembali" id="back"></a> 
    <br>
    <script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</div>
</body>
</html>