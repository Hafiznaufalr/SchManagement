
<?php 

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


$kode_guru = $_GET['kode_guru'];

$query = "DELETE FROM guru WHERE kode_guru = $kode_guru";

$result = mysqli_query($connect,$query);

$num = mysqli_affected_rows($connect);

if($num > 0){
    header("location:read.php");
}
else{
    echo "<p>Gagal hapus data</p> <br>";
}

echo "<p><a href='read.php'>Lihat Data</a></p>";
?>