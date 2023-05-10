<?php
$id = $_GET['id'];
$conexion=$GLOBALS['conex'];  
$query = mysqli_query($conexion,"DELETE FROM user WHERE id = '$id'");

header ('Location: prueba.php?m=1');