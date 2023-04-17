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
</head>

<body id="page-top">

<div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            
                           
                            
                            
                            

                            <br>
                      
                        
       
                                <div class="mb-3">
                                    
                                <button type="button" class="AgregarB btn-success" data-toggle="modal" data-target="#createfem">
                                <span class="glyphicon glyphicon-plus"></span> INSUMO &nbsp<i class="fa fa-plus"></i> </a></button>
                                <button type="button" class="AgregarB btn-success" data-toggle="" data-target="">
                                <span class="glyphicon glyphicon-plus"></span> OTRO<i class="fa fa-plus"></i> </a></button>
                               
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