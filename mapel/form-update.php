<?php
include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

$kode_mapel = $_GET['kode_mapel'];

$query=" SELECT kode_mapel, mapel, alokasi_waktu, semester, matapelajaran.kode_guru, nama_guru
         FROM matapelajaran LEFT JOIN guru USING(kode_guru)
         WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect, $query);

$data_guru = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/form-create.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
<div class="form" >
    <form action="update.php" method="post" class="form-container">
    <h2 class="form-header">Update Data Mapel</h2>
    <table>
      <br>
    <p>
         <input type="text" name="kode_mapel" id="kode" readonly  value="<?php echo $data_guru['kode_mapel']; ?> ">
      <br>
     
         <input type="text" name="mapel" id="mapel" value="<?php echo $data_guru['mapel']; ?>">
         
      <br>
      <input type="number" name="alokasi_waktu" id="alokasi_waktu" value="<?php echo $data_guru['alokasi_waktu']; ?>">
      <br>
      <input type="number" name="semester" id="semester" value="<?php echo $data_guru['semester']; ?>">
    
      <br>
      
      <select name="kode_guru" id="nama_guru">
          <option value="NULL">Tidak ada pengajar</option>
          <?php
          $query2= "SELECT kode_guru, nama_guru FROM guru";
          $result2 = mysqli_query($connect,$query2);
          while($data= mysqli_fetch_assoc($result2)) { ?>


          <option value="<?php echo $data['kode_guru']; ?>" <?php if($data_guru['kode_guru'] == $data['kode_guru']){echo "selected"; } ?>>
          <?php echo $data['nama_guru']; ?> 
         

        </option>
          <?php }
          ?>
          
      </select>        
         <input type="submit" name="btnSimpan" value="Simpan" >
         </p>
     
    </table>
    </form>                                               
         </div>
</body>

</html>                                            