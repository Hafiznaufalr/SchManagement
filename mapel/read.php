<?php

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

$query ="SELECT kode_mapel, mapel, alokasi_waktu, semester, nama_guru
         FROM matapelajaran LEFT JOIN guru
         USING (kode_guru)
         ORDER BY kode_mapel";

$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/read.css">
<script src="js/validasi.js"></script>
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

  <a href="../login/logout.php">Log out || <?php echo $_SESSION ['user']; ?> </a>
  <footer> <p> SEKOLAH - Copyright &copy; 2018 </p>  </footer>
</div>
 
        <h2>Mata Pelajaran</h2>

<form action="search.php" method="get" class="cari">
<input type="search" name="cari" placeholder="Cari" id="src">

<select name="kategori" id="drop">

<option value="kode_mapel">Kode Mapel</option>
<option value="mapel">Nama Mapel</option>
<option value="alokasi_waktu">Alokasi Waktu</option>

</select>
<input type="submit" value="Cari&nbsp;" onclick="return validasiSearch()">

</form>
<br>
<a href="form-create.php" id="plus">[+] Tambah Data</a>
<br>
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
                    <td id="mapel"> <?php echo $data ['kode_mapel']; ?></td>
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

    </form>

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