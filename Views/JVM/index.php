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
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href=".../css/estilo.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
</head>

<body id="page-top">

<div class="modal fade" id="createjvm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Participantes</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
<form  action="" method="POST">
                            <div class="form-group">
                               <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                                <option value="JVM"  selected >JVM</option>
                                    <!-- <option value="FEM">FEM</option>
                                    <option value="JVM">JVM</option>
                                    <option value="EMH">EMH</option>
                                    <option value="FEM">EPH</option>
                                    <option value="JVM">LNNM</option>
                                    <option value="EMH">UM</option> -->
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
<!--                             <label for="nombre" class="form-label">Nombre *</label>
 -->                            <input type="text"  id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre">
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="css-input btn-block" style= " display: block; width: 100%;" required name="rol" id="rol"> 
                                <option value="" hidden selected >Tipo de Usuario</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Colaborador">Colaborador</option>
                                    <option value="Externo">Externo</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="number"  id="matricula" name="matricula btn-block" class="css-input" style= " display: block; width: 100%;" required placeholder="Matricula o Cedula">
                            </div>
                            <br>

                            <div class="form-group">
                                <select class="css-input btn-block" style= " display: block; width: 100%;" required name="servicio" id="servicio" > 
                                <option value="" hidden selected >Servicio</option>
                                    <option value="Sala de Estudio">Sala de Estudio</option>
                                    <option value="Saln de Equipos">Sala de Equipos</option>
                                    <option value="Computadoras">Computadoras</option>
                                </select>
                            </div>

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


			var recinto = $('#recinto').val();
			var nombre = $('#nombre').val();
			var rol = $('#rol').val();
			var matricula = $('#matricula').val();
            var servicio = $('#servicio').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: '../../includes/validar.php',
					data: {recinto: recinto, nombre: nombre, rol: rol, matricula: matricula, servicio: servicio},
					success: function(data){
					Swal.fire({
								'title': '¡Mensaje!',
								'text': data,
                                'icon': 'success',
                                'showConfirmButton': 'false',
                                'timer': '1500'
								}).then(function() {
                window.location = "Registros.php";
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