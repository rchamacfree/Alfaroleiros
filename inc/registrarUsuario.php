<?php

/*************************************************************************************************
 *                              REGISTRARUSUARIO.PHP
 * 
 * Recibe el los datos de formularioRegistro.php
 * Conecta con la base de datos y comprueba que el usuario no exista
 * En caso de que no exista inserta los datos en la base de datos
*************************************************************************************************/
//session_start();
require_once('funciones.php');

if (isset($_POST['registroInputEmail'])){

    //Preparamos los datos que obtenemos del formulario.
    $email     = filter_var(trim($_POST['registroInputEmail']),FILTER_SANITIZE_EMAIL);
    $email     = strtolower($email);
    $pass      = filter_var(trim($_POST['registroInputPassword']),FILTER_SANITIZE_STRING);
    $pass      = sha1($pass);
    $nombre    = filter_var(trim($_POST['registroNombre']),FILTER_SANITIZE_STRING);
    $nombre    = strtolower($nombre);
    $apellidos = filter_var(trim($_POST['registroApellidos']),FILTER_SANITIZE_STRING);
    $apellidos = strtolower($apellidos);
        if (isset($_POST['registroTelefono'])){
            $telefono  = filter_var(trim($_POST['registroTelefono']),FILTER_SANITIZE_STRING);
        }else{
            $telefono=NULL;
        }
    $tipoUsuario="usuario";

  
        
    try{

        $conexion = new mysqli($hn,$un,$pw,$db);

        //comprobamos si el usuario existe
        $comprobarUsuario=$conexion->query('SELECT * FROM usuarios WHERE email="'.$email.'"');
        $registro = $comprobarUsuario->fetch_assoc();


        if(!$registro){  // Si no encuentra resultados insertamos los datos
           // $insert= $conexion->query("INSERT INTO usuarios (nombre,apellidos,telefono,email,tipoUsuario,shaPass) VALUES('".$nombre."','".$apellidos."','".$telefono."','".$email."','".$tipoUsuario."','".$pass."')" );
          
          
          //Utilizamos una consulta parametrizada por prevención
           $insert = $conexion->stmt_init();//1.iniciamos
           $insert->prepare ('insert into usuarios (nombre,apellidos,telefono,email,tipoUsuario,shaPass) values (?,?,?,?,?,?)'); //2.consulta con parametros
           $insert->bind_param('ssssss', $nombre, $apellidos, $telefono, $email, $tipoUsuario, $pass); //3. parametros
           $insert->execute(); //4.ejecuta 
           
           
           
           
            if($insert){
                echo '<script>alert("operacion realizada");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../acceso.php">';

            }
            else{
                echo '<script>alert("La operación no se pudo realizar");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../formularioRegistro.php">';
            } 
           
        }else{ //Si ya existe el usuario nos manda a la página de acceso
           echo '<script>
           confirm("el usuario ya existe");
           </script>';
           echo '<meta http-equiv="refresh" content="0;url=../acceso.php">';
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
        $comprobarUsuario->close();
        $conexion->close();
    }
 
 }else{
     echo 'No se han recibido datos';
 }


 ?>

