<?php
  require_once ("../../includes/_db.php");
  session_start();
  error_reporting(0);

  $validar = $_SESSION['correo'];

  if( $validar == null || $validar = ''){

      header("Location: ../../index.php");
      die(); 

  }


  $id= $_GET['id'];
  $conexion=$GLOBALS['conex'];  /* mysqli_connect("localhost", "root", "", "r_user"); */
  $consulta= "SELECT * FROM participantes WHERE id = $id";
  $resultado = mysqli_query($conexion, $consulta);
  $usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/es.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/UserC.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/resp/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>

  </head>

  <body id="page-top">
    <form  action="../../includes/_functions.php" method="POST">
      <div class="container is-fluid">
        <div class="col-xs-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379; position: fixed; width: 100%; z-index: 999">
            <div class="container-fluid">
              <img src ="../../img/logo.png" style="width: 28px; height: 25px;">
              <a href="../user.php" class="navbar-brand" style="color: white">ISFODOSU</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                  </li>
                  <li class="nav-item">
                  </li>
                </ul>
                <ul class="navbar-nav d-flex flex-row me-1">
                  <li class="nav-item me-3 me-lg-0" style="color: white"> </li>
                  <li class="nav-item me-3 me-lg-0"> <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a> </li>
                  <li class="nav-item me-3 me-lg-0"> <a class="nav-link" href="../../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a> </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Navbar -->
          <article style="padding-top: 80px">
            <div class="row row-cols-1 row-cols-md-3 g-4">        
              <div class="col">
                <div class="card  shadow-custom  mb-5 bg-white rounded">
                  <div class="card-body">

                    <p class="text-center fw-bold mx-3 mb-0 TColor">Editar Participantes</p>
                    <br>

                    <div class="container">
                      <div class="row">
                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">

                            <div class="form-group">
                              <label for="recinto" class="text-center fw-bold mx-3 mb-0 EditColor">Recinto:</label>
                            </div>

                            <div class="row align-self-start">
                              <select class="css-input-editar btn-block" name="recinto" id="recinto"> 
                                <?php
                                  $opciones = array(
                                    "FEM" => "FEM",
                                    "EPH" => "EPH",
                                    "EMH" => "EMH",
                                    "LNNM" => "LNNM",
                                    "UM" => "UM",
                                    "JVM" => "JVM"
                                  );
                                  foreach ($opciones as $valor => $texto) {
                                    $selected = ($valor == $usuario['recinto']) ? 'selected' : '';
                                    echo '<option value="' . $valor . '" ' . $selected . '>' . $texto . '</option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <br>

                            <div class="form-group">
                              <label for="rol" class="text-center fw-bold mx-3 mb-0 EditColor">Rol:</label>
                            </div>

                            <div class="row align-self-start">
                              <select class="css-input-editar btn-block" name="rol" id="rol"> 
                                <?php
                                  $opciones = array(
                                    "Estudiante" => "Estudiante",
                                    "Docente" => "Docente",
                                    "Administrativo" => "Administrativo",
                                    "Externo" => "Externo"
                                  );
                                  foreach ($opciones as $valor => $texto) {
                                    $selected = ($valor == $usuario['rol']) ? 'selected' : '';
                                    echo '<option value="' . $valor . '" ' . $selected . '>' . $texto . '</option>';
                                  }
                                ?>
                              </select>

                            </div>
                            <br>

                            <div class="form-group">
                              <label for="tipomaterial" class="text-center fw-bold mx-3 mb-0 EditColor">Tipo de Material:</label>
                            </div>
                            <div class="row align-self-start">
                              <select class="css-input-editar btn-block" name="tipomaterial" id="tipomaterial"> 
                                <?php
                                  $opciones = array(
                                    "No Aplica" => "No Aplica",
                                    "Libro" => "Libro",
                                    "Folleto" => "Folleto",
                                    "Material cartografico" => "Material cartografico",
                                    "Publicacion periodica" => "Publicacion periodica",
                                    "Material audiovisual" => "Material audiovisual"                                  );
                                  foreach ($opciones as $valor => $texto) {
                                    $selected = ($valor == $usuario['tipomaterial']) ? 'selected' : '';
                                    echo '<option value="' . $valor . '" ' . $selected . '>' . $texto . '</option>';
                                  }
                                ?>
                              </select>                 
                            </div>

                            <br>
                            <div class="form-group">
                              <label for="registro" class="text-center fw-bold mx-3 mb-0 EditColor">Numero de Registro:</label>
                            </div>

                            <div class="form-group">
                              <input type="text"  id="registro" name="registro" class="css-input-editar btn-block" value="<?php echo $usuario['registro'];?>">
                            </div>
                          </div>
                          <br>

                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="d-flex flex-column ">
                            <div class="form-group">
                            <label for="nombre" class="text-center fw-bold mx-3 mb-0 EditColor">Nombre completo:</label>
                            </div>

                            <div class="form-group">
                              <input type="text"  id="nombre" name="nombre" class="css-input-editar btn-block" value="<?php echo $usuario['nombre'];?>"required>
                            </div>

                            <div class="form-group">
                              <label for="servicio" class="text-center fw-bold mx-3 mb-0 EditColor">Servicio:</label>
                            </div>

                            <div class="row align-self-start">
                              <div class="col-sm">
                                <?php
                                $opciones = array(
                                  "Sala de Estudio" => "Sala de Estudio",
                                  "Sala de Lectura" => "Sala de Lectura",
                                  "Computadoras" => "Computadoras",
                                  "Fotocopiadora" => "Fotocopiadora",
                                  "Prestamo" => "Préstamo de recursos no catalogados en KOHA"
                                );

                                foreach ($opciones as $valor => $texto) {
                                  $checked = ($usuario['servicio'] == $valor) ? 'checked' : '';
                                  echo '
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="servicio" value="' . $valor . '" id="servicio-' . $valor . '" ' . $checked . '>
                                    <input type="hidden" name="accion" value="editar_participantes">
                                    <input type="hidden" name="id" value="' . $id . '">
                                    <label class="form-check-label" for="servicio-' . $valor . '">' . $texto . '</label>
                                  </div>';
                                }
                                ?>
                              </div>
                            </div>
                            
                            <br>
                            <div class="form-group">
                              <label for="autor" class="text-center fw-bold mx-3 mb-0 EditColor">Autor:</label>
                            </div>
                            <div class="form-group">
                              <input type="text"  id="autor" name="autor" class="css-input-editar btn-block" value="<?php echo $usuario['autor'];?>">
                            </div>

                            

                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="d-flex flex-column ">
                            <div class="form-group">
                              <label for="username" class="text-center fw-bold mx-3 mb-0 EditColor">Matricula o Cedula: </label><br>
                            </div>

                            <div class="form-group">
                              <input type="text" pattern="\d{9}|\d{11}" name="matricula" id="matricula" class="css-input-editar btn-block" placeholder="" value="<?php echo $usuario['matricula'];?>">
                            </div>

                            <div class="form-group">
                              <label for="prestamo" class="text-center fw-bold mx-3 mb-0 EditColor">Tipo de Prestamo:</label>
                            </div>

                            <div class="row align-self-start">
                              <select class="css-input-editar btn-block" name="tipoprestamo" id="tipoprestamo"> 
                                <?php
                                  $opciones = array(
                                    "No Aplica" => "No Aplica",
                                    "Prestamo a Domicilio" => "Préstamo a Domicilio",
                                    "Prestamo en Sala" => "Préstamo en Sala",
                                    "Prestamo de otros insumos" => "Préstamo de otros insumos"
                                  );
                                  foreach ($opciones as $valor => $texto) {
                                    $selected = ($valor == $usuario['tipoprestamo']) ? 'selected' : '';
                                    echo '<option value="' . $valor . '" ' . $selected . '>' . $texto . '</option>';
                                  }
                                ?>
                              </select>                
                            </div>
                            <br>

                            <div class="form-group">
                              <label for="titulo" class="text-center fw-bold mx-3 mb-0 EditColor">Título:</label>
                            </div>

                            <div class="form-group">
                              <input type="text"  id="titulo" name="titulo" class="css-input-editar btn-block" value="<?php echo $usuario['titulo'];?>">
                            </div>

                            <div class="form-group">
                              <label for="responsable" class="text-center fw-bold mx-3 mb-0 EditColor">Responsable:</label>
                            </div>
                            <div class="form-group">
                              <select class="css-input-editar btn-block"  name="responsable" value="editar_participantes" required id="responsable" disabled> 
                                <option value="<?php echo $usuario['responsable'];?>"  selected ><?php echo $usuario['responsable'];?></option>
                              </select> 
                            </div> 

                          </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">
                            <a href="../user.php" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="#000000" >Cancelar</a>           
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">
                                                 
                          </div>
                        </div>
                        <br>

                        <div class="col-lg-4 col-md-12">
                          <div class="d-flex flex-column ">
                            <button type="submit" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="#000000"  >Guardar</button>                 
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </form>
    <div class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
      <!-- Copyright -->
      <div class="mb-3 mb-md-0 text-center">
        Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
      </div>
      <div class="mb-3 mb-md-0 text-center">
        ©2023. Todos los derechos reservados.
      </div>
      <!-- Copyright -->
    </div>
  </body>
</html>