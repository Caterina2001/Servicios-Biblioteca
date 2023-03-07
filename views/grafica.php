<?php
require_once "../includes/_db.php";

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
          $SQL = "SELECT * FROM participantes";
          $consulta = mysqli_query($conexion, $SQL);
          $diario = "SELECT COUNT(*) FROM participantes WHERE fecha > DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)";

          while ($resultado = mysqli_fetch_assoc($consulta)){
            echo "['" .$resultado['servicio']."', " .$resultado['id']."],";
          }

?>
        ]);

        var options = {
          title: 'Mi Grafica de Barras'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
  </head>
  <body>
    
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
