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
                  <form action="_functions.php" method="POST" >
          
                    <div class="divider d-flex align-items-center my-4">
                      <p class="text-center fw-bold mx-3 mb-0 TColor">Iniciar Sesión</p>
                    </div>
          
                    <!-- Email input cambiar luego type a email-->
                    <div class="form-outline mb-3">
                      <input type="text" id="nombre" class="css-input btn-block" name="nombre" required placeholder="Correo Institucional" />
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
                      <a href="mailto:nahomi.nunez@isfodosu.edu.do?subject=Contraseña%20Olvidada" style="color: #174379"> Olvidé la contraseña</a>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">
          
                        <input type="submit"class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;  " value="Login"> 
                    </div>
                    
          
                  </form>
                </div>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 colorCC text-white ">
              <!-- Copyright -->
              <div class="mb-3 mb-md-0 text-center">
                Instituto Superior de Formación Docente Salomé Ureña | ISFODOSU
              </div>
              <div class="mb-3 mb-md-0 text-center">
                ©2023. Todos los derechos reservados.
              </div>
              <!-- Copyright -->

            </div>

    </body>



</html>