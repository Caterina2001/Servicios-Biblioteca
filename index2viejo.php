<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

    header("Location: ./includes/login.php");
    die();
    
    

}



?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros2</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">

    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/UserC.css">

</head>

<body id="page-top">

<div class="modal fade" id="create2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text"  id="nombre" name="nombre" class="css-input" required placeholder="Nombre Completo">
                            </div>
                       
                            <br>
                           
                            <div class="form-group">
                                <input type="email" name="correo" id="correo" class="css-input" placeholder="Correo Institucional">
                            </div> 
                            <br>
                           
                             <div class="form-group">
                                <input type="password" name="password" id="password" class="css-input" placeholder="Contraseña" required >
                            </div> 
                            <br>
                            <div class="form-group">
                                <input type="number"  id="rol" name="rol" class="css-input" placeholder="Escribe el rol, 1 admin, 2 técnico..">
                             
                            </div> 
                            <div class="form-group">
                                  <label for="rol" class="text-center fw-bold mx-3 mb-0 EditColor">Rol de usuario</label>
        
                            </div>

                            <div class="form-check">
                                   
                                    <input class="form-check-input" type="radio" name="rol" value=1 id="rol" >
                                  
                                    <label class="form-check-label" for="rol"> Administrador </label>
                                    
                            </div>
                            
                            <div class="form-check">
                                    
                                    <input class="form-check-input" type="radio" name="rol" value=2 id="rol" >
                                  
                                    <label class="form-check-label" for="rol"> Colaborador </label>


                            </div>
                           

                            <!-- <div class="form-group">
                                  <label for="rol" class="text-center fw-bold mx-3 mb-0 EditColor">Rol de usuario</label>
        
                            </div>
                       
                            <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" value="1" id="rol">
                                    <label class="form-check-label" for="rol">
                                        Administrador
                                    </label>
                                    </div>
                                
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" value="2" id="rol" checked>
                                    <label class="form-check-label" for="rol">
                                        Colaborador
                                    </label>
                            </div> -->

                            <br>
                      
                        
       
                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="registrar">
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                        

                        </form>                        

<script src="./package/dist/sweetalert2.all.js"></script>
<script src="./package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){


            var nombre = $('#nombre').val();
            var correo = $('#correo').val();
            var password = $('#password').val();
            var rol = $('#rol').val();
            
            

                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: '../includes/validar2.php',
                    data: {nombre: nombre, correo: correo, password: password, rol: rol, },
                    success: function(data){
                    Swal.fire({
                                'title': '¡Mensaje!',
                                'text': data,
                                'icon': 'success',
                                'showConfirmButton': 'false',
                                'timer': '1500'
                                }).then(function() {
                window.location = "user.php";
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
</body>
</html>