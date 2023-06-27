<?php
    $recintoSeleccionado = $_POST['recinto'] ?? "Todos";
    require_once('../includes/_db.php');

    $conexion = $GLOBALS['conex']; 

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if ($recintoSeleccionado == "Todos") {
        function obtenerCantidadParticipantes($conexion, $recinto, $categoria, $rol = null) {
            $rolCondition = ($rol !== null) ? "rol = '$rol' AND " : "";
            $query = "SELECT COUNT(*) AS cantidad FROM participantes WHERE $rolCondition $categoria";
            $result = $conexion->query($query);
            $row = $result->fetch_assoc();
            return $row["cantidad"];
        }
    }else{
        function obtenerCantidadParticipantes($conexion, $recinto, $categoria, $rol = null) {
            $rolCondition = ($rol !== null) ? "rol = '$rol' AND " : "";
            $query = "SELECT COUNT(*) AS cantidad FROM participantes WHERE recinto = '$recinto' AND $rolCondition $categoria";
            $result = $conexion->query($query);
            $row = $result->fetch_assoc();
            return $row["cantidad"];
        }
    }

    $cantidadPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()");
    $cantidadPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())");
    $cantidadPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE())");
    $cantidadPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())");

    $rolestPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Estudiante");
    $rolestPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Estudiante");
    $rolestPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE())", "Estudiante");
    $rolestPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Estudiante");

    $roldocPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Docente");
    $roldocPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Docente");
    $roldocPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE())", "Docente");
    $roldocPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Docente");

    $roladmPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Administrativo");
    $roladmPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Administrativo");
    $roladmPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE())", "Administrativo");
    $roladmPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Administrativo");

    $rolextPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Externo");
    $rolextPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Externo");
    $rolextPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE())", "Externo");
    $rolextPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Externo");
    
    $cuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $cuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $cuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");

    $rolestcuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')", "Estudiante");
    $rolestcuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')", "Estudiante");
    $rolestcuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Estudiante");

    $roldoccuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')", "Docente");
    $roldoccuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')", "Docente");
    $roldoccuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Docente");      

    $roladmcuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')", "Administrativo");
    $roladmcuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')", "Administrativo");
    $roladmcuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Administrativo");
    
    $rolextcuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')", "Externo");
    $rolextcuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')", "Externo");
    $rolextcuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Externo");


    $cantidadSalaEstudio1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");
    $cantidadSalaLectura1= obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");
    $cantidadComputadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");
    $cantidadFotocopiadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");
    $cantidadPrestamo1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");

    $cantidadSalaEstudio2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadSalaLectura2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadComputadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadFotocopiadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadPrestamo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");

    $cantidadSalaEstudio3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadSalaLectura3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadComputadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadFotocopiadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadPrestamo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");

    $cantidadSalaEstudioEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 1");
    $cantidadSalaEstudioFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 2");
    $cantidadSalaEstudioMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 3");
    $cantidadSalaEstudioAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 4");
    $cantidadSalaEstudioMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 5");
    $cantidadSalaEstudioJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 6");
    $cantidadSalaEstudioJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 7");
    $cantidadSalaEstudioAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 8");
    $cantidadSalaEstudioSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 9");
    $cantidadSalaEstudioOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 10");
    $cantidadSalaEstudioNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 11");
    $cantidadSalaEstudioDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 12");

    $cantidadSalaLecturaEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 1");
    $cantidadSalaLecturaFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 2");
    $cantidadSalaLecturaMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 3");
    $cantidadSalaLecturaAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 4");
    $cantidadSalaLecturaMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 5");
    $cantidadSalaLecturaJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 6");
    $cantidadSalaLecturaJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 7");
    $cantidadSalaLecturaAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 8");
    $cantidadSalaLecturaSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 9");
    $cantidadSalaLecturaOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 10");
    $cantidadSalaLecturaNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 11");
    $cantidadSalaLecturaDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 12");

    $cantidadComputadorasEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 1");
    $cantidadComputadorasFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 2");
    $cantidadComputadorasMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 3");
    $cantidadComputadorasAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 4");
    $cantidadComputadorasMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 5");
    $cantidadComputadorasJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 6");
    $cantidadComputadorasJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 7");
    $cantidadComputadorasAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 8");
    $cantidadComputadorasSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 9");
    $cantidadComputadorasOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 10");
    $cantidadComputadorasNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 11");
    $cantidadComputadorasDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 12");

    $cantidadFotocopiadorasEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 1");
    $cantidadFotocopiadorasFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 2");
    $cantidadFotocopiadorasMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 3");
    $cantidadFotocopiadorasAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 4");
    $cantidadFotocopiadorasMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 5");
    $cantidadFotocopiadorasJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 6");
    $cantidadFotocopiadorasJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 7");
    $cantidadFotocopiadorasAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 8");
    $cantidadFotocopiadorasSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 9");
    $cantidadFotocopiadorasOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 10");
    $cantidadFotocopiadorasNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 11");
    $cantidadFotocopiadorasDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 12");

    $cantidadPrestamoEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 1");
    $cantidadPrestamoFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 2");
    $cantidadPrestamoMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 3");
    $cantidadPrestamoAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 4");
    $cantidadPrestamoMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 5");
    $cantidadPrestamoJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 6");
    $cantidadPrestamoJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 7");
    $cantidadPrestamoAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 8");
    $cantidadPrestamoSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 9");
    $cantidadPrestamoOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 10");
    $cantidadPrestamoNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 11");
    $cantidadPrestamoDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 12");

    $conexion->close();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/es.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/UserC.css">
        <link rel="stylesheet" href="../css/informe.css">
        <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/resp/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>

        <title>Informe</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
            <div class="container-fluid">
                <img src ="../includes/logo.png" style="width: 28px; height: 25px;">
                <a href="user.php" class="navbar-brand" style="color: white">ISFODOSU</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class=" nav-item btn btn-secondary dropdown-toggle" type="link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #174379; border-color: #174379; color: #FFFFFF80; padding: 8px ">Descargar archivo Excel</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../includes/excel.php">General</a>
                                    <a class="dropdown-item" href="../views/FEM/excel.php">FEM</a>
                                    <a class="dropdown-item" href="../views/EMH/excel.php">EMH</a>
                                    <a class="dropdown-item" href="../views/EPH/excel.php">EPH</a>
                                    <a class="dropdown-item" href="../views/JVM/excel.php">JVM</a>
                                    <a class="dropdown-item" href="../views/LNNM/excel.php">LNNM</a>
                                    <a class="dropdown-item" href="../views/UM/excel.php">UM</a>
                                </div>
                            </div> 
                        </li>

                        <button class = "btn btn-secondary" onClick="window.print()"> Imprimir Informe </button>
                    </ul>

                    <ul class="navbar-nav d-flex flex-row me-1">   
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <article style="padding-top: 100px">
            <p class="text-center fw-bold mx-3 mb-0 TColor">Informe de Participantes</p>
            <p class="text-center fw-bold mx-3 mb-0 TColor" style="font-size: 15px"><?php echo $recintoSeleccionado ?></p>
            <div class="container">
                <form method="post">
                    <select name="recinto" class="css-input-editar btn-block" >
                        <option value="Todos" selected>Todos</option>
                        <option value="FEM">FEM</option>
                        <option value="EPH">EPH</option>
                        <option value="EMH">EMH</option>
                        <option value="JVM">JVM</option>
                        <option value="LNNM">LNNM</option>
                        <option value="UM">UM</option>
                    </select>
                    <br>
                    <input type="submit" value="Mostrar" class="btn btn-outline-primary btn-rounded">
                </form>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-90 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPorDia ?></h5>
                            <p class="card-text text-center"> Último día </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-80 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadPorSemana ?> </h5>
                            <p class="card-text text-center"> Última semana</p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-90 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPorMes ?></h5>
                            <p class="card-text text-center"> Último mes</p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title TColor text-center"><?php echo $cantidadPorAnio ?></h5>
                                <p class="card-text text-center"> Principio de año </p>
                            </div>
                        </div>
                    </div>             
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],   
                            ['Estudiantes',     <?php echo $rolestPorDia ?> ],
                            ['Docentes',      <?php echo $roldocPorDia ?>],
                            ['Administrativos',      <?php echo $roladmPorDia ?>],
                            ['Externos',      <?php echo $rolextPorDia ?>],
                            ]);
                            var options = {
                            title: 'Participación diaria'
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                            chart.draw(data, options);
                        }

                        </script>
                        <div id="piechart1" style="width: 450px; height: 250px;"></div>                   
                    </div>
                        
                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Estudiantes',     <?php echo $rolestPorSemana ?> ],
                            ['Docentes',      <?php echo $roldocPorSemana ?>],
                            ['Administrativos',      <?php echo $roladmPorSemana ?>],
                            ['Externos',      <?php echo $rolextPorSemana ?>]
                            ]);
                            var options = {
                            title: 'Participación de la ultima semana'
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="piechart2" style="width: 450px; height: 250px;"></div>
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Estudiantes',     <?php echo $rolestPorMes ?> ],  
                            ['Docentes',      <?php echo $roldocPorMes ?>],
                            ['Administrativos',      <?php echo $roladmPorMes ?>],
                            ['Externos',      <?php echo $rolextPorMes ?>]
                            ]);
                            var options = {
                            title: 'Participación del ultimo mes'
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="piechart3" style="width: 450px; height: 250px;"></div>                   
                    </div>
                        
                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Estudiantes',     <?php echo $rolestPorAnio ?> ],
                            ['Docentes',      <?php echo $roldocPorAnio ?>],
                            ['Administrativos',      <?php echo $roladmPorAnio ?>],
                            ['Externos',      <?php echo $rolextPorAnio ?>]
                            ]);
                            var options = {
                            title: 'Participación anual'
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="piechart4" style="width: 450px; height: 250px;"></div>
                    </div>

                    <div class="col">
                        <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cuatrimestre1 ?></h5>
                            <p class="card-text text-center"> Durante el 1er. cuatrimestre </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cuatrimestre2 ?> </h5>
                            <p class="card-text text-center"> Durante el 2do. cuatrimestre </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cuatrimestre3 ?></h5>
                            <p class="card-text text-center"> Durante el 3er. cuatrimestre </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
                        <script type="text/javascript"> 
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() { 
                            var data = google.visualization.arrayToDataTable([ 
                            ['Cuatrimestres', 'Estudiante', 'Docente', 'Administrativo','Externo'], 
                            ['1° Cuatrimestre', <?php echo $rolestcuatrimestre1 ?>, <?php echo $roldoccuatrimestre1 ?>, <?php echo $roladmcuatrimestre1 ?>, <?php echo $rolextcuatrimestre1 ?>], 
                            ['2° Cuatrimestre', <?php echo $rolestcuatrimestre2 ?>, <?php echo $roldoccuatrimestre2 ?>, <?php echo $roladmcuatrimestre2 ?>, <?php echo $rolextcuatrimestre2 ?>], 
                            ['3° Cuatrimestre', <?php echo $rolestcuatrimestre3 ?>, <?php echo $roldoccuatrimestre3 ?>, <?php echo $roladmcuatrimestre3 ?>, <?php echo $rolextcuatrimestre3 ?>]
                            ]); 
                            var options = {
                                title:'Cantidad de Participantes por cuatrimestre'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart5'));
                            chart.draw(data, options);
                        } 
                        </script> 
                        <div id="piechart5" style="width: 1000px; height: 500px;"></div>
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
                        <script type="text/javascript"> 
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() { 
                            var data = google.visualization.arrayToDataTable([ 
                            ['Cuatrimestres', 'Sala de Estudio', 'Sala de Lectura', 'Computadoras','Fotocopiadora', 'Prestamo'], 
                            ['1° Cuatrimestre', <?php echo $cantidadSalaEstudio1 ?>,<?php echo $cantidadSalaLectura1 ?>, <?php echo $cantidadComputadoras1 ?>, <?php echo $cantidadFotocopiadoras1?>,<?php echo $cantidadPrestamo1 ?>], 
                            ['2° Cuatrimestre', <?php echo $cantidadSalaEstudio2 ?>,<?php echo $cantidadSalaLectura2 ?>, <?php echo $cantidadComputadoras2 ?>, <?php echo $cantidadFotocopiadoras2?>,<?php echo $cantidadPrestamo2 ?>], 
                            ['3° Cuatrimestre', <?php echo $cantidadSalaEstudio3 ?>,<?php echo $cantidadSalaLectura3 ?>, <?php echo $cantidadComputadoras3 ?>, <?php echo $cantidadFotocopiadoras3?>,<?php echo $cantidadPrestamo3 ?>]
                            ]); 
                            var options = {
                            title:'Servicios mas utilizados por cuatrimestre', 
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart6'));
                            chart.draw(data, options); 
                        } 
                        </script> 
                        <div id="piechart6" style="width: 1000px; height: 500px;"></div>
                    </div>


                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            [' ', 'Sala de Estudio'],
                            ['ENE', <?php echo $cantidadSalaEstudioEnero ?>],
                            ['FEB', <?php echo $cantidadSalaEstudioFebrero ?>],
                            ['MAR', <?php echo $cantidadSalaEstudioMarzo?>],
                            ['ABR', <?php echo $cantidadSalaEstudioAbril ?>],
                            ['MAY', <?php echo $cantidadSalaEstudioMayo?>],
                            ['JUN', <?php echo $cantidadSalaEstudioJunio ?>],
                            ['JUL', <?php echo $cantidadSalaEstudioJulio ?>],
                            ['AGO', <?php echo $cantidadSalaEstudioAgosto ?>],
                            ['SEP', <?php echo $cantidadSalaEstudioSeptiembre ?>],
                            ['OCT', <?php echo $cantidadSalaEstudioOctubre ?>],
                            ['NOV', <?php echo $cantidadSalaEstudioNoviembre ?>],
                            ['DIC', <?php echo $cantidadSalaEstudioDiciembre ?>]
                            ]);
                            var options = {
                            title:'Sala de Estudio'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart7'));
                        chart.draw(data, options); 
                        }
                        </script>
                        <div id="piechart7" style="width: 1000px; height: 500px;">
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            [' ', 'Sala de Lectura'],
                            ['ENE', <?php echo $cantidadSalaLecturaEnero ?>],
                            ['FEB', <?php echo $cantidadSalaLecturaFebrero ?>],
                            ['MAR', <?php echo $cantidadSalaLecturaMarzo?>],
                            ['ABR', <?php echo $cantidadSalaLecturaAbril ?>],
                            ['MAY', <?php echo $cantidadSalaLecturaMayo?>],
                            ['JUN', <?php echo $cantidadSalaLecturaJunio?>],
                            ['JUL', <?php echo $cantidadSalaLecturaJulio ?>],
                            ['AGO', <?php echo $cantidadSalaLecturaAgosto ?>],
                            ['SEP', <?php echo $cantidadSalaLecturaSeptiembre ?>],
                            ['OCT', <?php echo $cantidadSalaLecturaOctubre ?>],
                            ['NOV', <?php echo $cantidadSalaLecturaNoviembre ?>],
                            ['DIC', <?php echo $cantidadSalaLecturaDiciembre ?>]
                            ]);
                            var options = {
                            title: 'Sala de Lectura'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart8'));
                        chart.draw(data, options); 
                        }
                        </script>
                        <div id="piechart8" style="width: 1000px; height: 500px;">
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            [' ', 'Computadoras'],
                            ['ENE', <?php echo $cantidadComputadorasEnero ?>],
                            ['FEB', <?php echo $cantidadComputadorasFebrero ?>],
                            ['MAR', <?php echo $cantidadComputadorasMarzo?>],
                            ['ABR', <?php echo $cantidadComputadorasAbril ?>],
                            ['MAY', <?php echo $cantidadComputadorasMayo?>],
                            ['JUN', <?php echo $cantidadComputadorasJunio?>],
                            ['JUL', <?php echo $cantidadComputadorasJulio ?>],
                            ['AGO', <?php echo $cantidadComputadorasAgosto ?>],
                            ['SEP', <?php echo $cantidadComputadorasSeptiembre ?>],
                            ['OCT', <?php echo $cantidadComputadorasOctubre ?>],
                            ['NOV', <?php echo $cantidadComputadorasNoviembre ?>],
                            ['DIC', <?php echo $cantidadComputadorasDiciembre ?>]
                            ]);
                            var options = {
                            title: 'Computadoras'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart9'));
                        chart.draw(data, options); 
                        }
                        </script>
                        <div id="piechart9" style="width: 1000px; height: 500px;">
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            [' ', 'Fotocopiadoras'],
                            ['ENE', <?php echo $cantidadFotocopiadorasEnero ?>],
                            ['FEB', <?php echo $cantidadFotocopiadorasFebrero ?>],
                            ['MAR', <?php echo $cantidadFotocopiadorasMarzo?>],
                            ['ABR', <?php echo $cantidadFotocopiadorasAbril ?>],
                            ['MAY', <?php echo $cantidadFotocopiadorasMayo?>],
                            ['JUN', <?php echo $cantidadFotocopiadorasJunio?>],
                            ['JUL', <?php echo $cantidadFotocopiadorasJulio ?>],
                            ['AGO', <?php echo $cantidadFotocopiadorasAgosto ?>],
                            ['SEP', <?php echo $cantidadFotocopiadorasSeptiembre ?>],
                            ['OCT', <?php echo $cantidadFotocopiadorasOctubre ?>],
                            ['NOV', <?php echo $cantidadFotocopiadorasNoviembre ?>],
                            ['DIC', <?php echo $cantidadFotocopiadorasDiciembre ?>]
                            ]);
                            var options = {
                            title: 'Fotocopiadoras'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart10'));
                        chart.draw(data, options); 
                        }
                        </script>
                        <div id="piechart10" style="width: 1000px; height: 500px;">
                    </div>

                    <div class="col">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            [' ', 'Prestamos'],
                            ['ENE', <?php echo $cantidadPrestamoEnero ?>],
                            ['FEB', <?php echo $cantidadPrestamoFebrero ?>],
                            ['MAR', <?php echo $cantidadPrestamoMarzo?>],
                            ['ABR', <?php echo $cantidadPrestamoAbril ?>],
                            ['MAY', <?php echo $cantidadPrestamoMayo?>],
                            ['JUN', <?php echo $cantidadPrestamoJunio?>],
                            ['JUL', <?php echo $cantidadPrestamoJulio ?>],
                            ['AGO', <?php echo $cantidadPrestamoAgosto ?>],
                            ['SEP', <?php echo $cantidadPrestamoSeptiembre ?>],
                            ['OCT', <?php echo $cantidadPrestamoOctubre ?>],
                            ['NOV', <?php echo $cantidadPrestamoNoviembre ?>],
                            ['DIC', <?php echo $cantidadPrestamoDiciembre ?>]
                            ]);
                            var options = {
                            title: 'Prestamos'
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById('piechart11'));
                        chart.draw(data, options); 
                        }
                        </script>
                        <div id="piechart11" style="width: 1000px; height: 500px;">
                    </div>
                </div>
            </div>
        </article>
    </body>
</html>
