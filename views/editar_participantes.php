<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die(); 

}


$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "r_user");
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


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
 
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">

    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
</head>

<body id="page-top">


<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container is-fluid">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <div class="col-xs-12">
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Navbar brand -->
    <img src ="../includes/logo.png" style="width: 28px; height: 25px;">
    <a class="navbar-brand" style="color: white">ISFODOSU</a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        
          
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
        <li class="nav-item me-3 me-lg-0" style="color: white">  </li>

        <li class="nav-item me-3 me-lg-0">
        <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a>
        </li>
        
      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
  <br>
  <br>
  <br>
  <br>

    <p class="text-center fw-bold mx-3 mb-0 TColor">Editar Participantes</p>
                        
    <br>
    <div class="form-group">
      <label for="recinto" class="text-center fw-bold mx-3 mb-0 EditColor">Recinto:</label>
     </div>

     

    <div class="row align-self-start">
        <div class="col-sm">
          
              <div class="form-check">
                                   
                  <input class="form-check-input" type="radio" name="recinto" value="FEM" id="recinto" value="<?php echo $usuario['recinto'];?>">
                  <input type="hidden" name="accion" value="editar_participantes">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <label class="form-check-label" for="recinto"> FEM </label>
                  
          </div>
        </div>
        <div class="col-sm">
          <div class="form-check">
                                   
              <input class="form-check-input" type="radio" name="recinto" value="JVM" id="recinto" value="<?php echo $usuario['recinto'];?>">
              <input type="hidden" name="accion" value="editar_participantes">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <label class="form-check-label" for="recinto"> JVM </label>

      </div>
        </div>
        <div class="col-sm">
        <div class="form-check">
                                   
            <input class="form-check-input" type="radio" name="recinto" value="EMH" id="recinto" value="<?php echo $usuario['recinto'];?>">
            <input type="hidden" name="accion" value="editar_participantes">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label class="form-check-label" for="recinto"> EMH </label>
            
    </div>
    </div>
    
<br>
<div class="container">
    <div class="row align-self-start">
        <div class="col-sm">
        <div class="form-check">
                                   
                                   <input class="form-check-input" type="radio" name="recinto" value="EPH" id="recinto" value="<?php echo $usuario['recinto'];?>">
                                   <input type="hidden" name="accion" value="editar_participantes">
                                   <input type="hidden" name="id" value="<?php echo $id;?>">
                                   <label class="form-check-label" for="recinto"> EPH </label>
                                   
                           </div>
        </div>
        <div class="col-sm">
        <div class="form-check">
                                   
                                   <input class="form-check-input" type="radio" name="recinto" value="LNNM" id="recinto" value="<?php echo $usuario['recinto'];?>">
                                   <input type="hidden" name="accion" value="editar_participantes">
                                   <input type="hidden" name="id" value="<?php echo $id;?>">
                                   <label class="form-check-label" for="recinto"> LNNM </label>
                                   
                           </div>
        </div>
        <div class="col-sm">
        <div class="form-check">
                                   
                                   <input class="form-check-input" type="radio" name="recinto" value="UM" id="recinto" value="<?php echo $usuario['recinto'];?>">
                                   <input type="hidden" name="accion" value="editar_participantes">
                                   <input type="hidden" name="id" value="<?php echo $id;?>">
                                   <label class="form-check-label" for="recinto"> UM </label>
                                   
                           </div>
        </div>
    </div>
    
