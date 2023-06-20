
<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['recinto']) >= 1 && strlen($_POST['nombre']) >= 1
    && strlen($_POST['rol']) >= 1 && strlen($_POST['matricula']) >= 1 && strlen($_POST['servicio']) >= 1 
    && strlen($_POST['responsable']) >= 1 && strlen($_POST['tipoprestamo']) >= 1 && strlen($_POST['tipomaterial']) >= 1 
    && strlen($_POST['registro']) >= 1 && strlen($_POST['titulo']) >= 1 && strlen($_POST['autor']) >= 1) {
        $recinto = trim($_POST['recinto']);
        $nombre = trim($_POST['nombre']);
        $rol = trim($_POST['rol']);
        $matricula= trim($_POST['matricula']);
        $servicio = trim($_POST['servicio']);
        $responsable = trim($_POST['responsable']);
        $tipoprestamo = trim($_POST['tipoprestamo']);
        $tipomaterial = trim($_POST['tipomaterial']);
        $registro = trim($_POST['registro']);
        $titulo = trim($_POST['titulo']);
        $autor = trim($_POST['autor']);

  
      $consulta = "INSERT INTO participantes (recinto, nombre, rol, matricula, servicio, responsable, tipoprestamo, tipomaterial, registro, titulo, autor)
      VALUES ('$recinto', '$nombre', '$rol', '$matricula', '$servicio', '$responsable', '$tipoprestamo', '$tipomaterial', '$registro', '$titulo', '$autor')";
        $resultado=mysqli_query($conexion, $consulta);
  
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