<?php

require_once ("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_general.xls");
?>
 

<table class="table table-striped table-dark " id= "table_id">

                   
<thead>    
<tr>
<th>Recinto</th>
<th>Nombre</th>
<th>Rol</th>
<th>Matricula</th>
<th>Servicio</th>
<th>Responsable</th>
<th>Fecha</th>

<!-- WHERE recinto = 'EMH'-->
</tr>
</thead>
<tbody>

<?php

$conexion=mysqli_connect("localhost","root","","r_user");               
$SQL="SELECT participantes.id, participantes.recinto, participantes.nombre, participantes.rol, participantes.matricula, participantes.servicio, participantes.responsable, participantes.fecha FROM participantes
";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['recinto']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['rol']; ?></td>
<td><?php echo $fila['matricula']; ?></td>
<td><?php echo $fila['servicio']; ?></td>
<td><?php echo $fila['responsable']; ?></td>
<td><?php echo $fila['fecha']; ?></td>




<?php
}

}
