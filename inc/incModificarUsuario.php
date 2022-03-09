<?php

/*************************************************************************************************
 *                              INCMODIFICARUSUARIO.PHP
 * 
 * Recibe el los datos de modificarUsuario.php
 * Conecta con la base de datos y modifica el usuario
 * 
*************************************************************************************************/
//session_start();
require_once('funciones.php');

if (isset($_POST['id'])){

    //Preparamos los datos que obtenemos del formulario.
    $nombre    = filter_var(trim($_POST['usuarioNombre']),FILTER_SANITIZE_STRING);
    $nombre    = strtolower($nombre);
    $apellidos = filter_var(trim($_POST['usuarioApellidos']),FILTER_SANITIZE_STRING);
    $apellidos = strtolower($apellidos);
    if (isset($_POST['usuarioTelefono'])){
        $telefono  = filter_var(trim($_POST['usuarioTelefono']),FILTER_SANITIZE_STRING);
    }else{
        $telefono=NULL;
    }
    $email     = filter_var(trim($_POST['usuarioEmail']),FILTER_SANITIZE_EMAIL);
    $email     = strtolower($email);
    $id = $_POST['id'];
   
   

        
    try{

        $conexion = new mysqli($hn,$un,$pw,$db);
              
          
          //Utilizamos una consulta parametrizada por prevención
           $modify = $conexion->stmt_init();//1.iniciamos
           $modify->prepare ('UPDATE usuarios SET nombre=?, apellidos=?, telefono=?, email=?  WHERE id=? '); //2.consulta con parametros
           $modify->bind_param('ssssi', $nombre, $apellidos, $telefono, $email, $id); //3. parametros
           $modify->execute(); //4.ejecuta 
           
           
           
           
            if($modify){
                echo '<script>alert("operacion realizada con éxito");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../inicio.php">';

            }
            else{
                echo '<script>alert("La operación no se pudo realizar");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../modificarUsuario.php">';
            } 
           
       





    }catch(Exception $e){
        echo<<<_END
        <h4>Error de conexión. 
        Por favor vuelva a intentarlo.
        Si continúa teniendo este error envíe 
        un mensaje a admin@alfaroleiros.es. 
        Gracias</h4>
        _END;
        die('');
  
    }finally{
        //cerramos las conexiones
        $conexion->close();
    }
 
 }else{
     echo 'No se han recibido datos';
 }


 ?>

