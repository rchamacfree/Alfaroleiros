<?php

/*
    Recibe los datos del formulario php.
    Envía email al administrador con el mensaje
*/
// TO DO Hacer con ajax

if($_POST) {
    $nombre = "";
    $apellidos="";
    $email = "";
    $asunto = "";
    $message = "";
    
    if(isset($_POST['nombre'])) {
      $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['apellidos'])) {
        $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
      }
    
    if(isset($_POST['email'])) {
    	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['asunto'])) {
    	$asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
    }
    
        
    if(isset($_POST['mensaje'])) {
    	$mensaje = filter_var($_POST['mensaje'],FILTER_SANITIZE_STRING);
    }

    $mensaje = 'El visitante: '.$nombre.' le ha enviado el siguiente mensaje: '.$mensaje."\r\n".'desde la direccion email: '.$email;
    $destinatario = "rchamacfree@gmail.com";//email de la tienda
    
      
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: admin@rafachamorro.xyz' .  "\r\n";

/*
    echo '<h2>Datos para enviar en el correo electronico</h2>';
    echo '<p>'.$headers.'</p>';

    echo '<p>'.$nombre.'</p>';
    echo '<p>'.$apellidos.'</p>';
    echo '<p>'.$email.'</p>';
    echo '<p>'.$telefono.'</p>';
    echo '<p>'.$asunto.'</p>';
    echo '<p>'.$mensaje.'</p>';

*/
   
    mail($destinatario, $asunto, $mensaje, $headers);
    
} else {
    return FALSE;
    //echo '<p>Something went wrong</p>';
    
}

?>

