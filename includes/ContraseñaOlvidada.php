<html>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>     
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="Isfodosu.png"
              class="imagen">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="Contrasena.php" method="POST" >
    
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 TColor2"> Restablecer contraseña o crear nueva cuenta</p>
              </div>
    
              <!-- Email input cambiar luego type a email-->
              <div class="form-outline mb-3">
                <input type="email" id="correo" class="css-input btn-block" name="correo" required placeholder="Correo Institucional" />
              </div>
              <div class="form-outline mb-3">
                <input type="text" id="mensaje" class="css-input btn-block" name="mensaje" required placeholder="Detallar si quiere crear una nueva cuenta o reestablecer la contraseña" />
              </div>
              <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                <div class="form-check mb-0">
                  
                  </div>
                <a href="login.php" style="color: #174379">Iniciar Sesión</a>
              </div>

              <br>
              <div class="d-flex justify-content-between align-items-center">
    
                  <input type="submit"class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Enviar correo"> 
              </div>            
    
            </form>
            
          </div>
          
        </div>
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



</html>