</div>
                      
                            <br></br>
                            <div class="form-group">
                            <label for="nombre" class="text-center fw-bold mx-3 mb-0 EditColor">Nombre completo:</label>
                            <input type="text"  id="nombre" name="nombre" class="css-input btn-block" value="<?php echo $usuario['nombre'];?>"required>
                            </div>

                            <div class="form-group">
                              <label for="rol" class="text-center fw-bold mx-3 mb-0 EditColor">Tipo de participante:</label>
                            </div>

     

                            <div class="row align-self-start">
                                <div class="col-sm">
                                  
                                      <div class="form-check">
                                                          
                                          <input class="form-check-input" type="radio" name="rol" value="Estudiante" id="rol" value="<?php echo $usuario['rol'];?>">
                                          <input type="hidden" name="accion" value="editar_participantes">
                                          <input type="hidden" name="id" value="<?php echo $id;?>">
                                          <label class="form-check-label" for="rol"> Estudiante </label>
                                          
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-check">
                                                          
                                      <input class="form-check-input" type="radio" name="rol" value="Docente" id="rol" value="<?php echo $usuario['rol'];?>">
                                      <input type="hidden" name="accion" value="editar_participantes">
                                      <input type="hidden" name="id" value="<?php echo $id;?>">
                                      <label class="form-check-label" for="rol"> Docente </label>

                              </div>
                                </div>
                                <div class="col-sm">
                                <div class="form-check">
                                                          
                                    <input class="form-check-input" type="radio" name="rol" value="Administrativo" id="rol" value="<?php echo $usuario['rol'];?>">
                                    <input type="hidden" name="accion" value="editar_participantes">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <label class="form-check-label" for="rol"> Administrativo </label>
                                    
                            </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-check">
                                                          
                                    <input class="form-check-input" type="radio" name="rol" value="Externo" id="rol" value="<?php echo $usuario['rol'];?>">
                                    <input type="hidden" name="accion" value="editar_participantes">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <label class="form-check-label" for="rol"> Externo </label>
                                    
                            </div>
                            </div>
                          </div>
                    
                            <div class="form-group">
                                <label for="username" class="text-center fw-bold mx-3 mb-0 EditColor">Matricula o Cedula: </label><br>
                                <input type="text" pattern="\d{9}|\d{11}" name="matricula" id="matricula" class="css-input btn-block" placeholder="" value="<?php echo $usuario['matricula'];?>">
                            </div>
                            
                            <div class="form-group">
                              <label for="servicio" class="text-center fw-bold mx-3 mb-0 EditColor">Servicio:</label>
                            </div>

     

                            <div class="row align-self-start">
                                <div class="col-sm">
                                  
                                      <div class="form-check">
                                                          
                                          <input class="form-check-input" type="radio" name="servicio" value="Sala de Estudio" id="servicio" value="<?php echo $usuario['servicio'];?>">
                                          <input type="hidden" name="accion" value="editar_participantes">
                                          <input type="hidden" name="id" value="<?php echo $id;?>">
                                          <label class="form-check-label" for="servicio">Sala de Estudio </label>
                                          
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-check">
                                                          
                                      <input class="form-check-input" type="radio" name="servicio" value="Sala de Lectura" id="servicio" value="<?php echo $usuario['servicio'];?>">
                                      <input type="hidden" name="accion" value="editar_participantes">
                                      <input type="hidden" name="id" value="<?php echo $id;?>">
                                      <label class="form-check-label" for="servicio"> Sala de Lectura </label>

                              </div>
                                </div>
                               
                          </div>
                          <div class="row align-self-start">
                          <div class="col-sm">
                                <div class="form-check">
                                                          
                                    <input class="form-check-input" type="radio" name="servicio" value="Computadoras" id="servicio" value="<?php echo $usuario['servicio'];?>">
                                    <input type="hidden" name="accion" value="editar_participantes">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <label class="form-check-label" for="servicio"> Computadoras </label>
                                    
                            </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-check">
                                                          
                                    <input class="form-check-input" type="radio" name="servicio" value="Fotocopiadoras" id="servicio" value="<?php echo $usuario['servicio'];?>">
                                    <input type="hidden" name="accion" value="editar_participantes">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <label class="form-check-label" for="servicio"> Fotocopiadoras </label>
                                    
                            </div>
                            </div>
                      </div>

                            
                            <br></br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Guardar</button>
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br></br>
    <br></br>


</body>
<div
              class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
              <!-- Copyright -->
              <div class="mb-3 mb-md-0 text-center">
                Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
              </div>
              <div class="mb-3 mb-md-0 text-center">
                ©2023. Todos los derechos reservados.
              </div>
              <!-- Copyright -->

            </div>
</html>