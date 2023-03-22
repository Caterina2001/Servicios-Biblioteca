<?php

session_start();
error_reporting(0);
require_once "../includes/_db.php";

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
 
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">
    <link rel="stylesheet" href="../css/informe.css">
    <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">

    



    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
    

    <title>Informe</title>
    
</head>

<body>

<div class="container is-fluid">


<div class="col-xs-12">
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Navbar brand -->
    <img src ="../includes/logo.png" style="width: 28px; height: 25px;">
    <a class="navbar-brand" style="color: white">ISFODOSU</a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="../includes/excel.php" aria-hidden="true">Descargar archivo Excel</a>
        </li>
      </ul>

      

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
        <li class="nav-item me-3 me-lg-0" style="color: white">  </li>

        <li class="nav-item me-3 me-lg-0">
        <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a>
        </li>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </li>

      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
  <br>
  <br>
  <br>
  <br>

    <p class="text-center fw-bold mx-3 mb-0 TColor">Informe de Participantes</p>
    <br>


  <?php
$conexion=mysqli_connect("localhost","root","","r_user");      

$diario = "SELECT COUNT(*) FROM participantes  WHERE fecha >= DATE(NOW())";
$semanal = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$mensual = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";
$cuatrimestre1 = "SELECT COUNT(*) FROM participantes WHERE fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$cuatrimestre2 = "SELECT COUNT(*) FROM participantes WHERE fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$cuatrimestre3 = "SELECT COUNT(*) FROM participantes WHERE fecha BETWEEN '2023-09-01' AND '2023-12-31';"; /* NITIDO */
$anual = "SELECT COUNT(*) FROM participantes WHERE fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";

///
$rolest = "SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'"; /* general */
$rolestdiario = "SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' AND fecha >= DATE(NOW())";
$rolestsemanal = "SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$rolestmensual = "SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";


///

$roldoc = "SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$roldocdiario = "SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' AND fecha >= DATE(NOW())";
$roldocsemanal = "SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$roldocmensual = "SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";

//

$roladm = "SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$roladmdiario = "SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' AND fecha >= DATE(NOW())";
$roladmsemanal = "SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$roladmmensual = "SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";

//
$rolext = "SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$rolextdiario = "SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' AND fecha >= DATE(NOW())";
$rolextsemanal = "SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$rolextmensual = "SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' AND fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";

//
$servestudio = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$servequipos = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$servcompu = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
$servfotoc = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' AND fecha > '2023-01-01 00:00:00'  AND fecha < '2024-01-01'";
///
$estcuatrimestre1="SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$estcuatrimestre2="SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$estcuatrimestre3="SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$doccuatrimestre1="SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' and  fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$doccuatrimestre2="SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$doccuatrimestre3="SELECT COUNT(*) FROM participantes WHERE rol = 'Docente' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$admcuatrimestre1="SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$admcuatrimestre2="SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$admcuatrimestre3="SELECT COUNT(*) FROM participantes WHERE rol = 'Administrativo' and  fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$extcuatrimestre1="SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$extcuatrimestre2="SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$extcuatrimestre3="SELECT COUNT(*) FROM participantes WHERE rol = 'Externo' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
///
///
$salaestcuatrimestre1="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$salaestcuatrimestre2="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$salaestcuatrimestre3="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$salaequicuatrimestre1="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and  fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$salaequicuatrimestre2="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$salaequicuatrimestre3="SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$compcuatrimestre1="SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$compcuatrimestre2="SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$compcuatrimestre3="SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and  fecha BETWEEN '2023-09-01' AND '2023-12-31';";
$fotocuatrimestre1="SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-01-01' AND '2023-04-31';"; 
$fotocuatrimestre2="SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-05-01' AND '2023-08-31';";
$fotocuatrimestre3="SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-09-01' AND '2023-12-31';";
///

///
$salaestmensual1 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-01-01' AND '2023-01-31';";
$salaestmensual2 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-02-01' AND '2023-02-28';";
$salaestmensual3 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-03-01' AND '2023-03-31';";
$salaestmensual4 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-04-01' AND '2023-04-30';";
$salaestmensual5 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-05-01' AND '2023-05-31';";
$salaestmensual6 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-06-01' AND '2023-06-30';";
$salaestmensual7 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-07-01' AND '2023-07-31';";
$salaestmensual8 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-08-01' AND '2023-08-31';";
$salaestmensual9 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-09-01' AND '2023-09-30';";
$salaestmensual10 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-10-01' AND '2023-10-31';";
$salaestmensual11 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-11-01' AND '2023-11-30';";
$salaestmensual12 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Estudio' and fecha BETWEEN '2023-12-01' AND '2023-12-31';";

$salaequimensual1 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-01-01' AND '2023-01-31';";
$salaequimensual2 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-02-01' AND '2023-02-28';";
$salaequimensual3 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-03-01' AND '2023-03-31';";
$salaequimensual4 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-04-01' AND '2023-04-30';";
$salaequimensual5 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-05-01' AND '2023-05-31';";
$salaequimensual6 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-06-01' AND '2023-06-30';";
$salaequimensual7 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-07-01' AND '2023-07-31';";
$salaequimensual8 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-08-01' AND '2023-08-31';";
$salaequimensual9 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-09-01' AND '2023-09-30';";
$salaequimensual10 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-10-01' AND '2023-10-31';";
$salaequimensual11 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-11-01' AND '2023-11-30';";
$salaequimensual12 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Sala de Equipos' and fecha BETWEEN '2023-12-01' AND '2023-12-31';";

