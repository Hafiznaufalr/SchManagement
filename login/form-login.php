<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../login/form-login.css">
  <script src="js/validasi.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="myFunctionn()">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

    <div class="login">
    <h2 class="login-header">S e k o l a h</h2>
    <form action="login.php" method="post" class="login-container">
    
<p>
    <input type="text" name="username" placeholder="Username" id="username"></input>
</p>
    
    <p>
    <input type="password" name="password" placeholder="Password" id="password" ></input>
    <br>
    <input id="check" type="checkbox" onclick="myFunction()">Show Password</input>
    </p>
    <p>
    <input type="submit" value="Log in" onclick="return validasiLogin()">
    </p>
    <p id="regis">Belum Punya Akun?  <a href="form-register.php" >Register</a></p>
    </form>
    <script>
      function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
    </script>
    <script>
var myVar;

function myFunctionn() {
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