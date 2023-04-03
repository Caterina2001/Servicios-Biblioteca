<?php
    if(isset($_POST['correo']) && !empty ($_POST['correo']))
    {

    $destino = "nahomi.nunez@isfodosu.edu.do";
    $correo = "From:".$_POST['correo'];
    $asunto = "Contraseña Olvidada";
    $mensaje = "Solicitud de reestablecimiento de contraseña";
    mail($destino,$asunto,$mensaje,$correo);
    echo "Solicitud de reestablecimiento de contraseña enviada";

    }
    else {

    echo "Por favor completar el campo del correo institucional";
    
    }
?>