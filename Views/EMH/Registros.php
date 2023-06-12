<?php
require_once ("../../includes/_db.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/es.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/UserC.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/resp/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
    <title>Registro Biblioteca </title>

  </head>

  <body>
    <div class="container is-fluid">
      <div class="col-xs-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379; position: fixed; width: 100%; z-index: 999">
          <div class="container-fluid">
            <img src ="../../includes/logo.png" style="width: 28px; height: 25px;">
            <a href="Registros.php" class="navbar-brand" style="color: white">ISFODOSU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="excel.php" aria-hidden="true">Descargar archivo Excel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="informe.php" aria-hidden="true">Informe</a>
                </li>
              </ul>
              <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0" style="color: white"> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link" href="../../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a> </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Navbar -->
        <article style="padding-top: 80px">
          <p class="text-center fw-bold mx-3 mb-0 TColor" style="text-size:50px">Bienvenido Colaborador </p>
          <div>
            <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#createemh">
              <span class="glyphicon glyphicon-plus"></span> Agregar nuevo registro &nbsp<i class="fa fa-plus"></i> </a>
            </button>
          </div>
          <br>

          <?php
            $conexion=$GLOBALS['conex'];  
            $where="";
            if(isset($_GET['enviar'])){
              $busqueda = $_GET['busqueda'];
              if (isset($_GET['busqueda']))
              {
                $where="WHERE participantes.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
              }
            }
          ?>
          <div class= table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 750px">
            <table class="table table-striped mb-0 table_id " id="table_id">
              <thead style="background-color: #174379;">    
                <tr>
                  <th>Recinto</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Matricula</th>
                  <th>Servicio</th>
                  <th>Responsable</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $conexion=$GLOBALS['conex'];                
                  $SQL=mysqli_query($conexion,"SELECT participantes.id, participantes.recinto, participantes.nombre, participantes.rol, participantes.matricula, participantes.servicio, participantes.responsable, participantes.fecha FROM participantes where  participantes.recinto = 'EMH' ");
                  while($fila=mysqli_fetch_assoc($SQL)):
                ?>
                <tr>
                  <td><?php echo $fila['recinto']; ?></td>
                  <td><?php echo $fila['nombre']; ?></td>
                  <td><?php echo $fila['rol']; ?></td>
                  <td><?php echo $fila['matricula']; ?></td>
                  <td><?php echo $fila['servicio']; ?></td>
                  <td><?php echo $fila['responsable']; ?></td>
                  <td><?php echo $fila['fecha']; ?></td>
                </tr>
                <?php endwhile;?>
              </tbody>
            </table>
          </div>
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
  <!-- <div id="paginador" class=""></div>-->
  <script src="../../package/dist/sweetalert2.all.js"></script>
  <script src="../../package/dist/sweetalert2.all.min.js"></script>
  <script src="../../package/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../../DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../js/page.js"></script>
  <script src="../../js/buscador.js"></script>
  <script src="../../js/user.js"></script>
  <?php include('index.php'); ?>

</html>