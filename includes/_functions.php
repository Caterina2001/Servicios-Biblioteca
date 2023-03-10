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

            case 'acceso_user';
            acceso_user();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","r_user");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../Views/user.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","r_user");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

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

    $conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM user WHERE correo='$correo' AND password='$password' ";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);

  


    if($filas['rol'] == 1){ //admin

        header('Location: ../Views/user.php');

    }else if($filas['rol'] == 2 && $filas ['recinto']=='FEM'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/FEM/Registros.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='EMH'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/EMH/Registros.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='EPH'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/EPH/Registros.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='JVM'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/JVM/Registros.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='LNNM'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/LNNM/Registros.php');

    }
    else if($filas['rol'] == 2 && $filas ['recinto']=='UM'){//lector
        //header('Location: ../Views/registros.php');
        header('Location: ../Views/UM/Registros.php');

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

    $conexion=mysqli_connect("localhost","root","","r_user");
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






