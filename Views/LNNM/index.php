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
        <link rel="stylesheet" href="./css/es.css">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href=".../css/estilo.css">
        <link rel="stylesheet" href="./package/dist/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="../../css/login.css">
        <title>LNNM</title>
    </head>

    <body>

        <div class="modal fade" id="createlnnm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="row form-group ">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="css-input btn-block" style= " display: block; width: 100%;"  name="recinto" required id="recinto"  > 
                                        <option value="LNNM"  selected >LNNM</option>
                                    </select>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 ">
                                    <input type="text" id="nombre" name="nombre" class="css-input btn-block" style= " display: block; width: 100%;" required placeholder="Nombre">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="css-input btn-block" style= " display: block; width: 100%;" required name="rol" id="rol"> 
                                        <option value="" hidden selected >Tipo de Usuario</option>
                                        <option value="Estudiante">Estudiante</option>
                                        <option value="Docente">Docente</option>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Externo">Externo</option>
                                    </select>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 ">
                                    <input type="text" pattern="\d{9}|\d{11}" id="matricula" name="matricula btn-block" class="css-input" style= " display: block; width: 100%;" required placeholder="Matricula o Cedula">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="css-input btn-block" style= " display: block; width: 100%;" required name="servicio" id="servicio" > 
                                        <option value="" hidden selected >Servicio</option>
                                        <option value="Sala de Estudio">Sala de Estudio</option>
                                        <option value="Sala de Lectura">Sala de Lectura</option>
                                        <option value="Computadoras">Computadoras</option>
                                        <option value="Fotocopiadoras">Fotocopiadoras</option>
                                        <option value="Prestamo"> Préstamo de recursos no catalogados en KOHA </option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="css-input btn-block" style= " display: block; width: 100%;" name="tipoprestamo" id="tipoprestamo" disabled> 
                                        <option value="No Aplica" hidden selected >Tipo de prestamo </option>
                                        <option value="Prestamo a Domicilio"> Préstamo a Domicilio </option>
                                        <option value="Prestamo en Sala"> Préstamo en Sala </option>
                                        <option value="Prestamo de otros insumos">Préstamo de otros insumos</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="css-input btn-block" style= " display: block; width: 100%;" name="tipomaterial" id="tipomaterial" disabled> 
                                        <option value="No Aplica" hidden selected >Tipo de material </option>
                                        <option value="Libro"> Libro </option>
                                        <option value="Folleto"> Folleto </option>
                                        <option value="Material cartografico"> Material cartografico</option>
                                        <option value="Publicacion periodica"> Publicación periódica</option>
                                        <option value="Material audiovisual"> Material audiovisual </option>
                                        <option value="Otro"> Otro </option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 ">
                                    <input type="text" id="registro" name="registro" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Numero de Registro">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <div class="col-xs-6 col-sm-6 col-md-6 ">
                                    <input type="text" id="titulo" name="titulo" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Titulo">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 ">
                                    <input type="text" id="autor" name="autor" class="css-input btn-block" style= " display: block; width: 100%;" disabled placeholder="Autor">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="css-input btn-block" style= " display: block; width: 100%;"  name="responsable" required id="responsable"  > 
                                    <option value="<?php echo $_SESSION['correo']; ?>"  selected ><?php echo $_SESSION['correo']; ?></option>
                                </select>
                            </div>
                            <div class="mb-3">       
                                <input type="submit" value="Guardar" id="register" class="ColorB btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;"  name="registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#servicio').change(function (e) {
                if ($(this).val() === "Prestamo") {
                    $('#tipoprestamo').prop("disabled", false);
                    $('#tipomaterial').prop("disabled", false);
                    $('#registro').prop("disabled", false);
                    $('#titulo').prop("disabled", false);
                    $('#autor').prop("disabled", false);
                } else {
                    $('#tipoprestamo').prop("disabled", true);
                    $('#tipomaterial').prop("disabled", true);
                    $('#registro').prop("disabled", true);
                    $('#titulo').prop("disabled", true);
                    $('#autor').prop("disabled", true);
                }
                })
            });
        </script>

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
                        var responsable = $('#responsable').val();
                        e.preventDefault();	
                        $.ajax({
                            type: 'POST',
                            url: '../../includes/validar.php',
                            data: {recinto: recinto, nombre: nombre, rol: rol, matricula: matricula, servicio: servicio, responsable: responsable},
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