<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 /* && strlen($_POST['password']) >= 1  */
    && strlen($_POST['password']) >= 1 && strlen($_POST['rol']) >= 1 ) {
        $recinto = trim($_POST['recinto']);
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $password = trim($_POST['password']);
        $rol = trim($_POST['rol']);
      

  
      $consulta = "INSERT INTO user (recinto, nombre, correo, password, rol)
      VALUES ('$recinto', '$nombre', '$correo', '$password', '$rol')";
        $resultado=mysqli_query($conexion, $consulta);
    /* $consulta = "INSERT INTO user (nombre, correo, telefono, password, rol)
    VALUES ('$nombre', '$correo', '$telefono', '$password', '$rol')";
      $resultado=mysqli_query($conexion, $consulta); */
  
      if($resultado){
  echo'Correcto';
        
      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }
  
  
  

 








?>