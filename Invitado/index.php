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

 
<!-- Top content -->
<div class="top-content">
    <!-- Carousel -->
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
 
        <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
            <li data-target="#carousel-example" data-slide-to="3"></li>
        </ol>
 
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2017/10/17/16/10/fantasy-2861107_1280.jpg" class="d-block w-100" alt="slide-img-1">
                <div class="carousel-caption">
                    <h1>Carousel Fullscreen Template</h1>
                    <div class="carousel-caption-description">
                        <p>This is a free Fullscreen Carousel template made with the Bootstrap 4 framework.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides/slide-img-2.jpg" class="d-block w-100" alt="slide-img-2">
                <div class="carousel-caption">
                    <h3>Caption for Image 2</h3>
                    <div class="carousel-caption-description">
                        <p>This is the caption description text for image 2.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides/slide-img-3.jpg" class="d-block w-100" alt="slide-img-3">
                <div class="carousel-caption">
                    <h3>Caption for Image 3</h3>
                    <div class="carousel-caption-description">
                        <p>This is the caption description text for image 3.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slides/slide-img-4.jpg" class="d-block w-100" alt="slide-img-4">
                <div class="carousel-caption">
                    <h3>Caption for Image 4</h3>
                    <div class="carousel-caption-description">
                        <p>This is the caption description text for image 4.</p>
                    </div>
                </div>
            </div>
        </div>
 
        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End carousel -->
</div>


   





</div>

<style>
  .top-content {
    width: 100%;
    padding: 0;
}
 
.top-content .carousel-control-prev {
    border-bottom: 0;
}
 
.top-content .carousel-control-next {
    border-bottom: 0;
}
 
.top-content .carousel-caption {
    padding-bottom: 60px;
}
 
.top-content .carousel-caption h1 {
    padding-top: 60px;
    color: #fff;
}
 
.top-content .carousel-caption h3 {
    color: #fff;
}
 
.top-content .carousel-caption .carousel-caption-description {
    color: #fff;
    color: rgba(255, 255, 255, 0.8);
}
 
.top-content .carousel-indicators li {
    width: 16px;
    height: 16px;
    margin-left: 5px;
    margin-right: 5px;
    border-radius: 50%;
}
@media (max-width: 767px) {
 
 h1, h2 {
     font-size: 22px;
     line-height: 30px;
 }

 .top-content .carousel-caption {
     bottom: 20px;
 }

 .top-content .carousel-indicators {
     display: none;
 }

}

media (max-width: 575px) {

.top-content .carousel-caption {
     bottom: 0;
     padding-bottom: 20px;
 }

 .top-content .carousel-caption-description {
     display: none;
 }

 .top-content h1, 
 .top-content h2, 
 .top-content h3 {
     font-size: 18px;
 }

}
.top-content .carousel-item {
    height: 100vh;
    min-height: 400px;
}
 
.top-content .carousel-item img {
    height: 100%;
    object-fit: cover;
}
</style>




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