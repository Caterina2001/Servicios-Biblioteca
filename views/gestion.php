<?php
    session_start();
    if (isset($_SESSION['recinto'])) {
        $recinto = $_SESSION['recinto'];
    } else {
        echo "No se ha establecido el recinto para el usuario.";
    }

    $recintoSeleccionado = $_POST['recinto'] ?? "$recinto";
    $correo = $_SESSION['correo'];


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
    
    $Trimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $Trimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $Trimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");
    $Trimestre4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");

    $cantidadSalaEstudio1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $cantidadSalaLectura1= obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $cantidadComputadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $cantidadFotocopiadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");
    $cantidadPrestamo1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')");

    $cantidadSalaEstudio2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $cantidadSalaLectura2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $cantidadComputadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $cantidadFotocopiadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");
    $cantidadPrestamo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')");

    $cantidadSalaEstudio3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");
    $cantidadSalaLectura3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");
    $cantidadComputadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");
    $cantidadFotocopiadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");
    $cantidadPrestamo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')");

    $cantidadSalaEstudio4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadSalaLectura4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadComputadoras4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadFotocopiadoras4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");
    $cantidadPrestamo4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')");

    $cantidadEstudiante1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')", "Estudiante");
    $cantidadDocente1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')", "Docente");
    $cantidadAdministrativo1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')", "Administrativo");
    $cantidadExterno1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31')", "Externo");
    
    $cantidadEstudiante2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')", "Estudiante");
    $cantidadDocente2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')", "Docente");
    $cantidadAdministrativo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')", "Administrativo");
    $cantidadExterno2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30')", "Externo");

    $cantidadEstudiante3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')", "Estudiante");
    $cantidadDocente3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')", "Docente");
    $cantidadAdministrativo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')", "Administrativo");
    $cantidadExterno3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30')", "Externo");

    $cantidadEstudiante4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Estudiante");
    $cantidadDocente4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Docente");
    $cantidadAdministrativo4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Administrativo");
    $cantidadExterno4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31')", "Externo");

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

        <title>Gestión Personal</title>
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
                        <button class = "btn btn-secondary" onClick="window.print()"> Imprimir Gestión Personal </button>
                    </ul>

                    <ul class="navbar-nav d-flex flex-row me-1">   
                        <li class="nav-item me-3 me-lg-0"> <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a> </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <article style="padding-top: 100px">
            <p class="text-center fw-bold mx-3 mb-0 TColor"> Gestión Personal </p>
            <p class="text-center fw-bold mx-3 mb-0 TColor" style="font-size: 15px"><?php echo $recintoSeleccionado ?></p>
            <div class="container">
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $Trimestre1 ?></h5>
                            <p class="card-text text-center"> Durante el 1er. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadSalaEstudio1 ?></h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadSalaLectura1 ?> </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadComputadoras1 ?></h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadFotocopiadoras1 ?> </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPrestamo1 ?></h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadEstudiante1 ?></h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadDocente1 ?> </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadAdministrativo1 ?></h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadExterno1 ?> </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $Trimestre2 ?></h5>
                            <p class="card-text text-center"> Durante el 2do. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadSalaEstudio2 ?></h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadSalaLectura2 ?> </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadComputadoras2 ?></h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadFotocopiadoras2 ?> </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPrestamo2 ?></h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadEstudiante2 ?></h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadDocente2 ?> </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadAdministrativo2 ?></h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadExterno2 ?> </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $Trimestre3 ?></h5>
                            <p class="card-text text-center"> Durante el 3er. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadSalaEstudio3 ?></h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadSalaLectura3 ?> </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadComputadoras3 ?></h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadFotocopiadoras3 ?> </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPrestamo3 ?></h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadEstudiante3 ?></h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadDocente3 ?> </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadAdministrativo3 ?></h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadExterno3 ?> </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $Trimestre4 ?></h5>
                            <p class="card-text text-center"> Durante el 4to. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadSalaEstudio4 ?></h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadSalaLectura4 ?> </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadComputadoras4 ?></h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadFotocopiadoras4 ?> </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadPrestamo4 ?></h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadEstudiante4 ?></h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadDocente4 ?> </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"><?php echo $cantidadAdministrativo4 ?></h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center"> <?php echo $cantidadExterno4 ?> </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>

            </div>
        </article>
    </body>
</html>
