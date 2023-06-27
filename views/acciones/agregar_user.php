<?php
session_start();
require_once('../../includes/_db.php');

if (isset($_SESSION['recinto'])) {
    $recinto = $_SESSION['recinto'];
    echo "Recinto: " . $recinto;
} else {
    echo "No se ha establecido el recinto para el usuario.";
}
?>

<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/es.css">
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
        <link rel="stylesheet" href="../../css/es.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../css/UserC.css">
        <title> Agregar Usuario</title>
    </head>

    <body id="page-top">
        <div class="modal fade" id="createuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title TColor" id="exampleModalLabel">Añadir nuevo usuario </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="" method="POST">
                            <div class="form-group">
                               <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                                <option value="" hidden selected >Recinto</option>
                                    <option value="FEM">FEM</option>
                                    <option value="JVM">JVM</option>
                                    <option value="EMH">EMH</option>
                                    <option value="EPH">EPH</option>
                                    <option value="LNNM">LNNM</option>
                                    <option value="UM">UM</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <input type="text"  id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre Completo">
                            </div>
                            <br>
                           
                            <div class="form-group">
                                <input type="email" name="correo" id="correo" class="css-input btn-block" style= " display: block; width: 100%;" placeholder="Correo Institucional">
                            </div> 
                            <br>
                           
                             <div class="form-group">
                                <input type="password" name="password" id="password" class="css-input btn-block" style= " display: block; width: 100%;" placeholder="Contraseña" required >
                            </div> 
                            <br>

                            <div class="form-group">
                                <select class="css-input btn-block" style= " display: block; width: 100%;" name="rol" id="rol"> 
                                    <option value="" hidden selected >Seleccione rol</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Colaborador</option>
                                </select>
                            </div> 
                            <br>
        
                            <div class="mb-3">    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                               <a href="../user.php" class="btn btn-danger">Cancelar</a>  
                            </div>

                        </form>                        

                        <script src="../../package/dist/sweetalert2.all.js"></script>
                        <script src="../../package/dist/sweetalert2.all.min.js"></script>

                        <script type="text/javascript">
                            $(function(){
                                $('#register').click(function(e){
                                    var valid = this.form.checkValidity();
                                    if(valid){
                                        var recinto = $('#recinto').val();
                                        var nombre = $('#nombre').val();
                                        var correo = $('#correo').val();
                                        var password = $('#password').val();
                                        var rol = $('#rol').val();

                                        e.preventDefault(); 

                                        $.ajax({
                                            type: 'POST',
                                            url: '../../includes/validar2.php',
                                            data: {recinto: recinto, nombre: nombre, correo: correo, password: password, rol: rol },
                                            success: function(data){
                                                Swal.fire({
                                                    'title': '¡Mensaje!',
                                                    'text': data,
                                                    'icon': 'success',
                                                    'showConfirmButton': 'false',
                                                    'timer': '1500'
                                                }).then(function() {
                                                    window.location = "../user.php";
                                                });     
                                            } ,
                                            
                                            error: function(data){
                                                Swal.fire({
                                                    'title': 'Error',
                                                    'text': data,
                                                    'icon': 'error'
                                                })
                                            }
                                        });
                                    
                                    }else{  
                                    }
                                });     
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>