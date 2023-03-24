<?php

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
    

    <title>Usuarios</title>
</head>

<body>

<div class="container is-fluid">
  


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

        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="../includes/excel.php" aria-hidden="true">Descargar archivo Excel</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class=" nav-item btn btn-secondary dropdown-toggle" type="link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #174379; border-color: #174379; color: #FFFFFF80; padding: 8px ">Informe</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="../views/informe.php">Todos</a>
              <a class="dropdown-item" href="../views/FEM/informe.php">FEM</a>
              <a class="dropdown-item" href="../views/EMH/informe.php">EMH</a>
              <a class="dropdown-item" href="../views/EPH/informe.php">EPH</a>
              <a class="dropdown-item" href="../views/JVM/informe.php">JVM</a>
              <a class="dropdown-item" href="../views/LNNM/informe.php">LNNM</a>
              <a class="dropdown-item" href="../views/UM/informe.php">UM</a>
            </div>
          </div>       
        </li>
          
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
        <li class="nav-item me-3 me-lg-0" style="color: white">  </li>

        <li class="nav-item me-3 me-lg-0">
        <a class="nav-link"> <?php echo $_SESSION['correo']; ?></a>
        </li>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
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

    <p class="text-center fw-bold mx-3 mb-0 TColor">Bienvenido Administrador</p>

    <br>


    <div>

      <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#create2">
        <span class="glyphicon glyphicon-plus"></span> Agregar nuevo usuario <i class="fa fa-plus"></i> </a></button>
      

    </div>



  <?php
$conexion=mysqli_connect("localhost","root","","r_user"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


  if (isset($_GET['busqueda']))
  {
    $where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
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
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                        
                        </tr>
                        </thead>
                        <tbody>

        <?php

$conexion=mysqli_connect("localhost","root","","r_user");               
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


<a class="btn bg-success" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit" style="color: white"></i> </a>


<a class="btn btn-danger btn-del" href="eliminar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-trash"></i></a>
</td>
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
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/user.js"></script>




   <?php include('../index2.php'); ?>
<!--   <?php include('../graficasola.php'); ?>
 -->

</html>