$compmensual1 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-01-01' AND '2023-01-31';";
$compmensual2 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-02-01' AND '2023-02-28';";
$compmensual3 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-03-01' AND '2023-03-31';";
$compmensual4 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-04-01' AND '2023-04-30';";
$compmensual5 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-05-01' AND '2023-05-31';";
$compmensual6 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-06-01' AND '2023-06-30';";
$compmensual7 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-07-01' AND '2023-07-31';";
$compmensual8 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-08-01' AND '2023-08-31';";
$compmensual9 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-09-01' AND '2023-09-30';";
$compmensual10 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-10-01' AND '2023-10-31';";
$compmensual11 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-11-01' AND '2023-11-30';";
$compmensual12 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Computadoras' and fecha BETWEEN '2023-12-01' AND '2023-12-31';";

$fotomensual1 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-01-01' AND '2023-01-31';";
$fotomensual2 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-02-01' AND '2023-02-28';";
$fotomensual3 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-03-01' AND '2023-03-31';";
$fotomensual4 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-04-01' AND '2023-04-30';";
$fotomensual5 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-05-01' AND '2023-05-31';";
$fotomensual6 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-06-01' AND '2023-06-30';";
$fotomensual7 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-07-01' AND '2023-07-31';";
$fotomensual8 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-08-01' AND '2023-08-31';";
$fotomensual9 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-09-01' AND '2023-09-30';";
$fotomensual10 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-10-01' AND '2023-10-31';";
$fotomensual11 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-11-01' AND '2023-11-30';";
$fotomensual12 = "SELECT COUNT(*) FROM participantes WHERE servicio = 'Fotocopiadoras' and fecha BETWEEN '2023-12-01' AND '2023-12-31';";

///

$resultdia = mysqli_query($conexion, $diario);

if($resultdia) {
  $row = mysqli_fetch_row($resultdia);
  $countdiario = $row[0];
}
//
$resultsemana = mysqli_query($conexion, $semanal);

if($resultsemana) {
  $row = mysqli_fetch_row($resultsemana);
  $countsemanal = $row[0];
}
//
$resultmes = mysqli_query($conexion, $mensual);

if($resultmes) {
  $row = mysqli_fetch_row($resultmes);
  $countmensual = $row[0];
}
 
$resultano = mysqli_query($conexion, $anual);

if($resultano) {
  $row = mysqli_fetch_row($resultano);
  $countanual = $row[0];
}
$resultcuatri1 = mysqli_query($conexion, $cuatrimestre1);

if($resultcuatri1) {
  $row = mysqli_fetch_row($resultcuatri1);
  $countcuatri1 = $row[0];
}
$resultcuatri2 = mysqli_query($conexion, $cuatrimestre2);

if($resultcuatri2) {
  $row = mysqli_fetch_row($resultcuatri2);
  $countcuatri2 = $row[0];
}
$resultcuatri3 = mysqli_query($conexion, $cuatrimestre3);

if($resultcuatri3) {
  $row = mysqli_fetch_row($resultcuatri3);
  $countcuatri3 = $row[0];
}

//
//////////////////////////////////////////////////////docente, administarivo, estudiante y externp
//
///DIARIA
$resultrolestdiario = mysqli_query($conexion, $rolestdiario);
if($resultrolestdiario) {
  $row = mysqli_fetch_row($resultrolestdiario);
  $countrolestdiario = $row[0];
}
//
$resultroldocdiario= mysqli_query($conexion, $roldocdiario);
if($resultroldocdiario) {
  $row = mysqli_fetch_row($resultroldocdiario);
  $countroldocdiario = $row[0];
}
///
$resultroladmdiario = mysqli_query($conexion, $roladmdiario);
if($resultroladmdiario) {
  $row = mysqli_fetch_row($resultroladmdiario);
  $countroladmdiario = $row[0];
}
//
$resultrolextdiario = mysqli_query($conexion, $rolextdiario);
if($resultrolextdiario) {
  $row = mysqli_fetch_row($resultrolextdiario);
  $countrolextdiario = $row[0];
}

///SEMANAL
$resultrolestsemanal = mysqli_query($conexion, $rolestsemanal);
if($resultrolestsemanal) {
  $row = mysqli_fetch_row($resultrolestsemanal);
  $countrolestsemanal = $row[0];
}
//
$resultroldocsemanal = mysqli_query($conexion, $roldocsemanal);
if($resultroldocsemanal) {
  $row = mysqli_fetch_row($resultroldocsemanal);
  $countroldocsemanal = $row[0];
}
///
$resultroladmsemanal = mysqli_query($conexion, $roladmsemanal);
if($resultroladmsemanal) {
  $row = mysqli_fetch_row($resultroladmsemanal);
  $countroladmsemanal = $row[0];
}
//
$resultrolextsemanal = mysqli_query($conexion, $rolextsemanal);
if($resultrolextsemanal) {
  $row = mysqli_fetch_row($resultrolextsemanal);
  $countrolextsemanal = $row[0];
}
///


