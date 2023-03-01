<?php

session_start();
error_reporting(0);

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


    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
    

    <title>Usuarios</title>
</head>
<br>
<div class="container is-fluid">


<div class="col-xs-12">
  		<h1>Bienvenido Administrador <?php echo $_SESSION['correo']; ?></h1>
      

		<h1>Informe</h1>
    <br>
  <!-- <p> Mostrar cantidad de <select name="sel" id="value"> 
        <option value="1">1 Registro</option>
        <option value="2">2 Registros</option>
        <option value="3">3 Registros</option>
    </select>
    <br>-->

		<div>

      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create2">
				<span class="glyphicon glyphicon-plus"></span> Nuevo user  <i class="fa fa-plus"></i> </a></button>

      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>

       <a class="btn btn-primary" href="../includes/excel.php">Excel
       <i class="fa fa-table" aria-hidden="true"></i>
       </a>

      
		</div>




  <?php
$conexion=mysqli_connect("localhost","root","","r_user");      

$diario = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)";
$semanal = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$mensual = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";
$anual = "SELECT COUNT(*) FROM participantes WHERE fecha > '2023-01-01 00:00:00';";


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


echo "<h1>El número de participantes durante el último día es: $countdiario</h1>";
echo "<h1>El número de participantes durante la ultima semana es: $countsemanal</h1>";
echo "<h1>El número de participantes durante en el ultimo mes es: $countmensual</h1>";
echo "<h1>El número de participantes desde principio de año: $countanual</h1>";







?>

   


			</form>
 

  <br>



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

