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
$trimestre1 = "SELECT COUNT(*) FROM participantes WHERE QUARTER(fecha) = 1 AND YEAR(fecha) = 2023;"; 
$trimestre2 = "SELECT COUNT(*) FROM participantes WHERE QUARTER(fecha) = 2 AND YEAR(fecha) = 2023;";
$trimestre3 = "SELECT COUNT(*) FROM participantes WHERE QUARTER(fecha) = 3 AND YEAR(fecha) = 2023;"; 
$trimestre4 = "SELECT COUNT(*) FROM participantes WHERE QUARTER(fecha) = 4 AND YEAR(fecha) = 2023;";/* EL FINAL */
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
$resulttri1 = mysqli_query($conexion, $trimestre1);

if($resulttri1) {
  $row = mysqli_fetch_row($resulttri1);
  $counttri1 = $row[0];
}
$resulttri2 = mysqli_query($conexion, $trimestre2);

if($resulttri2) {
  $row = mysqli_fetch_row($resulttri2);
  $counttri2 = $row[0];
}
$resulttri3 = mysqli_query($conexion, $trimestre3);

if($resulttri3) {
  $row = mysqli_fetch_row($resulttri3);
  $counttri3 = $row[0];
}
$resulttri4 = mysqli_query($conexion, $trimestre4);

if($resulttri4) {
  $row = mysqli_fetch_row($resulttri4);
  $counttri4 = $row[0];
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
<br>
<div class="container">
    <div class="row align-self-start">
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $counttri1 ?> </h5>
                  <p class="card-text text-center"> Durante el 1er. trimestre </p>                
              </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $counttri2 ?> </h5>
                  <p class="card-text text-center"> Durante el 2do. trimestre </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $counttri3 ?> </h5>
                  <p class="card-text text-center"> Durante el 3er. trimestre </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card ">
                <div class="card-body cardI">
                  <h5 class="card-title TColor text-center"> <?php echo $counttri4 ?> </h5>
                  <p class="card-text text-center"> Durante el 4to. trimestre</p>
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
         
          
         /*  ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7] */
        ]);

        var options = {
          title: 'Participación diaria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>
    <div id="piechart" style="width: 650px; height: 400px;"></div>


                        
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));

        chart.draw(data, options);
      }

    </script>
    <div id="piechart8" style="width: 650px; height: 400px;"></div>


                        
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart9'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart9" style="width: 650px; height: 400px;"></div>
           </div>
        </div>   

    
    

    </div>
</div>

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