///MENSUAL
$resultrolestmensual = mysqli_query($conexion, $rolestmensual);
if($resultrolestmensual) {
  $row = mysqli_fetch_row($resultrolestmensual);
  $countrolestmensual = $row[0];
}
//
$resultroldocmensual = mysqli_query($conexion, $roldocmensual);
if($resultroldocmensual) {
  $row = mysqli_fetch_row($resultroldocmensual);
  $countroldocmensual = $row[0];
}
///
$resultroladmmensual = mysqli_query($conexion, $roladmmensual);
if($resultroladmmensual) {
  $row = mysqli_fetch_row($resultroladmmensual);
  $countroladmmensual = $row[0];
}
//
$resultrolextmensual = mysqli_query($conexion, $rolextmensual);
if($resultrolextmensual) {
  $row = mysqli_fetch_row($resultrolextmensual);
  $countrolextmensual = $row[0];
}
///
 

//GENERAL

$resultrolest = mysqli_query($conexion, $rolest);
if($resultrolest) {
  $row = mysqli_fetch_row($resultrolest);
  $countrolest = $row[0];
}
////
$resultroldoc = mysqli_query($conexion, $roldoc);

if($resultroldoc) {
  $row = mysqli_fetch_row($resultroldoc);
  $countroldoc = $row[0];
}
///
$resultroladm = mysqli_query($conexion, $roladm);

if($resultroladm) {
  $row = mysqli_fetch_row($resultroladm);
  $countroladm = $row[0];
}
////
$resultrolext = mysqli_query($conexion, $rolext);

if($resultrolext) {
  $row = mysqli_fetch_row($resultrolext);
  $countrolext = $row[0];
}

