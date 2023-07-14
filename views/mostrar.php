<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

    header("Location: ../index.php");
    die(); 

}

$id= $_GET['id'];
$conexion = $GLOBALS['conex']; 
$consulta= "SELECT * FROM participantes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/resp/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
    <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">

  </head>

  <body>
    <div class="container is-fluid">
      <div class="col-xs-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379; position: fixed; width: 100%; z-index: 999">
          <div class="container-fluid">
            <img src ="../img/logo.png" style="width: 28px; height: 25px;">
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="navbar-brand" style="color: white">ISFODOSU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  
                </li>
                <li class="nav-item">
                  
                </li>
              </ul>
              <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0" style="color: white"> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a> </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Navbar -->

        <article style="padding-top: 100px">
          <form>
            <div class="row row-cols-1 row-cols-md-3 g-4">        
              <div class="col">
                <div class="card  shadow-custom  mb-5 bg-white rounded">
                  <div class="card-body"> 
                    <p class="text-center fw-bold mx-3 mb-0 TColor" style="text-size:50px"> Detalles del participante </p>
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b> Nombre completo: </b> <?php echo $usuario['nombre'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Servicio: </b> <?php echo $usuario['servicio'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Numero de Registro: </b> <?php echo $usuario['registro'];?></h3>
                            <br>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="d-flex flex-column ">
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b> Matricula o Cédula: </b> <?php echo $usuario['matricula'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Tipo de Préstamo: </b> <?php echo $usuario['tipoprestamo'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Título: </b> <?php echo $usuario['titulo'];?></h3>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="d-flex flex-column ">
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b> Rol: </b> <?php echo $usuario['rol'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Tipo de Material: </b> <?php echo $usuario['tipomaterial'];?></h3>
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b>Autor: </b> <?php echo $usuario['autor'];?></h3>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">
                            <br>
                            <h3 style= "font-family: Arial; font-size: 15px;"> <b> Responsable: </b> <?php echo $usuario['responsable'];?></h3>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                                            
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="d-flex flex-column ">
                            <br>
                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                              <button type="button" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="#000000">Anterior</button>
                            </a>
                          </div>
                        </div>
                                        
                      </div>
                    </div>
                                                               
                  </div>
                </div>
              </div>              
            </div>
          </form>
          
        </article>
        <div class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
          <!-- Copyright -->
          <div class="mb-3 mb-md-0 text-center">
            Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
          </div>
          <div class="mb-3 mb-md-0 text-center">
            ©2023. Todos los derechos reservados.
          </div>
          <!-- Copyright -->
        </div>
      </div>
    </div>
  </body>
</html>