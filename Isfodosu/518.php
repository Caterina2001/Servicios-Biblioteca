<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];
$validar2 = $_SESSION2['rol'];
$nombre = $_SESSION3['nombre'];


if( $validar == null || $validar = '' /* || $validar2!='3'  */){

  header("Location: ../includes/login.php");
  die();
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<frameset rows="100%" border=0 frameborder=0 framespacing=0>
<frame name="top" src="../Views/EPH/Registros.php" noresize></frameset>
<body>
    <h1>HOLAAAA</h1>
    <a href="../Views/EPH/Registros.php" class="navbar-brand" style="color: black">ISFODOSU</a>
    
</body>
</html>