<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

    header("Location: ./includes/login.php");
    die();
    
    

}



?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros2</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">

    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        /* var options = {
          title: 'My Daily Activities',
          textStyle: {color: 'blue', fontSize: 56}
        }; */
        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
            fontSize: 14
          },
          'width':400,
                     'height':300
          /* legend: 'none' */
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script> 

    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['My all',     100],
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
            fontSize: 46
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
    </script> -->

</head>

<body id="page-top">


<div class="modal fade" id="create3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title TColor" id="exampleModalLabel">Añadir nuevo usuario </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <body>
                    <center>
<!--                     <div id="donut_single" style="width: 900px; height: 500px;"></div>
 -->                    <div id="piechart" style="width: 500px; height: 300px;"></div>

                    </center>
                     
                </body>

                
                


</html>