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

if (isset($_POST['alumnoEmail'])){

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
    /*echo $nombre;
    echo $apellidos;
    echo $telefono;
    echo $email;
    echo $diaClase;*/


        
    try{

        $conexion = new mysqli($hn,$un,$pw,$db);

        //comprobamos si el alumno existe
        $comprobarAlumno=$conexion->query('SELECT * FROM alumnos WHERE email="'.$email.'"');
        $registro = $comprobarAlumno->fetch_assoc();


        if(!$registro){  // Si no encuentra resultados insertamos los datos
          
          
          //Utilizamos una consulta parametrizada por prevención
           $insert = $conexion->stmt_init();//1.iniciamos
           $insert->prepare ('insert into alumnos (nombre,apellidos,telefono,email,diaClase,activo) values (?,?,?,?,?,TRUE)'); //2.consulta con parametros
           $insert->bind_param('sssss', $nombre, $apellidos, $telefono, $email, $diaClase); //3. parametros
           $insert->execute(); //4.ejecuta 
           
           
           
           
            if($insert){
                echo '<script>alert("operacion realizada");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../listarAlumnos.php">';

            }
            else{
                echo '<script>alert("La operación no se pudo realizar");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../addAlumno.php">';
            } 
           
        }else{ //Si ya existe el usuario nos manda a la página de acceso
           echo '<script>
           confirm("el alumno ya existe");
           </script>';
           echo '<meta http-equiv="refresh" content="0;url=../listarAlumnos.php">';
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

