<?php
  $conexion=mysqli_connect("localhost","root","","r_user");
  if(isset($_POST)){
    if (strlen($_POST['recinto']) >= 1 && strlen($_POST['nombre']) >= 1 /* && strlen($_POST['password']) >= 1  */
    && strlen($_POST['rol']) >= 1 && strlen($_POST['matricula']) >= 1/* && strlen($_POST['servicio']) >= 1 */) {
        $recinto = trim($_POST['recinto']);
        $nombre = trim($_POST['nombre']);
        $rol = trim($_POST['rol']);
        $matricula= trim($_POST['matricula']);
       
        $servicio = ($_POST['servicio']);
        $responsable = ($_POST['responsable']);

  
      $consulta = "INSERT INTO participantes (recinto, nombre, rol, matricula, servicio, responsable)
      VALUES ('$recinto', '$nombre', '$rol', '$matricula', '$servicio', '$responsable')";
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