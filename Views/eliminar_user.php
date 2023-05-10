<?php

    $id= $_GET['id'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM user WHERE id= '$id'");

    header('Location: user.php');
