<!-- <?php

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
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
</head>

<body id="page-top">

<div class="modal fade" id="createfem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
					<h4 class="modal-title">Seleccionar una opción</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<p>Seleccione una de las siguientes opciones:</p>
					<button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modalOpcion1">Insumos</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#modalOpcion2">Prestamos/Devoluciones</button>
				</div>
                <div class="row form-group ">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modalOpcion1">Insumos</button>                    
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#modalOpcion2">Prestamos/Devoluciones</button>
                    </div>
                </div>

			


            
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
    </div>
</div>
<div class="modal fade" id="modalOpcion1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Opción 1</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form  action="" method="POST">
                    <div class="form-group">
                        <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                        <option value="FEM"  selected >FEM</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre">
                    </div>
                    <br>
                    <div class="form-group">
                        <select class="css-input btn-block" style= " display: block; width: 100%;" required name="rol" id="rol"> 
                        <option value="" hidden selected >Tipo de Usuario</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Externo">Externo</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" pattern="\d{9}|\d{11}" id="matricula" name="matricula btn-block" class="css-input" style= " display: block; width: 100%;" required placeholder="Matricula o Cedula">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <select class="css-input btn-block" style= " display: block; width: 100%;" required name="servicio" id="servicio" > 
                        <option value="" hidden selected >Servicio</option>
                            <option value="Sala de Estudio">Sala de Estudio</option>
                            <option value="Sala de Lectura">Sala de Lectura</option>
                            <option value="Computadoras">Computadoras</option>
                            <option value="Fotocopiadoras">Fotocopiadoras</option>
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">       
                        <input type="submit" value="Guardar" id="register" class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;" 
                        name="registrar">
                    </div>

                </form>
            </div>
        
             

        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        
    </div>
</div>	
<div class="modal fade" id="modalOpcion2" style="overflow-y: scroll;">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Opción 2</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form  action="" method="POST">
                    
                    <div class="row form-group ">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                        <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                        <option value="FEM"  selected >FEM</option>
                        </select>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 ">
                        <input type="text" id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <select class="css-input btn-block" style= " display: block; width: 100%;" required name="rol" id="rol"> 
                        <option value="" hidden selected >Tipo de Usuario</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Externo">Externo</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" pattern="\d{9}|\d{11}" id="matricula" name="matricula btn-block" class="css-input" style= " display: block; width: 100%;" required placeholder="Matricula o Cedula">
                    </div>
                    <br>
                    
                   
                    
                 
                    <div class="row form-group ">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <select class="css-input btn-block" style= " display: block; width: 100%;" required name="servicio" id="servicio" > 
                        <option value="" hidden selected >Servicio</option>
                            <option value="Prestamo a domicilio">Prestamo a domicilio</option>
                            <option value="Prestamo en sala">Prestamo en sala</option>
                            <option value="Renovación">Renovación</option>
                            <option value="Devolución">Devolución</option>
                            
                        </select>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <select class="css-input btn-block" style= " display: block; width: 100%;" required name="tipoMaterial" id="tipoMaterial" > 
                        <option value="" hidden selected >Tipo de Material</option>
                            <option value="Libro">Libro</option>
                            <option value="Tesis">Tesis</option>
                            <option value="Folletos">Folletos</option>
                            <option value="Publicaciones Periódicas">Publicaciones Periódicas</option>
                            <option value="Material Audiovisual">Material Audiovisual</option>
                            <option value="Enciclopedia">Enciclopedia</option>
                        </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" id="titulo" name="titulo" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Titulo">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" id="autor" name="autor" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Autor">
                    </div>
                    <br>
                   
                 
                    <div class="row form-group ">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" id="registro" name="registro" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Numero de Registro">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <input type="date" id="fechadev" name="fechadev" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Fecha Devolución">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">       
                        <input type="submit" value="Guardar" id="register" class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;" 
                        name="registrar">
                    </div>
                    


                   
                </form>
            </div>
            

                
        </div>
       

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

    </div>
</div>


                        

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
                window.location = "registros.php";
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
</html> -->