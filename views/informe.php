<?php

function write_to_console($data) {
 $console = $data;
 if (is_array($console))
 $console = implode(',', $console);

 echo "<script>console.log('Console: " . $console . "' );</script>";
}
write_to_console("Hello World!");
write_to_console([1,2,3]);

?>

<?php

    session_start();
    if (isset($_SESSION['recinto'])) {
        $recinto = $_SESSION['recinto'];
    } else {
        echo "No se ha establecido el recinto para el usuario.";
    }

    $recintoSeleccionado = $_POST['recinto'] ?? "$recinto";
    require_once('../includes/_db.php');

    $conexion = $GLOBALS['conex']; 

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }


    function obtenerCantidadParticipantes($conexion, $recinto, $categoria, $rol = null) {
        $rolCondition = ($rol !== null) ? "rol = '$rol' AND " : "";
        $query = "SELECT COUNT(*) AS cantidad FROM participantes WHERE recinto = '$recinto' AND $rolCondition $categoria";
        $result = $conexion->query($query);
        $row = $result->fetch_assoc();
        return $row["cantidad"];
    }

    $cantidadPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()");
    $cantidadPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())");
    $cantidadPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE()) AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())");

    $rolestPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Estudiante");
    $rolestPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Estudiante");
    $rolestPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE()) AND YEAR(fecha) = YEAR(CURDATE())", "Estudiante" );
    $rolestPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Estudiante");

    $roldocPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Docente");
    $roldocPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Docente");
    $roldocPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE()) AND YEAR(fecha) = YEAR(CURDATE())", "Docente");
    $roldocPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Docente");

    $roladmPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Administrativo");
    $roladmPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Administrativo");
    $roladmPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE()) AND YEAR(fecha) = YEAR(CURDATE())", "Administrativo");
    $roladmPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Administrativo");

    $rolextPorDia = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) = CURDATE()", "Externo");
    $rolextPorSemana = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "WEEK(fecha) = WEEK(CURDATE())", "Externo");
    $rolextPorMes = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "MONTH(fecha) = MONTH(CURDATE()) AND YEAR(fecha) = YEAR(CURDATE())", "Externo");
    $rolextPorAnio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "YEAR(fecha) = YEAR(CURDATE())", "Externo");
    
    $cuatrimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");
    $cuatrimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cuatrimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");

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
    $cantidadTurnitin1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-04-31')");

    $cantidadSalaEstudio2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadSalaLectura2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadComputadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadFotocopiadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadPrestamo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");
    $cantidadTurnitin2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-05-01') AND CONCAT(YEAR(CURDATE()), '-08-31')");

    $cantidadSalaEstudio3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadSalaLectura3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadComputadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadFotocopiadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadPrestamo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadTurnitin3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-09-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");

    $cantidadSalaEstudioEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaEstudioDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");

    $cantidadSalaLecturaEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadSalaLecturaDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");

    $cantidadComputadorasEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadComputadorasDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");

    $cantidadFotocopiadorasEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadFotocopiadorasDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");

    $cantidadPrestamoEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadPrestamoDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");

    $cantidadTurnitinEnero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 1 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinFebrero = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 2 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinMarzo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 3 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinAbril = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 4 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinMayo = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 5 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinJunio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 6 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinJulio = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 7 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinAgosto = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 8 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinSeptiembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 9 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinOctubre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 10 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinNoviembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 11 AND YEAR(fecha) = YEAR(CURDATE())");
    $cantidadTurnitinDiciembre = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Turnitin' AND MONTH(fecha) = 12 AND YEAR(fecha) = YEAR(CURDATE())");


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
        <link rel="stylesheet" type="text/css"  href="../css/informepdf.css" media="print">
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
                <img src ="../img/logo.png" style="width: 28px; height: 25px;">
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="navbar-brand" style="color: white">ISFODOSU</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            <p class="text-center fw-bold mx-3 mb-0 TColor">Informe total de Participantes</p>
            <p class="text-center fw-bold mx-3 mb-0 TColor" style="font-size: 15px"><?php echo $recintoSeleccionado ?></p>
            <div class="container">
                <br>
                <div class=" row row-cols-1 row-cols-md-3 g-4" >
                    <div class="col ">
                        <div class="card h-90 shadow p-3 mb-5 bg-white rounded">
                        <div class="  card-body">
                            <h5 class="  card-title TColor text-center"> 
                                <?php $cantidadPorDia;
                                    $cantidadPorDiaF = number_format($cantidadPorDia);
                                    echo $cantidadPorDiaF
                                ?>
                            </h5> 
                            <p class="card-text text-center"> Último día </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-80 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> 
                                <?php $cantidadPorSemana;
                                    $cantidadPorSemanaF = number_format($cantidadPorSemana);
                                    echo $cantidadPorSemanaF
                                ?>
                            </h5> 
                            <p class="card-text text-center"> Última semana</p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-90 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> 
                                <?php $cantidadPorMes;
                                    $cantidadPorMesF = number_format($cantidadPorMes);
                                    echo $cantidadPorMesF
                                ?>
                            </h5> 
                            <p class="card-text text-center"> Último mes</p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title TColor text-center"> 
                                <?php $cantidadPorAnio;
                                    $cantidadPorAnioF = number_format($cantidadPorAnio);
                                    echo $cantidadPorAnioF
                                ?>
                            </h5> 
                                <p class="card-text text-center"> Total anual </p>
                            </div>
                        </div>
                    </div>             
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col"  id= "grafico">
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
                        <div id="piechart1" style="width: 500px; height: 300px;"></div>                   
                    </div>
                        
                    <div class="col" id= "grafico">
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
                        <div id="piechart2" style="width: 500px; height: 300px;"></div>
                    </div>

                    <div class="col" id= "grafico">
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
                        <div id="piechart3" style="width: 500px; height: 300px;"></div>                   
                    </div>
                        
                    <div class="col" id= "grafico">
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
                        <div id="piechart4" style="width: 500px; height: 300px;"></div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cuatrimestre1 ?></h5>
                            <p class="card-text text-center"> Durante el 1er. cuatrimestre </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cuatrimestre2 ?> </h5>
                            <p class="card-text text-center"> Durante el 2do. cuatrimestre </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
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
                            ['Cuatrimestres', 'Sala de Estudio', 'Sala de Lectura', 'Computadoras','Fotocopiadora', 'Prestamo','Turnitin'], 
                            ['1° Cuatrimestre', <?php echo $cantidadSalaEstudio1 ?>,<?php echo $cantidadSalaLectura1 ?>, <?php echo $cantidadComputadoras1 ?>, <?php echo $cantidadFotocopiadoras1?>,<?php echo $cantidadPrestamo1 ?>,<?php echo $cantidadTurnitin1 ?>], 
                            ['2° Cuatrimestre', <?php echo $cantidadSalaEstudio2 ?>,<?php echo $cantidadSalaLectura2 ?>, <?php echo $cantidadComputadoras2 ?>, <?php echo $cantidadFotocopiadoras2?>,<?php echo $cantidadPrestamo2 ?>,<?php echo $cantidadTurnitin2 ?>], 
                            ['3° Cuatrimestre', <?php echo $cantidadSalaEstudio3 ?>,<?php echo $cantidadSalaLectura3 ?>, <?php echo $cantidadComputadoras3 ?>, <?php echo $cantidadFotocopiadoras3?>,<?php echo $cantidadPrestamo3 ?>,<?php echo $cantidadTurnitin3 ?>]
                            ]); 
                            
                            var options = {
                            title:'Servicios mas utilizados por cuatrimestre', 
                            bar: {groupWidth: "75%"},
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
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Sala de Estudio", { role: "style" } ],
                            ["ENE", <?php echo $cantidadSalaEstudioEnero ?>, "color: #3366CC"],
                            ["FEB", <?php echo $cantidadSalaEstudioFebrero ?>, "#color: #3366CC"],
                            ["MAR", <?php echo $cantidadSalaEstudioMarzo ?>, "color: #3366CC"],
                            ["ABR", <?php echo $cantidadSalaEstudioAbril ?>, "color: #3366CC"],
                            ["MAY", <?php echo $cantidadSalaEstudioMayo?>, "color: #3366CC"],
                            ["JUN", <?php echo $cantidadSalaEstudioJunio ?>, "color: #3366CC"],
                            ["JUL", <?php echo $cantidadSalaEstudioJulio ?>, "color: #3366CC"],
                            ["AGO", <?php echo $cantidadSalaEstudioAgosto ?>, "color: #3366CC"],
                            ["SEP", <?php echo $cantidadSalaEstudioSeptiembre ?>, "color: #3366CC"],
                            ["OCT", <?php echo $cantidadSalaEstudioOctubre ?>, "color: #3366CC"],
                            ["NOV", <?php echo $cantidadSalaEstudioNoviembre ?>, "color: #3366CC"],
                            ["DIC", <?php echo $cantidadSalaEstudioDiciembre ?>, "color: #3366CC"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Sala de Estudio",
                            
                            
                            
                            legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart7"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart7" style="width: 1000px; height: 500px;"></div>
                    </div> 
                    <div class="col">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Sala de Estudio", { role: "style" } ],
                            ["ENE", <?php echo $cantidadSalaLecturaEnero ?>, "color: #dc3912"],
                            ["FEB", <?php echo $cantidadSalaLecturaFebrero ?>, "#color: #dc3912"],
                            ["MAR", <?php echo $cantidadSalaLecturaMarzo ?>, "color: #dc3912"],
                            ["ABR", <?php echo $cantidadSalaLecturaAbril ?>, "color: #dc3912"],
                            ["MAY", <?php echo $cantidadSalaLecturaMayo?>, "color: #dc3912"],
                            ["JUN", <?php echo $cantidadSalaLecturaJunio ?>, "color: #dc3912"],
                            ["JUL", <?php echo $cantidadSalaLecturaJulio ?>, "color: #dc3912"],
                            ["AGO", <?php echo $cantidadSalaLecturaAgosto ?>, "color: #dc3912"],
                            ["SEP", <?php echo $cantidadSalaLecturaSeptiembre ?>, "color: #dc3912"],
                            ["OCT", <?php echo $cantidadSalaLecturaOctubre ?>, "color: #dc3912"],
                            ["NOV", <?php echo $cantidadSalaLecturaNoviembre ?>, "color: #dc3912"],
                            ["DIC", <?php echo $cantidadSalaLecturaDiciembre ?>, "color: #dc3912"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Sala de Lectura",
                            
                            
                            legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart8"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart8" style="width: 1000px; height: 500px;"></div>
                    </div> 

                    <div class="col">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Computadoras", { role: "style" } ],
                            ["ENE", <?php echo $cantidadComputadorasEnero ?>, "color: #ff9900"],
                            ["FEB", <?php echo $cantidadComputadorasFebrero ?>, "#color: #ff9900"],
                            ["MAR", <?php echo $cantidadComputadorasMarzo ?>, "color: #ff9900"],
                            ["ABR", <?php echo $cantidadComputadorasAbril ?>, "color: #ff9900"],
                            ["MAY", <?php echo $cantidadComputadorasMayo ?>, "color: #ff9900"],
                            ["JUN", <?php echo $cantidadComputadorasJunio ?>, "color: #ff9900"],
                            ["JUL", <?php echo $cantidadComputadorasJulio ?>, "color: #ff9900"],
                            ["AGO", <?php echo $cantidadComputadorasAgosto ?>, "color: #ff9900"],
                            ["SEP", <?php echo $cantidadComputadorasSeptiembre ?>, "color: #ff9900"],
                            ["OCT", <?php echo $cantidadComputadorasOctubre ?>, "color: #ff9900"],
                            ["NOV", <?php echo $cantidadComputadorasNoviembre ?>, "color: #ff9900"],
                            ["DIC", <?php echo $cantidadComputadorasDiciembre ?>, "color: #ff9900"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Computadoras",
                            
                            
                            legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart9"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart9" style="width: 1000px; height: 500px;"></div>
                    </div> 

                    <div class="col">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Fotocopiadora", { role: "style" } ],
                            ["ENE", <?php echo $cantidadFotocopiadorasEnero ?>, "color: #109618"],
                            ["FEB", <?php echo $cantidadFotocopiadorasFebrero ?>, "#color: #109618"],
                            ["MAR", <?php echo $cantidadFotocopiadorasMarzo ?>, "color: #109618"],
                            ["ABR", <?php echo $cantidadFotocopiadorasAbril ?>, "color: #109618"],
                            ["MAY", <?php echo $cantidadFotocopiadorasMayo ?>, "color: #109618"],
                            ["JUN", <?php echo $cantidadFotocopiadorasJunio ?>, "color: #109618"],
                            ["JUL", <?php echo $cantidadFotocopiadorasJulio ?>, "color: #109618"],
                            ["AGO", <?php echo $cantidadFotocopiadorasAgosto ?>, "color: #109618"],
                            ["SEP", <?php echo $cantidadFotocopiadorasSeptiembre ?>, "color: #109618"],
                            ["OCT", <?php echo $cantidadFotocopiadorasOctubre ?>, "color: #109618"],
                            ["NOV", <?php echo $cantidadFotocopiadorasNoviembre ?>, "color: #109618"],
                            ["DIC", <?php echo $cantidadFotocopiadorasDiciembre ?>, "color: #109618"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Fotocopiadora",
                            
                            
                            legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart10"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart10" style="width: 1000px; height: 500px;"></div>
                    </div> 
                   
                    

                    <div class="col">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Prestamos", { role: "style" } ],
                            ["ENE", <?php echo $cantidadPrestamoEnero ?>, "color: #990099"],
                            ["FEB", <?php echo $cantidadPrestamoFebrero ?>, "#color: #990099"],
                            ["MAR", <?php echo $cantidadPrestamoMarzo ?>, "color: #990099"],
                            ["ABR", <?php echo $cantidadPrestamoAbril ?>, "color: #990099"],
                            ["MAY", <?php echo $cantidadPrestamoMayo ?>, "color: #990099"],
                            ["JUN", <?php echo $cantidadPrestamoJunio ?>, "color: #990099"],
                            ["JUL", <?php echo $cantidadPrestamoJulio ?>, "color: #990099"],
                            ["AGO", <?php echo $cantidadPrestamoAgosto ?>, "color: #990099"],
                            ["SEP", <?php echo $cantidadPrestamoSeptiembre ?>, "color: #990099"],
                            ["OCT", <?php echo $cantidadPrestamoOctubre ?>, "color: #990099"],
                            ["NOV", <?php echo $cantidadPrestamoNoviembre ?>, "color: #990099"],
                            ["DIC", <?php echo $cantidadPrestamoDiciembre ?>, "color: #990099"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Prestamos",

                            legend: { position: "none" },
                            
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart11"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart11" style="width: 1000px; height: 500px;"></div>
                    </div> 

                    <div class="col">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ["Mes", "Participantes en Prestamos", { role: "style" } ],
                            ["ENE", <?php echo $cantidadTurnitinEnero ?>, "color: #0099c6"],
                            ["FEB", <?php echo $cantidadTurnitinFebrero ?>, "#color: #0099c6"],
                            ["MAR", <?php echo $cantidadTurnitinMarzo ?>, "color: #0099c6"],
                            ["ABR", <?php echo $cantidadTurnitinAbril ?>, "color: #0099c6"],
                            ["MAY", <?php echo $cantidadTurnitinMayo ?>, "color: #0099c6"],
                            ["JUN", <?php echo $cantidadTurnitinJunio ?>, "color: #0099c6"],
                            ["JUL", <?php echo $cantidadTurnitinJulio ?>, "color: #0099c6"],
                            ["AGO", <?php echo $cantidadTurnitinAgosto ?>, "color: #0099c6"],
                            ["SEP", <?php echo $cantidadTurnitinSeptiembre ?>, "color: #0099c6"],
                            ["OCT", <?php echo $cantidadTurnitinOctubre ?>, "color: #0099c6"],
                            ["NOV", <?php echo $cantidadTurnitinNoviembre ?>, "color: #0099c6"],
                            ["DIC", <?php echo $cantidadTurnitinDiciembre ?>, "color: #0099c6"],
                            ]);
                        

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                            2]);

                            var options = {
                            title: "Uso de Turnitin",

                            legend: { position: "none" },
                            
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("piechart12"));
                            chart.draw(view, options);
                        }
                        </script>
                    <div id="piechart12" style="width: 1000px; height: 500px;"></div>
                    </div> 

                </div>
            </div>
        </article>
        <div class=" navbar   " style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
            <div class="mb-3 mb-md-0 text-center">
                Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
            </div>
            <div class="mb-3 mb-md-0 text-center">
                ©2023. Todos los derechos reservados.
            </div>
        </div>
    </body>
</html>
