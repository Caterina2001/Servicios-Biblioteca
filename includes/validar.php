<?php
  $conexion=mysqli_connect("localhost","root","","r_user");
  if(isset($_POST)){
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 /* && strlen($_POST['password']) >= 1  */
    && strlen($_POST['telefono']) >= 1 && strlen($_POST['matricula']) >= 1) {
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
/*         $password = trim($_POST['password']);
 */        $telefono = trim($_POST['telefono']);
        $matricula= trim($_POST['matricula']);
  
      $consulta = "INSERT INTO participantes (nombre, correo, telefono, matricula)
      VALUES ('$nombre', '$correo', '$telefono', '$matricula')";
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