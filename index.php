<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="http://www.isfodosu.edu.do/images/logo-isfodosu-isotipo.png">
  </head>

  <body>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="img/LogoI.png" alt="logo" class="imagen">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="includes/_functions.php" method="POST" >
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 TColor">Iniciar Sesión</p>
            </div>
            <!-- Email input cambiar luego type a email-->
            <div class="form-outline mb-3">
              <input type="email" id="correo" class="css-input btn-block" name="correo" required placeholder="Correo Institucional" />
            </div>
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="password" class="css-input btn-block" required placeholder="Contraseña">
              <input type="hidden" name="accion" value="acceso_user">                    
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
              </div>
              <a href="./views/solicitud.php" style="color: #174379">Restablecer contraseña o crear nueva cuenta</a>                    
            </div>
            <br>
            <div class="d-flex justify-content-between align-items-center">
              <input type="submit"class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Iniciar Sesión"> 
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <br>
              <br>
              <br>
              <input type="button" onclick="window.location='invitado/index.php';" class="ColorB2 btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Acceder Como Invitado"> 
              </a>    
            </div>
          
            <?php
              if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
              {
                echo "<div style='color:red'> Usuario o contraseña incorrecta </div>";
              }
            ?>
                
          </form>
        </div>
      </div>
     
    
  </body>
  <div
    class=" navbar navbar-dark fixed-bottom" style="background-color: #174379; color: white; padding-top: 20px; padding-bottom:20px" >
   
    <div class="mb-3 mb-md-0 text-center">
      Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
    </div>
    <div class="mb-3 mb-md-0 text-center">
      ©2023. Todos los derechos reservados.
    </div>
    
  </div>
</html>