///SERVICIOS AL ANO
$resultservestudio = mysqli_query($conexion, $servestudio);
if($resultservestudio) {
  $row = mysqli_fetch_row($resultservestudio);
  $countservestudio = $row[0];
}
$resultservequipos = mysqli_query($conexion, $servequipos);
if($resultservequipos) {
  $row = mysqli_fetch_row($resultservequipos);
  $countservequipos = $row[0];
}
$resultservcompu = mysqli_query($conexion, $servcompu);
if($resultservcompu) {
  $row = mysqli_fetch_row($resultservcompu);
  $countservcompu = $row[0];
}
$resultservfotoc = mysqli_query($conexion, $servfotoc);
if($resultservfotoc) {
  $row = mysqli_fetch_row($resultservfotoc);
  $countservfotoc = $row[0];
}
////
////PARTICIPANTES POR CUATRIMESTRES
$resultestcuatrimestre1 = mysqli_query($conexion, $estcuatrimestre1);
if($resultestcuatrimestre1) {
  $row = mysqli_fetch_row($resultestcuatrimestre1);
  $countestcuatrimestre1 = $row[0];
}
$resultestcuatrimestre2 = mysqli_query($conexion, $estcuatrimestre2);
if($resultestcuatrimestre2) {
  $row = mysqli_fetch_row($resultestcuatrimestre2);
  $countestcuatrimestre2 = $row[0];
}
$resultestcuatrimestre3 = mysqli_query($conexion, $estcuatrimestre3);
if($resultestcuatrimestre3) {
  $row = mysqli_fetch_row($resultestcuatrimestre3);
  $countestcuatrimestre3 = $row[0];
}
//
$resultdoccuatrimestre1 = mysqli_query($conexion, $doccuatrimestre1);
if($resultdoccuatrimestre1) {
  $row = mysqli_fetch_row($resultdoccuatrimestre1);
  $countdoccuatrimestre1 = $row[0];
}
$resultdoccuatrimestre2 = mysqli_query($conexion, $doccuatrimestre2);
if($resultdoccuatrimestre2) {
  $row = mysqli_fetch_row($resultdoccuatrimestre2);
  $countdoccuatrimestre2 = $row[0];
}
$resultdoccuatrimestre3 = mysqli_query($conexion, $doccuatrimestre3);
if($resultdoccuatrimestre3) {
  $row = mysqli_fetch_row($resultdoccuatrimestre3);
  $countdoccuatrimestre3 = $row[0];
}
//
$resultadmcuatrimestre1 = mysqli_query($conexion, $admcuatrimestre1);
if($resultadmcuatrimestre1) {
  $row = mysqli_fetch_row($resultadmcuatrimestre1);
  $countadmcuatrimestre1 = $row[0];
}
$resultadmcuatrimestre2 = mysqli_query($conexion, $admcuatrimestre2);
if($resultadmcuatrimestre2) {
  $row = mysqli_fetch_row($resultadmcuatrimestre2);
  $countadmcuatrimestre2 = $row[0];
}
$resultadmcuatrimestre3 = mysqli_query($conexion, $admcuatrimestre3);
if($resultadmcuatrimestre3) {
  $row = mysqli_fetch_row($resultadmcuatrimestre3);
  $countadmcuatrimestre3 = $row[0];
}
//
$resultextcuatrimestre1 = mysqli_query($conexion, $extcuatrimestre1);
if($resultextcuatrimestre1) {
  $row = mysqli_fetch_row($resultextcuatrimestre1);
  $countextcuatrimestre1 = $row[0];
}
$resultextcuatrimestre2 = mysqli_query($conexion, $extcuatrimestre2);
if($resultextcuatrimestre2) {
  $row = mysqli_fetch_row($resultextcuatrimestre2);
  $countextcuatrimestre2 = $row[0];
}
$resultextcuatrimestre3 = mysqli_query($conexion, $extcuatrimestre3);
if($resultextcuatrimestre3) {
  $row = mysqli_fetch_row($resultextcuatrimestre3);
  $countextcuatrimestre3 = $row[0];
}
////
////SERVICIOS POR CUATRIMESTRES
$resultsalaestcuatrimestre1 = mysqli_query($conexion, $salaestcuatrimestre1);
if($resultsalaestcuatrimestre1) {
  $row = mysqli_fetch_row($resultsalaestcuatrimestre1);
  $countsalaestcuatrimestre1 = $row[0];
}
$resultsalaestcuatrimestre2 = mysqli_query($conexion, $salaestcuatrimestre2);
if($resultsalaestcuatrimestre2) {
  $row = mysqli_fetch_row($resultsalaestcuatrimestre2);
  $countsalaestcuatrimestre2 = $row[0];
}
$resultsalaestcuatrimestre3 = mysqli_query($conexion, $salaestcuatrimestre3);
if($resultsalaestcuatrimestre3) {
  $row = mysqli_fetch_row($resultsalaestcuatrimestre3);
  $countsalaestcuatrimestre3 = $row[0];
}
//
$resultsalaequicuatrimestre1 = mysqli_query($conexion, $salaequicuatrimestre1);
if($resultsalaequicuatrimestre1) {
  $row = mysqli_fetch_row($resultsalaequicuatrimestre1);
  $countsalaequicuatrimestre1 = $row[0];
}
$resultsalaequicuatrimestre2 = mysqli_query($conexion, $salaequicuatrimestre2);
if($resultsalaequicuatrimestre2) {
  $row = mysqli_fetch_row($resultsalaequicuatrimestre2);
  $countsalaequicuatrimestre2 = $row[0];
}
$resultsalaequicuatrimestre3 = mysqli_query($conexion, $salaequicuatrimestre3);
if($resultsalaequicuatrimestre3) {
  $row = mysqli_fetch_row($resultsalaequicuatrimestre3);
  $countsalaequicuatrimestre3 = $row[0];
}
//
$resultcompcuatrimestre1 = mysqli_query($conexion, $compcuatrimestre1);
if($resultcompcuatrimestre1) {
  $row = mysqli_fetch_row($resultcompcuatrimestre1);
  $countcompcuatrimestre1 = $row[0];
}
$resultcompcuatrimestre2 = mysqli_query($conexion, $compcuatrimestre2);
if($resultcompcuatrimestre2) {
  $row = mysqli_fetch_row($resultcompcuatrimestre2);
  $countcompcuatrimestre2 = $row[0];
}
$resultcompcuatrimestre3 = mysqli_query($conexion, $compcuatrimestre3);
if($resultcompcuatrimestre3) {
  $row = mysqli_fetch_row($resultcompcuatrimestre3);
  $countcompcuatrimestre3 = $row[0];
}
//
$resultfotocuatrimestre1 = mysqli_query($conexion, $fotocuatrimestre1);
if($resultfotocuatrimestre1) {
  $row = mysqli_fetch_row($resultfotocuatrimestre1);
  $countfotocuatrimestre1 = $row[0];
}
$resultfotocuatrimestre2 = mysqli_query($conexion, $fotocuatrimestre2);
if($resultfotocuatrimestre2) {
  $row = mysqli_fetch_row($resultfotocuatrimestre2);
  $countfotocuatrimestre2 = $row[0];
}
$resultfotocuatrimestre3 = mysqli_query($conexion, $fotocuatrimestre3);
if($resultfotocuatrimestre3) {
  $row = mysqli_fetch_row($resultfotocuatrimestre3);
  $countfotocuatrimestre3 = $row[0];
}

