<?php
    if(isset($_POST['correo']) && !empty ($_POST['correo']) && isset($_POST['mensaje']) && !empty ($_POST['mensaje']))
    {

    $destino = "nahomi.nunez@isfodosu.edu.do";
    $correo = "From:".$_POST['correo'];
    $asunto = "Solicitud SIB-ISFODOSU";
    $mensaje = $_POST['mensaje'];
    mail($destino,$asunto,$mensaje,$correo);
    echo "Solicitud enviada";

    }
    else {

    echo "Por favor completar el campo del correo institucional y del mensaje";
    
    }
?>