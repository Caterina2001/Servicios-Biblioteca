

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	

</head>

<body>
<form  action="_functions.php" method="POST">
<div id="login" >
        <div class="container-fluid h-custom">
            <div id="login-row" class="row d-flex justify-content-center align-items-center h-100">
                <div id="login-column" class="col-md-9 col-lg-6 col-xl-5">
                    <img src="Isfodosu.png" class="imagen">
                    <div id="login-box" class="col-md-12">
                        <br>
           
                   <br>
                   <div class="divider d-flex align-items-center my-4">
                      <p class="text-center fw-bold mx-3 mb-0">Iniciar Sesión</p>
                    </div>
                   <br>
                            <div class="form-outline mb-3">
                                <label for="correo">Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" class="css-input" required>
                            </div>
                            <div class="form-outline mb-3">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="css-input" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                        <label class="form-check-label" for="form2Example3">
                                            Remember me
                                        </label>
                                </div>
                                <a href="mailto:nahomi.nunez@isfodosu.edu.do?subject=Forgot%20Password"> Forgot password?</a>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                             <br>
                                <input type="submit"class="ColorB" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Ingresar">   
                            
                        </form>

                        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 colorCC text-white ">
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
            </div>
        </div>
    </div>
    </form>
</body>
</html>