///SERVICIOS MENSUALES
///SERVICIOS MENSUALES SALA DE ESTUDIO
$resultsalaestmensual1 = mysqli_query($conexion, $salaestmensual1);
if($resultsalaestmensual1) {
  $row = mysqli_fetch_row($resultsalaestmensual1);
  $countsalaestmensual1 = $row[0];
}
$resultsalaestmensual2 = mysqli_query($conexion, $salaestmensual2);
if($resultsalaestmensual2) {
  $row = mysqli_fetch_row($resultsalaestmensual2);
  $countsalaestmensual2 = $row[0];
}
$resultsalaestmensual3 = mysqli_query($conexion, $salaestmensual3);
if($resultsalaestmensual3) {
  $row = mysqli_fetch_row($resultsalaestmensual3);
  $countsalaestmensual3 = $row[0];
}
$resultsalaestmensual4 = mysqli_query($conexion, $salaestmensual4);
if($resultsalaestmensual4) {
  $row = mysqli_fetch_row($resultsalaestmensual4);
  $countsalaestmensual4 = $row[0];
}
$resultsalaestmensual5 = mysqli_query($conexion, $salaestmensual5);
if($resultsalaestmensual5) {
  $row = mysqli_fetch_row($resultsalaestmensual5);
  $countsalaestmensual5 = $row[0];
}
$resultsalaestmensual6 = mysqli_query($conexion, $salaestmensual6);
if($resultsalaestmensual6) {
  $row = mysqli_fetch_row($resultsalaestmensual6);
  $countsalaestmensual6 = $row[0];
}
$resultsalaestmensual7 = mysqli_query($conexion, $salaestmensual7);
if($resultsalaestmensual7) {
  $row = mysqli_fetch_row($resultsalaestmensual7);
  $countsalaestmensual7 = $row[0];
}
$resultsalaestmensual8 = mysqli_query($conexion, $salaestmensual8);
if($resultsalaestmensual8) {
  $row = mysqli_fetch_row($resultsalaestmensual8);
  $countsalaestmensual8 = $row[0];
}
$resultsalaestmensual9 = mysqli_query($conexion, $salaestmensual9);
if($resultsalaestmensual9) {
  $row = mysqli_fetch_row($resultsalaestmensual9);
  $countsalaestmensual9 = $row[0];
}
$resultsalaestmensual10 = mysqli_query($conexion, $salaestmensual10);
if($resultsalaestmensual10) {
  $row = mysqli_fetch_row($resultsalaestmensual10);
  $countsalaestmensual10 = $row[0];
}
$resultsalaestmensual11 = mysqli_query($conexion, $salaestmensual11);
if($resultsalaestmensual11) {
  $row = mysqli_fetch_row($resultsalaestmensual11);
  $countsalaestmensual11 = $row[0];
}
$resultsalaestmensual12 = mysqli_query($conexion, $salaestmensual12);
if($resultsalaestmensual12) {
  $row = mysqli_fetch_row($resultsalaestmensual12);
  $countsalaestmensual12 = $row[0];
}

///SERVICIOS MENSUALES SALA DE EQUIPOS

$resultsalaequimensual1 = mysqli_query($conexion, $salaequimensual1);
if($resultsalaequimensual1) {
  $row = mysqli_fetch_row($resultsalaequimensual1);
  $countsalaequimensual1 = $row[0];
}
$resultsalaequimensual2 = mysqli_query($conexion, $salaequimensual2);
if($resultsalaequimensual2) {
  $row = mysqli_fetch_row($resultsalaequimensual2);
  $countsalaequimensual2 = $row[0];
}
$resultsalaequimensual3 = mysqli_query($conexion, $salaequimensual3);
if($resultsalaequimensual3) {
  $row = mysqli_fetch_row($resultsalaequimensual3);
  $countsalaequimensual3 = $row[0];
}
$resultsalaequimensual4 = mysqli_query($conexion, $salaequimensual4);
if($resultsalaequimensual4) {
  $row = mysqli_fetch_row($resultsalaequimensual4);
  $countsalaequimensual4 = $row[0];
}
$resultsalaequimensual5 = mysqli_query($conexion, $salaequimensual5);
if($resultsalaequimensual5) {
  $row = mysqli_fetch_row($resultsalaequimensual5);
  $countsalaequimensual5 = $row[0];
}
$resultsalaequimensual6 = mysqli_query($conexion, $salaequimensual6);
if($resultsalaequimensual6) {
  $row = mysqli_fetch_row($resultsalaequimensual6);
  $countsalaequimensual6 = $row[0];
}
$resultsalaequimensual7 = mysqli_query($conexion, $salaequimensual7);
if($resultsalaequimensual7) {
  $row = mysqli_fetch_row($resultsalaequimensual7);
  $countsalaequimensual7 = $row[0];
}
$resultsalaequimensual8 = mysqli_query($conexion, $salaequimensual8);
if($resultsalaequimensual8) {
  $row = mysqli_fetch_row($resultsalaequimensual8);
  $countsalaequimensual8 = $row[0];
}
$resultsalaequimensual9 = mysqli_query($conexion, $salaequimensual9);
if($resultsalaequimensual9) {
  $row = mysqli_fetch_row($resultsalaequimensual9);
  $countsalaequimensual9 = $row[0];
}
$resultsalaequimensual10 = mysqli_query($conexion, $salaequimensual10);
if($resultsalaequimensual10) {
  $row = mysqli_fetch_row($resultsalaequimensual10);
  $countsalaequimensual10 = $row[0];
}
$resultsalaequimensual11 = mysqli_query($conexion, $salaequimensual11);
if($resultsalaequimensual11) {
  $row = mysqli_fetch_row($resultsalaequimensual11);
  $countsalaequimensual11 = $row[0];
}
$resultsalaequimensual12 = mysqli_query($conexion, $salaequimensual12);
if($resultsalaequimensual12) {
  $row = mysqli_fetch_row($resultsalaequimensual12);
  $countsalaequimensual12 = $row[0];
}

