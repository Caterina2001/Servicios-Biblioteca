<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html lang="en">
    
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">
    <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/resp/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Usuarios</title>
  </head>

  <body>
    <div class="container is-fluid">
      <div class="col-xs-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379; position: fixed; width: 100%; z-index: 999">
        <div class="container-fluid">
          <img src ="../img/logo.png" style="width: 28px; height: 25px;">
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
                    <a class="dropdown-item" href="../informes/excel_fem.php">FEM</a>
                    <a class="dropdown-item" href="../informes/excel_emh.php">EMH</a>
                    <a class="dropdown-item" href="../informes/excel_eph.php">EPH</a>
                    <a class="dropdown-item" href="../informes/excel_jvm.php">JVM</a>
                    <a class="dropdown-item" href="../informes/excel_lnnm.php">LNNM</a>
                    <a class="dropdown-item" href="../informes/excel_um.php">UM</a>
                  </div>
                </div> 
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a class=" nav-item btn btn-secondary dropdown-toggle" type="link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #174379; border-color: #174379; color: #FFFFFF80; padding: 8px ">Informe</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../invitado/informe.php">Informe General</a>
                    <a class="dropdown-item" href="informe.php">informe personalizado</a>
                  </div>
                </div> 
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
          <p class="text-center fw-bold mx-3 mb-0 TColor">Bienvenido Administrador</p>
          <div>
            <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#createuser">
              <span class="glyphicon glyphicon-plus"></span> Agregar nuevo usuario &nbsp <i class="fa fa-plus"></i> </a>
            </button>
          </div>
          <br>

          <?php
            $conexion=$GLOBALS['conex'];  
            $where="";
            if(isset($_GET['enviar'])){
              $busqueda = $_GET['busqueda'];
              if (isset($_GET['busqueda'])) {
                $where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
              }
            }
          ?>
          <div class= table-responsive table-scroll data-mdb-perfect-scrollbar="true" style="position: relative; height: 900px">
            <table class="table table-striped mb-0 table_id " id="table_id">
              <thead style="background-color: #174379;">    
                <tr>
                  <th>Recinto</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Password</th>
                  <th>Rol</th>
                  <th>Fecha</th>
                  <th>Acciones</th>    
                </tr>
              </thead>
              <tbody>
                <?php
                  $conexion=$GLOBALS['conex'];                
                  $SQL=mysqli_query($conexion,"SELECT user.id, user.recinto, user.nombre, user.correo, user.password, user.rol, user.fecha FROM user");
                  while($fila=mysqli_fetch_assoc($SQL)):
                ?>
                <tr>
                  <td><?php echo $fila['recinto']; ?></td>
                  <td><?php echo $fila['nombre']; ?></td>
                  <td><?php echo $fila['correo']; ?></td>
                  <td><?php echo $fila['password']; ?></td>
                  <td><?php echo $fila['rol']; ?></td>
                  <td><?php echo $fila['fecha']; ?></td>
                  <td>
                    <a class="btn bg-success" href="acciones/editar_user.php?id=<?php echo $fila['id']?> "> <i class="fa fa-edit" style="color: white"></i></a>
                    <a class="btn btn-danger btn-del" href="acciones/eliminar_user.php?id=<?php echo $fila['id']?> "> <i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php endwhile;?>
              </tbody>
            </table>
          </div>

          <?php
            $conexion=$GLOBALS['conex'];  
            $where="";
            if(isset($_GET['enviar'])){
              $busqueda = $_GET['busqueda'];
              if (isset($_GET['busqueda'])) {
                $where="WHERE participantes.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
              } 
            }
          ?>

          <div class= table-responsive table-scroll data-mdb-perfect-scrollbar="true" style="position: relative; height: 900px">
            <table class="table table-striped mb-0 table_id2" id="table_id2">
              <thead style="background-color: #174379;">    
                <tr>
                  <th>Recinto</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Matricula</th>
                  <th>Servicio</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $conexion=$GLOBALS['conex'];                
                  $SQL=mysqli_query($conexion,"SELECT participantes.id, participantes.recinto, participantes.nombre, participantes.rol, participantes.matricula, participantes.servicio, participantes.responsable,participantes.fecha FROM participantes");
                  while($fila=mysqli_fetch_assoc($SQL)):
                ?>
                <tr>
                  <td><?php echo $fila['recinto']; ?></td>
                  <td><?php echo $fila['nombre']; ?></td>
                  <td><?php echo $fila['rol']; ?></td>
                  <td><?php echo $fila['matricula']; ?></td>
                  <td><?php echo $fila['servicio']; ?></td>
                  <td><?php echo $fila['fecha']; ?></td>
                  <td>
                    <a class="btn" href="mostrar.php?id=<?php echo $fila['id']?> "> <i class="fa fa-eye"> </i></a> 
                    <a class="btn bg-success" href="acciones/editar_participantes.php?id=<?php echo $fila['id']?> "> <i class="fa fa-edit" style="color: white"></i></a>
                    <a class="btn btn-danger btn-del" href="acciones/eliminar_participantes.php?id=<?php echo $fila['id']?> "> <i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php endwhile;?>
              </tbody>
            </table>

          </div> 
          
        </article>

        <!-- Modal -->
        <div class="modal fade" id="createuser" tabindex="-1" aria-labelledby="createuserLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createuserLabel"> Añadir nuevo usuario </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>              
              </div>
              <div class="modal-body">
                <!-- Contenido del formulario para agregar un nuevo participante -->
                <form  action="" method="POST">
                  <div class="form-group">
                      <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                      <option value="" hidden selected >Recinto</option>
                          <option value="FEM">FEM</option>
                          <option value="JVM">JVM</option>
                          <option value="EMH">EMH</option>
                          <option value="EPH">EPH</option>
                          <option value="LNNM">LNNM</option>
                          <option value="UM">UM</option>
                      </select>
                  </div>
                  <br>

                  <div class="form-group">
                      <input type="text"  id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre Completo">
                  </div>
                  <br>
                  
                  <div class="form-group">
                      <input type="email" name="correo" id="correo" class="css-input btn-block" style= " display: block; width: 100%;" placeholder="Correo Institucional">
                  </div> 
                  <br>
                  
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="css-input btn-block" style= " display: block; width: 100%;" placeholder="Contraseña" required >
                  </div> 
                  <br>

                  <div class="form-group">
                      <select class="css-input btn-block" style= " display: block; width: 100%;" name="rol" id="rol"> 
                          <option value="" hidden selected >Seleccione rol</option>
                          <option value="1">Administrador</option>
                          <option value="2">Colaborador</option>
                      </select>
                  </div> 
                  <br>

                  <div class="mb-3">    
                      <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                      <a href="../user.php" class="btn btn-danger">Cancelar</a>  
                  </div>

              </form> 
              </div>
            </div>
          </div>
        </div>
        <script src="../package/dist/sweetalert2.all.js"></script>
        <script src="../package/dist/sweetalert2.all.min.js"></script>

        <script type="text/javascript">
            $(function(){
                $('#register').click(function(e){
                    var valid = this.form.checkValidity();
                    if(valid){
                        var recinto = $('#recinto').val();
                        var nombre = $('#nombre').val();
                        var correo = $('#correo').val();
                        var password = $('#password').val();
                        var rol = $('#rol').val();

                        e.preventDefault(); 

                        $.ajax({
                            type: 'POST',
                            url: '../includes/validar2.php',
                            data: {recinto: recinto, nombre: nombre, correo: correo, password: password, rol: rol },
                            success: function(data){
                                Swal.fire({
                                    'title': '¡Mensaje!',
                                    'text': data,
                                    'icon': 'success',
                                    'showConfirmButton': 'false',
                                    'timer': '1500'
                                }).then(function() {
                                    window.location = "user.php";
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
      </div>
    </div>
  </body>

  <script>
    $('.btn-del').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'Estas seguro de eliminar este usuario?',
        text: "¡No podrás revertir esto!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!', 
        cancelButtonText: 'Cancelar!', 
      }).then((result)=>{
        if(result.value){
          if (result.isConfirmed) {
            Swal.fire(
              'Eliminado!',
              'El usuario fue eliminado.',
              'success'
            )
          }
          document.location.href= href;
        }   
      })
    })
  </script>

  <!-- <div id="paginador" class=""></div>-->
  <script src="../package/dist/sweetalert2.all.js"></script>
  <script src="../package/dist/sweetalert2.all.min.js"></script>
  <script src="../package/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/page.js"></script>
  <script src="../js/buscador.js"></script>
  <script src="../js/user.js"></script>
  <script src="../js/user2.js"></script>

</html>