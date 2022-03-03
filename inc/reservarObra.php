<?php
include_once('funciones.php');

/* 
* Variables recibidas desde la funcion reservarObra()
* $_POST['id'] --> El id de la obra que se va a reservar
* $_POST['idUsuario'] --> El id del usuario que reserva la obra

*  Establecer la columna disponible a FALSE en la tabla obras a la obra 'id'
*  Enviar email al administrador informando que el usuario ha reservado la obra 'id'
*  Enviar email al usuario confirmando la reserva

*/

    $conexion = new mysqli($hn,$un,$pw,$db);
    $query = "UPDATE obras SET disponible=NULL, comprador='".$_POST['idUsuario']."' WHERE id='".$_POST['id']."'";  
         
    $resultado=$conexion->query($query);



/*  Enviar email al administrador informando que el usuario ha reservado la obra 'id'
  
    $mensaje = 'El usuario: '.$_POST['idUsuario'].' ha reservado la obra: '.$_POST['id'];
    $destinatario = "rchamacfree@gmail.com";//email de la tienda
    
      
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: admin@rafachamorro.xyz' .  "\r\n";

    mail($destinatario, "Obra reservada", $mensaje, $headers);

*/

/*
    Enviar email al usuario confirmando la reserva

    $query2 = "SELECT * FROM usuarios WHERE id='".$_POST['idUsuario']."'";
    $resultado2=$conexion->query($query);
    $mailUsuario = $resultado2['email'];
    mail($mailUsuario, "Notificacion Alfaroleiros", "Gracias por reservar la obra",$headers);
*/





   
?>