///SERVICIOS MENSUALES COMPUTADORAS
$resultcompmensual1 = mysqli_query($conexion, $compmensual1);
if($resultcompmensual1) {
  $row = mysqli_fetch_row($resultcompmensual1);
  $countcompmensual1 = $row[0];
}
$resultcompmensual2 = mysqli_query($conexion, $compmensual2);
if($resultcompmensual2) {
  $row = mysqli_fetch_row($resultcompmensual2);
  $countcompmensual2 = $row[0];
}
$resultcompmensual3 = mysqli_query($conexion, $compmensual3);
if($resultcompmensual3) {
  $row = mysqli_fetch_row($resultcompmensual3);
  $countcompmensual3 = $row[0];
}
$resultcompmensual4 = mysqli_query($conexion, $compmensual4);
if($resultcompmensual4) {
  $row = mysqli_fetch_row($resultcompmensual4);
  $countcompmensual4 = $row[0];
}
$resultcompmensual5 = mysqli_query($conexion, $compmensual5);
if($resultcompmensual5) {
  $row = mysqli_fetch_row($resultcompmensual5);
  $countcompmensual5 = $row[0];
}
$resultcompmensual6 = mysqli_query($conexion, $compmensual6);
if($resultcompmensual6) {
  $row = mysqli_fetch_row($resultcompmensual6);
  $countcompmensual6 = $row[0];
}
$resultcompmensual7 = mysqli_query($conexion, $compmensual7);
if($resultcompmensual7) {
  $row = mysqli_fetch_row($resultcompmensual7);
  $countcompmensual7 = $row[0];
}
$resultcompmensual8 = mysqli_query($conexion, $compmensual8);
if($resultcompmensual8) {
  $row = mysqli_fetch_row($resultcompmensual8);
  $countcompmensual8 = $row[0];
}
$resultcompmensual9 = mysqli_query($conexion, $compmensual9);
if($resultcompmensual9) {
  $row = mysqli_fetch_row($resultcompmensual9);
  $countcompmensual9 = $row[0];
}
$resultcompmensual10 = mysqli_query($conexion, $compmensual10);
if($resultcompmensual10) {
  $row = mysqli_fetch_row($resultcompmensual10);
  $countcompmensual10 = $row[0];
}
$resultcompmensual11 = mysqli_query($conexion, $compmensual11);
if($resultcompmensual11) {
  $row = mysqli_fetch_row($resultcompmensual11);
  $countcompmensual11 = $row[0];
}
$resultcompmensual12 = mysqli_query($conexion, $compmensual12);
if($resultcompmensual12) {
  $row = mysqli_fetch_row($resultcompmensual12);
  $countcompmensual12 = $row[0];
}


///SERVICIOS MENSUALES FOTOCOPIADORA

$resultfotomensual1 = mysqli_query($conexion, $fotomensual1);
if($resultfotomensual1) {
  $row = mysqli_fetch_row($resultfotomensual1);
  $countfotomensual1 = $row[0];
}
$resultfotomensual2 = mysqli_query($conexion, $fotomensual2);
if($resultfotomensual2) {
  $row = mysqli_fetch_row($resultfotomensual2);
  $countfotomensual2 = $row[0];
}
$resultfotomensual3 = mysqli_query($conexion, $fotomensual3);
if($resultfotomensual3) {
  $row = mysqli_fetch_row($resultfotomensual3);
  $countfotomensual3 = $row[0];
}
$resultfotomensual4 = mysqli_query($conexion, $fotomensual4);
if($resultfotomensual4) {
  $row = mysqli_fetch_row($resultfotomensual4);
  $countfotomensual4 = $row[0];
}
$resultfotomensual5 = mysqli_query($conexion, $fotomensual5);
if($resultfotomensual5) {
  $row = mysqli_fetch_row($resultfotomensual5);
  $countfotomensual5 = $row[0];
}
$resultfotomensual6 = mysqli_query($conexion, $fotomensual6);
if($resultfotomensual6) {
  $row = mysqli_fetch_row($resultfotomensual6);
  $countfotomensual6 = $row[0];
}
$resultfotomensual7 = mysqli_query($conexion, $fotomensual7);
if($resultfotomensual7) {
  $row = mysqli_fetch_row($resultfotomensual7);
  $countfotomensual7 = $row[0];
}
$resultfotomensual8 = mysqli_query($conexion, $fotomensual8);
if($resultfotomensual8) {
  $row = mysqli_fetch_row($resultfotomensual8);
  $countfotomensual8 = $row[0];
}
$resultfotomensual9 = mysqli_query($conexion, $fotomensual9);
if($resultfotomensual9) {
  $row = mysqli_fetch_row($resultfotomensual9);
  $countfotomensual9 = $row[0];
}
$resultfotomensual10 = mysqli_query($conexion, $fotomensual10);
if($resultfotomensual10) {
  $row = mysqli_fetch_row($resultfotomensual10);
  $countfotomensual10 = $row[0];
}
$resultfotomensual11 = mysqli_query($conexion, $fotomensual11);
if($resultfotomensual11) {
  $row = mysqli_fetch_row($resultfotomensual11);
  $countfotomensual11 = $row[0];
}
$resultfotomensual12 = mysqli_query($conexion, $fotomensual12);
if($resultfotomensual12) {
  $row = mysqli_fetch_row($resultfotomensual12);
  $countfotomensual12 = $row[0];
}



