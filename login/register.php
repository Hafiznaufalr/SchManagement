<?php

include '../connect.php';


$username = $_POST ['username'];
$password = $_POST ['password'];


$query = "INSERT INTO user (username, password)
          VALUES ('$username','$password')";

$result = mysqli_query($connect,$query);

$num = mysqli_affected_rows($connect);

if($num > 0){
    header("location: ../login/form-login.php");
}
else{
    echo "Gagal tambah user";
}   
echo " <a href='form-login.php'>LOGIN</a>";

?>