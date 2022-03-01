<?php

/*************************************************************************************************
 *                              REGISTRARUSUARIO.PHP
 * 
 * Recibe el los datos de modificarAlumno.php
 * Conecta con la base de datos y modifica el usuario
 * 
*************************************************************************************************/
//session_start();
require_once('funciones.php');

if (isset($_POST['id'])){

    //Preparamos los datos que obtenemos del formulario.
    $nombre    = filter_var(trim($_POST['alumnoNombre']),FILTER_SANITIZE_STRING);
    $nombre    = strtolower($nombre);
    $apellidos = filter_var(trim($_POST['alumnoApellidos']),FILTER_SANITIZE_STRING);
    $apellidos = strtolower($apellidos);
    if (isset($_POST['alumnoTelefono'])){
        $telefono  = filter_var(trim($_POST['alumnoTelefono']),FILTER_SANITIZE_STRING);
    }else{
        $telefono=NULL;
    }
    $email     = filter_var(trim($_POST['alumnoEmail']),FILTER_SANITIZE_EMAIL);
    $email     = strtolower($email);
    $diaClase  = $_POST['alumnoDiaClase'];
    $id = $_POST['id'];
   
   

        
    try{

        $conexion = new mysqli($hn,$un,$pw,$db);
              
          
          //Utilizamos una consulta parametrizada por prevención
           $modify = $conexion->stmt_init();//1.iniciamos
           $modify->prepare ('UPDATE alumnos SET nombre=?, apellidos=?, telefono=?, email=?, diaClase=? WHERE id=? '); //2.consulta con parametros
           $modify->bind_param('sssssi', $nombre, $apellidos, $telefono, $email, $diaClase, $id); //3. parametros
           $modify->execute(); //4.ejecuta 
           
           
           
           
            if($modify){
                //echo '<script>alert("operacion realizada");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../listarAlumnos.php">';

            }
            else{
                echo '<script>alert("La operación no se pudo realizar");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../modificarAlumno.php">';
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