?>



<div class="container">
    <div class="row align-self-start">
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countdiario ?> </h5>
                  <p class="card-text text-center"> Durante el último día </p>                
              </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countsemanal ?> </h5>
                  <p class="card-text text-center"> Durante la ultima semana </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countmensual ?> </h5>
                  <p class="card-text text-center"> Ultimo mes </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card ">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countanual ?> </h5>
                  <p class="card-text text-center"> Desde principio de año </p>
                </div>
            </div>
        </div>
    </div>
    
</div>


</form>

<div class="box">
  <div class="container">
    <div class="row">  
      <div class="col-lg-6 col-md-2 col-sm-2 col-xs-12">            
        <div class="box-part text-center">

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

              var data = google.visualization.arrayToDataTable([
           
                ['Task', 'Hours per Day'],   
                ['Estudiantes',     <?php echo $countrolestdiario ?> ],
                ['Docentes',      <?php echo $countroldocdiario ?>],
                ['Administrativos',      <?php echo $countroladmdiario ?>],
                ['Externos',      <?php echo $countrolextdiario ?>],
              ]);

              var options = {
                title: 'Participación diaria'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

              chart.draw(data, options);
            }

          </script>
          <div id="piechart1" style="width: 650px; height: 400px;"></div>                   
        </div>
      </div>   
      
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">       
        <div class="box-part text-center">

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Estudiantes',     <?php echo $countrolestsemanal ?> ],
                ['Docentes',      <?php echo $countroldocsemanal ?>],
                ['Administrativos',      <?php echo $countroladmsemanal ?>],
                ['Externos',      <?php echo $countrolextsemanal ?>],
              /*  ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7] */
              ]);

              var options = {
                title: 'Participación de la ultima semana'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

              chart.draw(data, options);
            }
          </script>
          <div id="piechart2" style="width: 650px; height: 400px;"></div>
        </div>
      </div>
    </div>   
  </div>       
</div>  
<!--     coment  -->    
<div class="box" style="padding-top:1px">
  <div class="container">
    <div class="row">     
      <div class="col-lg-6 col-md-2 col-sm-2 col-xs-12">        
        <div class="box-part text-center">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Estudiantes',     <?php echo $countrolestmensual ?> ],  
                ['Docentes',      <?php echo $countroldocmensual ?>],
                ['Administrativos',      <?php echo $countroladmmensual ?>],
                ['Externos',      <?php echo $countrolextmensual ?>],
              /*  ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7] */
              ]);

              var options = {
                title: 'Participación del ultimo mes'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

              chart.draw(data, options);
            }

          </script>
          <div id="piechart3" style="width: 650px; height: 400px;"></div>


                          
        </div>
      </div>   
        
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">     
        <div class="box-part text-center">

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Estudiantes',     <?php echo $countrolest ?> ],
                ['Docentes',      <?php echo $countroldoc ?>],
                ['Administrativos',      <?php echo $countroladm ?>],
                ['Externos',      <?php echo $countrolext ?>],
              /*  ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7] */
              ]);

              var options = {
                title: 'Participación anual'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

              chart.draw(data, options);
            }
          </script>
          <div id="piechart4" style="width: 650px; height: 400px;"></div>
        </div>
      </div>   
    </div>
  </div>  
</div>

<div class="container">
    <div class="row align-self-start">
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countcuatri1 ?> </h5>
                  <p class="card-text text-center"> Durante el 1er. cuatrimestre </p>                
              </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countcuatri2 ?> </h5>
                  <p class="card-text text-center"> Durante el 2do. cuatrimestre </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countcuatri3 ?> </h5>
                  <p class="card-text text-center"> Durante el 3er. cuatrimestre </p>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm">
            <div class="card ">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $countcuatri4 ?> </h5>
                  <p class="card-text text-center"> Durante el 4to. cuatrimestre</p>
                </div>
            </div>
        </div> -->
    </div>
    
</div>


<!-- coment-->
<div class="container">
  <div class="row align-self-start">
    <div class="col-sm">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
      <script type="text/javascript"> 
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() { 
          var data = google.visualization.arrayToDataTable([ 
            ['Cuatrimestres', 'Estudiante', 'Docente', 'Administrativo','Externo'], 
            ['1° Cuatrimestre', <?php echo $countestcuatrimestre1 ?>,<?php echo $countdoccuatrimestre1 ?>, <?php echo $countadmcuatrimestre1 ?>,<?php echo $countextcuatrimestre1 ?>], 
            ['2° Cuatrimestre', <?php echo $countestcuatrimestre2 ?>,<?php echo $countdoccuatrimestre2 ?>, <?php echo $countadmcuatrimestre2 ?>,<?php echo $countextcuatrimestre2 ?>], 
            ['3° Cuatrimestre', <?php echo $countestcuatrimestre3 ?>,<?php echo $countdoccuatrimestre3 ?>, <?php echo $countadmcuatrimestre3 ?>,<?php echo $countextcuatrimestre3 ?>]
          ]); 
          var options = {
              title:'Cantidad de Participantes por cuatrimestre'
          };
          var chart = new google.visualization.ColumnChart(document.getElementById('piechart5'));
          chart.draw(data, options);
        } 
      </script> 
      <div id="piechart5" style="width: 1100px; height: 500px;"></div>    
    </div>
  </div>   
