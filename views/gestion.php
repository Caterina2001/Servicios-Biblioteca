<?php
    session_start();
    if (isset($_SESSION['recinto'])) {
        $recinto = $_SESSION['recinto'];
    } else {
        echo "No se ha establecido el recinto para el usuario.";
    }
    $recintoSeleccionado = $_POST['recinto'] ?? "$recinto";


    $correo = $_SESSION['correo'];
    $mail = $_POST['correo'] ?? "$correo";


    require_once('../includes/_db.php');

    $conexion = $GLOBALS['conex']; 

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    function obtenerCantidadParticipantes($conexion, $recinto,  $categoria, $rol = null) {
        $rolCondition = ($rol !== null) ? "rol = '$rol' AND " : "";
        $query = "SELECT COUNT(*) AS cantidad FROM participantes WHERE recinto = '$recinto'  AND $rolCondition $categoria ";
        $result = $conexion->query($query);
        $row = $result->fetch_assoc();
        return $row["cantidad"];
    }
    
    $Trimestre1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");
    $Trimestre2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");
    $Trimestre3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");
    $Trimestre4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");

    $cantidadSalaEstudio1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");
    $cantidadSalaLectura1= obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");
    $cantidadComputadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");
    $cantidadFotocopiadoras1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");
    $cantidadPrestamo1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'");

    $cantidadSalaEstudio2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");
    $cantidadSalaLectura2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");
    $cantidadComputadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");
    $cantidadFotocopiadoras2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");
    $cantidadPrestamo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'");

    $cantidadSalaEstudio3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");
    $cantidadSalaLectura3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");
    $cantidadComputadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");
    $cantidadFotocopiadoras3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");
    $cantidadPrestamo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'");

    $cantidadSalaEstudio4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Estudio' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");
    $cantidadSalaLectura4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Sala de Lectura' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");
    $cantidadComputadoras4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Computadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");
    $cantidadFotocopiadoras4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Fotocopiadoras' AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");
    $cantidadPrestamo4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "servicio = 'Prestamo'AND DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'");

    $cantidadEstudiante1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'", "Estudiante", );
    $cantidadDocente1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'", "Docente");
    $cantidadAdministrativo1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'", "Administrativo");
    $cantidadExterno1 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-01-01') AND CONCAT(YEAR(CURDATE()), '-03-31') AND responsable = '$correo'", "Externo");
    
    $cantidadEstudiante2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'", "Estudiante");
    $cantidadDocente2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'", "Docente");
    $cantidadAdministrativo2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'", "Administrativo");
    $cantidadExterno2 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-04-01') AND CONCAT(YEAR(CURDATE()), '-06-30') AND responsable = '$correo'" , "Externo");

    $cantidadEstudiante3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'", "Estudiante");
    $cantidadDocente3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'", "Docente");
    $cantidadAdministrativo3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'", "Administrativo");
    $cantidadExterno3 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-07-01') AND CONCAT(YEAR(CURDATE()), '-09-30') AND responsable = '$correo'", "Externo");

    $cantidadEstudiante4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'", "Estudiante");
    $cantidadDocente4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'", "Docente");
    $cantidadAdministrativo4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'", "Administrativo");
    $cantidadExterno4 = obtenerCantidadParticipantes($conexion, $recintoSeleccionado, "DATE(fecha) BETWEEN CONCAT(YEAR(CURDATE()), '-10-01') AND CONCAT(YEAR(CURDATE()), '-12-31') AND responsable = '$correo'", "Externo");

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
            <p class="text-center fw-bold mx-3 mb-0 TColor" style="font-size: 15px"><?php echo $mail ?></p>
            <div class="container">
                <br>
                <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0 " >
                        <button class="btn btn-link tituloInforme no-hover-effect" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Informe del Primer Trimestre
                        </button>
                    </h5>
                    </div>

                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $Trimestre1;
                                    $Trimestre1F = number_format($Trimestre1);
                                    echo $Trimestre1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Registros totales durante el 1er. Trimestre del año </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title TColor text-center">
                            <?php $cantidadSalaEstudio1;
                                $cantidadSalaEstudio1F = number_format($cantidadSalaEstudio1);
                                echo $cantidadSalaEstudio1F
                            ?>
                        </h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title TColor text-center">
                            <?php $cantidadSalaLectura1;
                                $cantidadSalaLectura1F = number_format($cantidadSalaLectura1);
                                echo $cantidadSalaLectura1F
                            ?>
                        </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title TColor text-center">
                            <?php $cantidadComputadoras1;
                                $cantidadComputadoras1F = number_format($cantidadComputadoras1);
                                echo $cantidadComputadoras1F
                            ?>
                        </h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                        <h5 class="card-title TColor text-center">
                            <?php $cantidadFotocopiadoras1;
                                $cantidadFotocopiadoras1F = number_format($cantidadFotocopiadoras1);
                                echo $cantidadFotocopiadoras1F
                            ?>
                        </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadPrestamo1;
                                    $cantidadPrestamo1F = number_format($cantidadPrestamo1);
                                    echo $cantidadPrestamo1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>
                <p class="aa" ><span class = "bb">Subdivididos en </span></p>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadEstudiante1;
                                    $cantidadEstudiante1F = number_format($cantidadEstudiante1);
                                    echo $cantidadEstudiante1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadDocente1;
                                    $cantidadDocente1F = number_format($cantidadDocente1);
                                    echo $cantidadDocente1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadAdministrativo1;
                                    $cantidadAdministrativo1F = number_format($cantidadAdministrativo1);
                                    echo $cantidadAdministrativo1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadExterno1;
                                    $cantidadExterno1F = number_format($cantidadExterno1);
                                    echo $cantidadExterno1F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed tituloInforme no-hover-effect" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Informe del Segundo Trimestre
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $Trimestre2;
                                    $Trimestre2F = number_format($Trimestre2);
                                    echo $Trimestre2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Durante el 2do. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaEstudio2;
                                    $cantidadSalaEstudio2F = number_format($cantidadSalaEstudio2);
                                    echo $cantidadSalaEstudio2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaLectura2;
                                    $cantidadSalaLectura2F = number_format($cantidadSalaLectura2);
                                    echo $cantidadSalaLectura2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadComputadoras2;
                                    $cantidadComputadoras2F = number_format($cantidadComputadoras2);
                                    echo $cantidadComputadoras2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadFotocopiadoras2;
                                    $cantidadFotocopiadoras2F = number_format($cantidadFotocopiadoras2);
                                    echo $cantidadFotocopiadoras2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadPrestamo2;
                                    $cantidadPrestamo2F = number_format($cantidadPrestamo2);
                                    echo $cantidadPrestamo2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>
                <p class="aa" ><span class = "bb">Subdivididos en </span></p>
                <br>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadEstudiante2;
                                    $cantidadEstudiante2F = number_format($cantidadEstudiante2);
                                    echo $cantidadEstudiante2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadDocente2;
                                    $cantidadDocente2F = number_format($cantidadDocente2);
                                    echo $cantidadDocente2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadAdministrativo2;
                                    $cantidadAdministrativo2F = number_format($cantidadAdministrativo2);
                                    echo $cantidadAdministrativo2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadExterno2;
                                    $cantidadExterno2F = number_format($cantidadExterno2);
                                    echo $cantidadExterno2F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed tituloInforme no-hover-effect" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Informe del Tercer Trimestre
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $Trimestre3;
                                    $Trimestre3F = number_format($Trimestre3);
                                    echo $Trimestre3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Durante el 3er. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaEstudio3;
                                    $cantidadSalaEstudio3F = number_format($cantidadSalaEstudio3);
                                    echo $cantidadSalaEstudio3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaLectura3;
                                    $cantidadSalaLectura3F = number_format($cantidadSalaLectura3);
                                    echo $cantidadSalaLectura3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadComputadoras3;
                                    $cantidadComputadoras3F = number_format($cantidadComputadoras3);
                                    echo $cantidadComputadoras3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadFotocopiadoras3;
                                    $cantidadFotocopiadoras3F = number_format($cantidadFotocopiadoras3);
                                    echo $cantidadFotocopiadoras3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadPrestamo3;
                                    $cantidadPrestamo3F = number_format($cantidadPrestamo3);
                                    echo $cantidadPrestamo3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>
                <p class="aa" ><span class = "bb">Subdivididos en </span></p>
                <br>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadEstudiante3;
                                    $cantidadEstudiante3F = number_format($cantidadEstudiante3);
                                    echo $cantidadEstudiante3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadDocente3;
                                    $cantidadDocente3F = number_format($cantidadDocente3);
                                    echo $cantidadDocente3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadAdministrativo3;
                                    $cantidadAdministrativo3F = number_format($cantidadAdministrativo3);
                                    echo $cantidadAdministrativo3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadExterno3;
                                    $cantidadExterno3F = number_format($cantidadExterno3);
                                    echo $cantidadExterno3F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed tituloInforme no-hover-effect" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Informe del Cuarto Trimestre
                        </button>
                    </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $Trimestre4;
                                    $Trimestre4F = number_format($Trimestre4);
                                    echo $Trimestre4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Durante el 4to. Trimestre </p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaEstudio4;
                                    $cantidadSalaEstudio4F = number_format($cantidadSalaEstudio4);
                                    echo $cantidadSalaEstudio4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Estudio </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadSalaLectura4;
                                    $cantidadSalaLectura4F = number_format($cantidadSalaLectura4);
                                    echo $cantidadSalaLectura4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Sala de Lectura </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadComputadoras4;
                                    $cantidadComputadoras4F = number_format($cantidadComputadoras4);
                                    echo $cantidadComputadoras4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Computadoras </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadFotocopiadoras4;
                                    $cantidadFotocopiadoras4F = number_format($cantidadFotocopiadoras4);
                                    echo $cantidadFotocopiadoras4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Fotocopiadoras </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadPrestamo4;
                                    $cantidadPrestamo4F = number_format($cantidadPrestamo4);
                                    echo $cantidadPrestamo4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Prestamos </p>
                        </div>
                        </div>
                    </div>
                </div>
                <p class="aa"><span class = "bb">Subdivididos en </span></p>
                <br>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadEstudiante4;
                                    $cantidadEstudiante4F = number_format($cantidadEstudiante4);
                                    echo $cantidadEstudiante4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Estudiantes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadDocente4;
                                    $cantidadDocente4F = number_format($cantidadDocente4);
                                    echo $cantidadDocente4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Docentes </p>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadAdministrativo4;
                                    $cantidadAdministrativo4F = number_format($cantidadAdministrativo4);
                                    echo $cantidadAdministrativo4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Administrativos </p>
                        </div>
                        </div>
                    </div> 

                    <div class="col">
                        <div class="card h-30 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title TColor text-center">
                                <?php $cantidadExterno4;
                                    $cantidadExterno4F = number_format($cantidadExterno4);
                                    echo $cantidadExterno4F
                                ?>
                            </h5>
                            <p class="card-text text-center"> Externos </p>
                        </div>
                        </div>
                    </div>

                </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </article>
    </body>
</html>
