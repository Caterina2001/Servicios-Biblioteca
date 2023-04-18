<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];




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
    

    <title>Invitado</title>

    
</head>

<body>

<div >
  


<div class="col-xs-12">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
  <div class="container-fluid">

    <img src ="../includes/logo.png" style="width: 28px; height: 25px;">
    <a href="./user.php" class="navbar-brand" style="color: white">ISFODOSU</a>

    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
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
        <li class="nav-item">
          <div class="dropdown">
            <a class=" nav-item btn btn-secondary dropdown-toggle" type="link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #174379; border-color: #174379; color: #FFFFFF80; padding: 8px ">Informe</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="general.php">Todos</a>
              <a class="dropdown-item" href="653.php">FEM</a>
              <a class="dropdown-item" href="538.php">EMH</a>
              <a class="dropdown-item" href="518.php">EPH</a>
              <a class="dropdown-item" href="023.php">JVM</a>
              <a class="dropdown-item" href="243.php">LNNM</a>
              <a class="dropdown-item" href="213.php">UM</a>
            </div>
          </div>       
        </li>
          
      </ul>

      <ul class="navbar-nav d-flex flex-row me-1">
      

        
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="../includes/_sesion/cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </li>

      </ul>



    </div>
  </div>
</nav>

  <!-- <br>
  <br>
  <br> -->
<!--   <br>

    <p class="text-center fw-bold mx-3 mb-0 TColor">Bienvenido Invitado</p>

    <br> -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/10/17/16/10/fantasy-2861107_1280.jpg" height="100%" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>HOLAA</h5>
        <p>HOLAA</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/10/17/16/10/fantasy-2861107_1280.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/10/17/16/10/fantasy-2861107_1280.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  



   





</div>






</body>
<!-- <div
              class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
              <div class="mb-3 mb-md-0 text-center">
                Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
              </div>
              <div class="mb-3 mb-md-0 text-center">
                ©2023. Todos los derechos reservados.
              </div>

            </div>
   -->


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






   <?php include('../index2.php'); ?>


</html>
<script>
  $('.carousel').carousel({
  interval: 2000
})
</script>