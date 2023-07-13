<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'editar_participantes';
            editar_participantes();
    
            break;

            case 'eliminar_participantes';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

		}

	}

function editar_registro() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $consulta="UPDATE user SET nombre = '$nombre', correo = '$correo',
    password ='$password', rol = '$rol', recinto = '$recinto' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);


    header('Location: ../Views/user.php');

}

function eliminar_registro() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../Views/user.php');

}
function editar_participantes() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $consulta="UPDATE participantes SET recinto = '$recinto',nombre = '$nombre', rol = '$rol', matricula = '$matricula',
    servicio ='$servicio', tipoprestamo = '$tipoprestamo', tipomaterial = '$tipomaterial', titulo = '$titulo', autor = '$autor', registro = '$registro' WHERE id = '$id' ";
    mysqli_query($conexion, $consulta);


    header('Location: ../Views/user.php');

}

function eliminar_participantes() {
$conexion=$GLOBALS['conex']; 
extract($_POST);
$id= $_POST['id'];
$consulta= "DELETE FROM participantes WHERE id= $id";

mysqli_query($conexion, $consulta);


header('Location: ../Views/user.php');

}



function acceso_user() {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    session_start();
    $_SESSION['correo'] = $correo;

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM user WHERE correo='$correo' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $rol = $filas['rol'];
        $recinto = $filas['recinto'];

        $_SESSION['rol'] = $rol;
        $_SESSION['recinto'] = $recinto;

        if($filas['rol'] == 1){ //admin

            header('Location: ../views/user.php');
    
        }else if($filas['rol'] == 2){//lector
            
            header('Location: ../views/participantes.php');
    
        }
        else{
            header("location: ../index.php?fallo=true");
            session_destroy();
    
        }
    } else {
        header("location: ../index.php?fallo=true");
        session_destroy();
    }
}