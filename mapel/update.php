<?php

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


$kode_mapel = $_POST ['kode_mapel'];
$kode_guru = $_POST['kode_guru'];
$mapel = $_POST['mapel'];
$alokasi_waktu = $_POST['alokasi_waktu'];
$semester = $_POST['semester'];

$query ="UPDATE matapelajaran SET mapel = '$mapel',
                               alokasi_waktu = $alokasi_waktu,
                               semester = $semester,
                               kode_guru = $kode_guru
        WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect,$query);
$num = mysqli_affected_rows($connect);

if($num > 0)
{
    header("location:read.php");
}
else
{
    echo "Gagal ubah data <br>";
}

echo "<a href='read.php'>Lihat data</a>";
?>