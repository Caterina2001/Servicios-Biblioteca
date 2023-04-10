<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];
$validar2 = $_SESSION2['rol'];
$nombre = $_SESSION3['nombre'];


if( $validar == null || $validar = '' /* || $validar2!='3'  */){

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
    <link rel="stylesheet" href="../../DataTables/css/dataTables.bootstrap4.min.css">
 
    <link rel="stylesheet" href="../../css/es.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/UserC.css">



    <script src="../../js/jquery.min.js"></script>

    <script src="../../js/resp/bootstrap.min.js"></script>
    

    <title>Registro Biblioteca </title>
</head>
<br>
<div class="container is-fluid">


<div class="container is-fluid">
  


<div class="col-xs-12">
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Navbar brand -->
    <img src ="../../includes/logo.png" style="width: 28px; height: 25px;">
    <a href="../JVM/registros.php" class="navbar-brand" style="color: white">ISFODOSU</a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="../JVM/excel.php" aria-hidden="true">Descargar archivo Excel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../JVM/informe.php" aria-hidden="true">Informe</a>
        </li>
    
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
        <li class="nav-item me-3 me-lg-0" style="color: white">  </li>

        <li class="nav-item me-3 me-lg-0">
        <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a>
        </li>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="../../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
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

    <p class="text-center fw-bold mx-3 mb-0 TColor">Bienvenido Colaborador </p>

    <br>


    <div>
      <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#createjvm">
        <span class="glyphicon glyphicon-plus"></span> Agregar nuevo registro &nbsp <i class="fa fa-plus"></i> </a></button>

        
    </div>

  <?php
$conexion=mysqli_connect("localhost","root","","r_user"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


  if (isset($_GET['busqueda']))
  {
    $where="WHERE participantes.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
  }
  
}

?>

      </form>

  <br>

<div class= table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
      <table class="table table-striped mb-0 table_id " id="table_id">

                   
                         <thead style="background-color: #174379;">    
                         <tr>
                        <th>Recinto</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Matricula</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
         
                        </tr>
                        </thead>
                        <tbody>

        <?php

$conexion=mysqli_connect("localhost","root","","r_user");               
$SQL=mysqli_query($conexion,"SELECT participantes.id, participantes.recinto, participantes.nombre, participantes.rol, participantes.matricula, participantes.servicio, participantes.fecha FROM participantes where  participantes.recinto = 'JVM' ");

    while($fila=mysqli_fetch_assoc($SQL)):
    
?>
<tr>
<td><?php echo $fila['recinto']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['rol']; ?></td>
<td><?php echo $fila['matricula']; ?></td>
<td><?php echo $fila['servicio']; ?></td>
<td><?php echo $fila['fecha']; ?></td>


</tr>


<?php endwhile;?>

  </table>
  </div>

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
<script src="../../package/dist/sweetalert2.all.js"></script>
<script src="../../package/dist/sweetalert2.all.min.js"></script>
<script src="../../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../../js/page.js"></script>
<script src="../../js/buscador.js"></script>
<script src="../../js/user.js"></script>




    <?php include('index.php'); ?>
</html>