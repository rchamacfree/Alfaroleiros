<?php
/**
 *      Recibimos via post el día a reservar.
 *      Comprobamos si el usuario se ha logueado
 *              no - informamos al usuario de que se loguee y lo reenviamos a la pagina de acceso
 *              si - obtenemos los datos del usuario logueado y lo añadimos a la tabla alumnos.
 * 
 *  $_SESSION['usuario']    = Nombre del usuario
 *  $_SESSION['apellidos']  = Apellidos
 *  $_SESSION['email']      = email
 *  $_SESSION['telefono']   = telefono
 *  $_POST['diaClase']      = diaClase
 */


session_start();
require_once('funciones.php');
$diaClase = $_POST['diaClase'];


if (!$_SESSION['usuario']){
    
    echo 'Usuario no registrado <a href="registro.php">Acceder a registro</a>';


}else{
        $nombre = $_SESSION['usuario'];
        $apellidos = $_SESSION['apellidos'];
        if (isset($_SESSION['telefono'])) $telefono = $_SESSION['telefono'];
        else $telefono = '';
        $email = $_SESSION['email']; 


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
                   echo 'Clase reservada correctamente';
                }
                else{
                    return FALSE;
                } 
            
            }else{ //Si ya existe el alumno
           
                    echo 'Ya está matriculado en una clase';
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
            $comprobarAlumno->close();
            $conexion->close();
        }


}