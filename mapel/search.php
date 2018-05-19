<?php

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}
$cari = $_GET['cari'];
$kategori = $_GET['kategori'];
$query ="SELECT kode_mapel, mapel, alokasi_waktu, semester, nama_guru
         FROM matapelajaran LEFT JOIN guru
         USING (kode_guru)
         WHERE $kategori LIKE '%$cari%'
         ORDER BY kode_mapel";

$result  = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/read.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      
    </style>
</head>
<body onload="myFunction()">
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<div id="sideNavigation" class="sidenav">
<img src="img/tels.png" alt="">
  <h1>SEKOLAH</h1>
  <a href="../guru/read.php">Data Guru</a>
  <a href="../login/logout.php">Log out||<?php echo $_SESSION ['user']; ?></a>
</div>
 

        <h2>Mata Pelajaran</h2>
<br>
      <table>
          <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Mata Pelajaran</th>
              <th>Alokasi waktu</th>
              <th>Semester</th>
              <th>Guru Pengajar</th>
              <th colspan="2">Aksi</th>
        

              <?php

              if($num > 0)
              {
                  $no = 1;
                  while($data = mysqli_fetch_assoc($result)){ ?>

                    <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data ['kode_mapel']; ?></td>
                    <td> <?php echo $data ['mapel']; ?></td>
                    <td> <?php echo $data ['alokasi_waktu']; ?></td>
                    <td> <?php echo $data ['semester']; ?></td>
                    <td> 
                        <?php 
                               if($data['nama_guru'] != NULL)
                               { echo $data['nama_guru'];}
                               else{ echo "-";}
                           ?>
                    </td>
                    <td> <a href="form-update.php?kode_mapel=<?php echo $data['kode_mapel']; ?>" id="edit" >Edit </a> </td>
                    <td><a id="hapus" href="delete.php?kode_mapel=<?php echo $data ['kode_mapel'];  ?>"onclick="return confirm('Anda Yakin ingin menghapus data?')">Hapus</a></td>
                    </tr>

                    <?php
                    $no++;

                  }

              }

              else
              {
                  echo "<tr> <td colspan='5'>Tidak ada data </td></tr>";
              }
              
              ?>
          </tr>
      </table>
<br>
<a href="../mapel/read.php"><input type="submit" value="Kembali" id="back"></a> 
    </form>
    <script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

</script>

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