</div>

<br>

<div class="container">
  <div class="row align-self-start">
    <div class="col-sm">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
      <script type="text/javascript"> 
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() { 
          var data = google.visualization.arrayToDataTable([ 
            ['Cuatrimestres', 'Sala de Estudio', 'Sala de Equipos', 'Computadoras','Fotocopiadora'], 
            ['1° Cuatrimestre', <?php echo $countsalaestcuatrimestre1 ?>,<?php echo $countsalaequicuatrimestre1 ?>, <?php echo $countcompcuatrimestre1?>,<?php echo $countfotocuatrimestre1 ?>], 
            ['2° Cuatrimestre', <?php echo $countsalaestcuatrimestre2 ?>,<?php echo $countsalaequicuatrimestre2 ?>, <?php echo $countcompcuatrimestre2?>,<?php echo $countfotocuatrimestre2 ?>], 
            ['3° Cuatrimestre', <?php echo $countsalaestcuatrimestre3 ?>,<?php echo $countsalaequicuatrimestre3 ?>, <?php echo $countcompcuatrimestre3?>,<?php echo $countfotocuatrimestre3 ?>]
          ]); 
          
          var options = {
            title:'Servicios mas utilizados por cuatrimestre',
            
          };
          var chart = new google.visualization.ColumnChart(document.getElementById('piechart6'));
          chart.draw(data, options); 
        } 
      </script> 
      <div id="piechart6" style="width: 1100px; height: 500px;"></div>
    </div>
  </div>   
</div>
<br>

<div class="container">
    <div class="row align-self-start">
        <div class="col-sm">


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [' ', 'Sala de Estudio', 'Sala de Equipos', 'Computadora', 'Fotocopiadora'],
          ['Enero', <?php echo $countsalaestmensual1 ?>,<?php echo $countsalaequimensual1 ?>, <?php echo $countcompmensual1?>,<?php echo $countfotomensual1 ?>],
          ['Febrero', <?php echo $countsalaestmensual2 ?>,<?php echo $countsalaequimensual2 ?>, <?php echo $countcompmensual2?>,<?php echo $countfotomensual2 ?>],
          ['Marzo', <?php echo $countsalaestmensual3?>,<?php echo $countsalaequimensual3 ?>, <?php echo $countcompmensual3?>,<?php echo $countfotomensual3 ?>],
          ['Abril', <?php echo $countsalaestmensual4 ?>,<?php echo $countsalaequimensual4 ?>, <?php echo $countcompmensual4?>,<?php echo $countfotomensual4 ?>],
          ['Mayo', <?php echo $countsalaestmensual5?>,<?php echo $countsalaequimensual5 ?>, <?php echo $countcompmensual5?>,<?php echo $countfotomensual5 ?>],
          ['Junio', <?php echo $countsalaestmensual6 ?>,<?php echo $countsalaequimensual6 ?>, <?php echo $countcompmensual6?>,<?php echo $countfotomensual6 ?>],
          ['Julio', <?php echo $countsalaestmensual7 ?>,<?php echo $countsalaequimensual7 ?>, <?php echo $countcompmensual7?>,<?php echo $countfotomensual7 ?>],
          ['Agosto', <?php echo $countsalaestmensual8 ?>,<?php echo $countsalaequimensual8 ?>, <?php echo $countcompmensual8?>,<?php echo $countfotomensual8 ?>],
          ['Septiembre', <?php echo $countsalaestmensual9 ?>,<?php echo $countsalaequimensual9 ?>, <?php echo $countcompmensual9?>,<?php echo $countfotomensual9 ?>],
          ['Octubre', <?php echo $countsalaestmensual10 ?>,<?php echo $countsalaequimensual10 ?>, <?php echo $countcompmensual10?>,<?php echo $countfotomensual10 ?>],
          ['Noviembre', <?php echo $countsalaestmensual11 ?>,<?php echo $countsalaequimensual11 ?>, <?php echo $countcompmensual1?>,<?php echo $countfotomensual1 ?>],
          ['Diciembre', <?php echo $countsalaestmensual12 ?>,<?php echo $countsalaequimensual12 ?>, <?php echo $countcompmensual2?>,<?php echo $countfotomensual2 ?>]
        ]);

        var options = {
          chart: {
            title: 'Servicios mas utilizados mensualmente',
            subtitle: ' ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('ServiciosMensualmenteM'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="ServiciosMensualmenteM" style="width: 1150px; height: 500px;"></div>
    </div>
    </div>   
</div>
<br>
<br>
<br>
<br>
<br>

  
<!-- coment-->
 
 

</body>
<div
      class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
      <!-- Copyright -->
      <div class="mb-3 mb-md-0 text-center">
        Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
      </div>
      <div class="mb-3 mb-md-0 text-center">
        ©2023. Todos los derechos reservados.
      </div>
      <!-- Copyright -->

</div>


  <!-- <div id="paginador" class=""></div>-->
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/user.js"></script>




    <?php include('../index2.php'); ?>
</html>
