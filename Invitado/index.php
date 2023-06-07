<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/resp/bootstrap.min.js"></script>
        <title>Invitado</title>
    </head>

    <body>
      <header style="position: fixed; width: 100%; z-index: 999">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #174379">
          <div class="container-fluid">
            <img src ="../includes/logo.png" style="width: 28px; height: 25px;">
            <a href="index.php" class="navbar-brand" style="color: white">ISFODOSU</a>
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
                        <a class="dropdown-item" href="fem.php">FEM</a>
                        <a class="dropdown-item" href="emh.php">EMH</a>
                        <a class="dropdown-item" href="eph.php">EPH</a>
                        <a class="dropdown-item" href="jvm.php">JVM</a>
                        <a class="dropdown-item" href="lnnm.php">LNNM</a>
                        <a class="dropdown-item" href="um.php">UM</a>
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
      </header>

      <article>
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
                <img src="img/fondo2.png" class="d-block w-100" alt="slide-img-1">
                <div class="carousel-caption">
                  <h1>Informes de Servicios en Bibliotecas de ISFODOSU</h1>
                  <div class="carousel-caption-description">
                    <p>Descubre los servicios más utilizados en nuestras bibliotecas y descarga los listados para cada uno de ellos, en nuestra vista de invitado del Sistema de Biblioteca.</p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <img src="img/fondo3.png" class="d-block w-100" alt="slide-img-2">
                <div class="carousel-caption">
                  <h3>Reportes en tiempo real de Sala de Lectura</h3>
                  <div class="carousel-caption-description">
                    <p>Obtén acceso a los informes de uso en tiempo real de la sala de lectura de cada recinto en ISFODOSU y optimiza tu experiencia de estudio.</p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <img src="img/fondo5.png" class="d-block w-100" alt="slide-img-3">
                <div class="carousel-caption">
                  <h3>Reportes en tiempo real de Sala de Equipos</h3>
                  <div class="carousel-caption-description">
                    <p>Únete a otros jóvenes en la sala de equipos y verifica el uso en tiempo real de las instalaciones para trabajar juntos de manera eficiente.</p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <img src="img/fondo4.png" class="d-block w-100" alt="slide-img-4">
                <div class="carousel-caption">
                  <h3>Monitoreo de Computadoras en Biblioteca</h3>
                  <div class="carousel-caption-description">
                    <p>Revisa el uso de las computadoras en nuestra biblioteca en cualquier momento y asegúrate de tener acceso a las herramientas que necesitas para completar tus tareas y proyectos.</p>
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

        @media (max-width: 575px) {
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
        
    </article>
  
  </body>

</html>

<script> $('.carousel').carousel({ interval: 2000 }) </script>