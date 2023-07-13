<?php

// conexion DESARROLLO 
$host = "localhost";
$user = "root";
$password = "";
$database = "sistemabiblioteca";

//conexion PRODUCCION
#$host = "localhost";
#$user = "root";
#$password = "";
#$database = "r_user";

$conex = mysqli_connect($host, $user, $password, $database) or die  (mysqli_connect_error());

return $conex;

 
?>