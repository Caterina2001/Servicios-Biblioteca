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
		password ='$password', rol = '$rol' WHERE id = '$id' ";

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
    $correo=$_POST['correo'];
    $password=$_POST['password'];
    $rol=$_POST['rol'];
    $nombre=$_POST['nombre'];
    session_start();
    $_SESSION['correo']=$correo;
    $_SESSION2['rol']=$rol;
    $_SESSION3['nombre']=$nombre;

    $conexion= $GLOBALS['conex']; 
    $consulta= "SELECT * FROM user WHERE correo='$correo' AND password='$password' ";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);

   

  


    if($filas['rol'] == 1){ //admin

        header('Location: ../Views/user.php');

    }else if($filas['rol'] == 2 && $filas ['recinto']=='FEM'){//lector
        
        header('Location: ../Isfodosu/653.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='EMH'){//lector
        /* header('Location: ../Views/EMH/Registros.php'); */
        header('Location: ../Isfodosu/538.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='EPH'){//lector
        
        header('Location: ../Isfodosu/518.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='JVM'){//lector
       
        header('Location: ../Isfodosu/023.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='LNNM'){//lector
        
        header('Location: ../Isfodosu/243.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='UM'){//lector
       
        header('Location: ../Isfodosu/213.php');

    }
    
    
    
    else{

        header("location: login.php?fallo=true");
        session_destroy();

    }

  
}

/* function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=$GLOBALS['conex']; 
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../Views/user.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../Views/registros.php');
    }
    
    
    else{

        header('Location: excel.php');
        session_destroy();

    }

  
} */






