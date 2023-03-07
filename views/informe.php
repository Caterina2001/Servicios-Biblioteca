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

$diario = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)";
$semanal = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$mensual = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";
$trimestre1 = "SELECT COUNT(*) FROM participantes WHERE QUARTER(fecha) = 1 AND YEAR(fecha) = 2023;";  /* EL FINAL */
$anual = "SELECT COUNT(*) FROM participantes WHERE fecha > '2023-01-01 00:00:00';";

///
$rolest = "SELECT COUNT(*) FROM participantes WHERE rol = 'Estudiante'";
$rolcol = "SELECT COUNT(*) FROM participantes WHERE rol = 'Colaborador'";
$rolexte = "SELECT COUNT(*) FROM participantes WHERE rol = 'Externo'";



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
//
$resultano = mysqli_query($conexion, $anual);

if($resultano) {
  $row = mysqli_fetch_row($resultano);
  $countanual = $row[0];
}
$resultrolest = mysqli_query($conexion, $rolest);

if($resultrolest) {
  $row = mysqli_fetch_row($resultrolest);
  $countrolest = $row[0];
}
$resultrolcol = mysqli_query($conexion, $rolcol);

if($resultrolcol) {
  $row = mysqli_fetch_row($resultrolcol);
  $countrolcol = $row[0];
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

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Estudiantes',     <?php echo $countrolest ?> ],
          ['Colaborador',      <?php echo $countrolcol ?>],
         /*  ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7] */
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Estudiantes',     <?php echo $countrolest ?> ],
          ['Colaborador',      <?php echo $countrolcol ?>],
         /*  ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7] */
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>

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
////

