<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo de Modal en PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Ejemplo de Modal en PHPpppppppp</h2>

	<h2>Ejemplo de Modal en PHPpppppppp</h2>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
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

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>

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
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                            name="registrar">
                            <a href="registros.php" class="btn btn-danger">Cancelar</a>                 
                        </div>

                </form>
            </div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>

			</div>
		</div>
	</div>
<div class="modal fade" id="modalOpcion2">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Opción 2</h4>
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
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                            name="registrar">
                            <a href="registros.php" class="btn btn-danger">Cancelar</a>                 
                        </div>

                </form>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>

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
</html>

