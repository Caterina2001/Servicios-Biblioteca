<?php
    require_once ("../includes/_db.php");
    $id= $_GET['id'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM participantes WHERE id= '$id'");

    header('Location: user.php');
