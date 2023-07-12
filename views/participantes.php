<?php
session_start();
require_once('../includes/_db.php');

if (isset($_SESSION['recinto'])) {
    $recinto = $_SESSION['recinto'];
} else {
    echo "No se ha establecido el recinto para el usuario.";
}
$correo = $_SESSION['correo'];
$mail = $_POST['correo'] ?? "$correo";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/resp/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">
    <title>Registro Biblioteca</title>
  </head>

  <body>
    <div class="container is-fluid">
      <div class="col-xs-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379; position: fixed; width: 100%; z-index: 999">
          <div class="container-fluid">
            <img src ="../img/logo.png" style="width: 28px; height: 25px;">
            <a href="participantes.php" class="navbar-brand" style="color: white">ISFODOSU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="excel.php" aria-hidden="true">Descargar archivo Excel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="informe.php" aria-hidden="true">Informe</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gestion.php"> Gestión Personal </a>
                </li>
              </ul>
              <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0" style="color: white"> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a> </li>
                <li class="nav-item me-3 me-lg-0"> <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a> </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Navbar -->
        <article style="padding-top: 100px">
          <p class="text-center fw-bold mx-3 mb-0 TColor" style="text-size:50px">Bienvenido Colaborador </p>
          <div>
          <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#createparticipantes">
            <span class="glyphicon glyphicon-plus"></span> Agregar nuevo registro &nbsp;<i class="fa fa-plus"></i>
          </button>

          </div>
          <br>

          <?php
            $conexion=$GLOBALS['conex'];  
            $where="";
            if(isset($_GET['enviar'])){
              $busqueda = $_GET['busqueda'];
              if (isset($_GET['busqueda']))
              {
                $where="WHERE participantes.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
              }
            }
          ?>
          <div class= table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 900px">
            <table class="table table-striped mb-0 table_id " id="table_id">
              <thead style="background-color: #174379;">    
                <tr>
                  <th>Detalles</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Matricula</th>
                  <th>Servicio</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $conexion=$GLOBALS['conex']; 
                  $recinto = mysqli_real_escape_string($conexion, $recinto);
                  $SQL = mysqli_query($conexion, "SELECT participantes.id, participantes.recinto, participantes.nombre, participantes.rol, participantes.matricula, participantes.servicio, participantes.responsable, participantes.fecha FROM participantes WHERE participantes.recinto = '$recinto' AND responsable = '$correo'");               
                  while($fila=mysqli_fetch_assoc($SQL)):
                ?>
                <tr>
                  <td> 
                    <a class="btn" href="mostrar.php?id=<?php echo $fila['id']?> "> <i class="fa fa-eye"> </i></a> 
                  </td>                  
                  <td><?php echo $fila['nombre']; ?></td>
                  <td><?php echo $fila['rol']; ?></td>
                  <td><?php echo $fila['matricula']; ?></td>
                  <td><?php echo $fila['servicio']; ?></td>
                  <td><?php echo $fila['fecha']; ?></td>
                </tr>
                <?php endwhile;?>
              </tbody>
            </table>
          </div>
        </article>
        <!-- Modal -->
        <div class="modal fade" id="createparticipantes" tabindex="-1" aria-labelledby="createparticipantesLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createparticipantesLabel"> Registro de Participantes </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>              
              </div>
              <div class="modal-body">
                <!-- Contenido del formulario para agregar un nuevo participante -->

                <form  action="" method="POST">
                  <div class="row form-group ">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                              <option value="<?php echo $_SESSION['recinto']; ?>"  selected ><?php echo $_SESSION['recinto']; ?></option>                  
                          </select>
                      </div>
                      
                      <div class="col-xs-6 col-sm-6 col-md-6 ">
                          <input type="text" id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre">
                      </div>
                  </div>
                  <br>
                  <div class="row form-group ">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <select class="css-input btn-block" style= " display: block; width: 100%;" required name="rol" id="rol"> 
                              <option value="" hidden selected >Tipo de Usuario</option>
                              <option value="Estudiante">Estudiante</option>
                              <option value="Docente">Docente</option>
                              <option value="Administrativo">Administrativo</option>
                              <option value="Externo">Externo</option>
                          </select>
                      </div>
                      
                      <div class="col-xs-6 col-sm-6 col-md-6 ">
                          <input type="text" pattern="\d{9}|\d{11}" id="matricula" name="matricula btn-block" class="css-input" style= " display: block; width: 100%;" required placeholder="Matricula o Cedula">
                      </div>
                  </div>
                  <br>
                  <div class="row form-group ">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <select class="css-input btn-block" style= " display: block; width: 100%;" required name="servicio" id="servicio" > 
                              <option value="" hidden selected >Servicio</option>
                              <option value="Sala de Estudio">Sala de Estudio</option>
                              <option value="Sala de Lectura">Sala de Lectura</option>
                              <option value="Computadoras">Computadoras</option>
                              <option value="Fotocopiadoras">Fotocopiadoras</option>
                              <option value="Prestamo"> Préstamo de recursos no catalogados en KOHA </option>
                          </select>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <select class="css-input btn-block" style= " display: block; width: 100%;" name="tipoprestamo" id="tipoprestamo" disabled> 
                              <option value="No Aplica">Tipo de prestamo </option>
                              <option value="Prestamo a Domicilio"> Préstamo a Domicilio </option>
                              <option value="Prestamo en Sala"> Préstamo en Sala </option>
                              <option value="Prestamo de otros insumos">Préstamo de otros insumos</option>
                          </select>
                      </div>
                  </div>
                  <br>
                  <div class="row form-group ">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <select class="css-input btn-block" style= " display: block; width: 100%;" name="tipomaterial" id="tipomaterial" disabled> 
                              <option value="No Aplica">Tipo de material </option>
                              <option value="Libro"> Libro </option>
                              <option value="Folleto"> Folleto </option>
                              <option value="Material cartografico"> Material cartografico</option>
                              <option value="Publicacion periodica"> Publicación periódica</option>
                              <option value="Material audiovisual"> Material audiovisual </option>
                          </select>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 ">
                          <input type="text" id="registro" name="registro" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Numero de Registro">
                      </div>
                  </div>
                  <br>
                  <div class="row form-group ">
                      <div class="col-xs-6 col-sm-6 col-md-6 ">
                          <input type="text" id="titulo" name="titulo" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Titulo">
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 ">
                          <input type="text" id="autor" name="autor" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Autor">
                      </div>
                  </div>
                  <br>
                  <div class="form-group">
                      <select class="css-input btn-block" style= " display: block; width: 100%;"  name="responsable" required id="responsable"  > 
                          <option value="<?php echo $_SESSION['correo']; ?>"  selected ><?php echo $_SESSION['correo']; ?></option>
                      </select>
                  </div>
                  <div class="mb-3">       
                      <input type="submit" value="Guardar" id="register" class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;"  name="registrar">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#servicio').change(function (e) {
                if ($(this).val() === "Prestamo") {
                    $('#tipoprestamo').prop("disabled", false);
                    $('#tipomaterial').prop("disabled", false);
                    $('#registro').prop("disabled", false);
                    $('#titulo').prop("disabled", false);
                    $('#autor').prop("disabled", false);
                } else {
                    $('#tipoprestamo').prop("disabled", true);
                    $('#tipomaterial').prop("disabled", true);
                    $('#registro').prop("disabled", true);
                    $('#titulo').prop("disabled", true);
                    $('#autor').prop("disabled", true);
                }
                })
            });
        </script>

        <script src="../package/dist/sweetalert2.all.js"></script>
        <script src="../package/dist/sweetalert2.all.min.js"></script>

        <script type="text/javascript">
            $(function(){
                $('#register').click(function(e){
                    var valid = this.form.checkValidity();
                    if(valid){
                        var recinto = $('#recinto').val();
                        var nombre = $('#nombre').val();
                        var rol = $('#rol').val();
                        var matricula = $('#matricula').val();
                        var servicio = $('#servicio').val();
                        var responsable = $('#responsable').val();
                        var tipoprestamo = $('#tipoprestamo').val();
                        var tipomaterial = $('#tipomaterial').val();
                        var titulo = $('#titulo').val();
                        var registro = $('#registro').val();
                        var autor = $('#autor').val();

                        e.preventDefault();	
                        $.ajax({
                            type: 'POST',
                            url: '../includes/validar.php',
                            data: {recinto: recinto, nombre: nombre, rol: rol, matricula: matricula, servicio: servicio, responsable: responsable, tipoprestamo: tipoprestamo, tipomaterial: tipomaterial, autor: autor, titulo: titulo, registro: registro},
                            success: function(data){
                                Swal.fire({
                                    'title': '¡Mensaje!',
                                    'text': data,
                                    'icon': 'success',
                                    'showConfirmButton': 'false',
                                    'timer': '1500'
                                }).then(function() {
                                    window.location = "participantes.php";
                                });    
                            } ,       
                            error: function(data){
                                Swal.fire({
                                    'title': 'Error',
                                    'text': data,
                                    'icon': 'error'
                                })
                            }
                        });

                        
                    }else{
                        
                    }

                });		
            });
        </script>
        
      </div>
    </div>
    
    <div class=" navbar   " style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
      <div class="mb-3 mb-md-0 text-center">
        Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
      </div>
      <div class="mb-3 mb-md-0 text-center">
        ©2023. Todos los derechos reservados.
      </div>
    </div>

  </body>

  <script src="../package/dist/sweetalert2.all.js"></script>
  <script src="../package/dist/sweetalert2.all.min.js"></script>
  <script src="../package/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/page.js"></script>
  <script src="../js/buscador.js"></script>
  <script src="../js/user.js"></script>

</html>