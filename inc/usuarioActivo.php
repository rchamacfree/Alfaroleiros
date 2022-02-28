<?php

/*************************************************************************************************
 *                              USUARIOACTIVO.PHP
 * 
 * Recibe el email y pass del formulario de acceso
 * Conecta con la base de datos y comprueba el acceso
 * Registra las variables de sesion de usuario y tipo de usuario
 * 
*************************************************************************************************/
session_start();
require_once('funciones.php');
//$_SESSION['usuario']=$_POST['email'];



if (isset($_POST['email']) && isset($_POST['pass'])){ // si recibimos email y contraseña
                                                      // sería otra verificación más ya que lo controlamos con html (required) 
                                                           // TO_DO añadir verificación con js 
    
    //Intento evitar la inserción de codigo html
    $email = trim($_POST['email']);                                                  
    $email = filter_var($email,FILTER_SANITIZE_EMAIL); 
    $pass  = trim($_POST['pass']);
    $pass  = strip_tags($pass,FILTER_SANITIZE_STRING); 
    $pass  = sha1($pass);
       


    try{
        $conexion = new mysqli($hn,$un,$pw,$db);
       // $res=$conexion->query('SELECT nombre,shaPass,tipoUsuario FROM usuarios WHERE email="'.$email.'"');
        $res=$conexion->query('SELECT * FROM usuarios WHERE email="'.$email.'"');

        $registro = $res->fetch_assoc();
        
        
      //  $rows = $res->num_rows;
      /*
        $id_usuario = $_POST["id"];

        $sentencia = mysqli_prepare("SELECT * FROM usuarios WHERE id = ?");
        mysqli_stmt_bind_param($sentencia, "i", $id_usuario);
        mysqli_stmt_execute($sentencia);
      */

          
            if(!$registro){  // Si no encuentra resultados a la query un alert y volvemos a mostrar la página de acceso
                echo '<script>alert("No se encuentra el email");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../acceso.php">';
            } else{

               // echo '<script>alert("usuario encontrado");</script>';
                    //obtenemos las password de la base de datos 
                    $dbpass = $registro["shaPass"];
                    
                   // echo '<p>'.$email.'->'.$tipoUsuario.'->'.$dbpass.'</p>';

                
                    if ($pass==$dbpass){  //Si coinciden las contraseñas guardamos las variables de session y vamos al index
                        $_SESSION['usuario']    = $registro['nombre'];
                        $_SESSION['tipoUsuario']= $registro["tipoUsuario"];
                        $_SESSION['idUsuario']  = $registro['id']; 
                        echo '<meta http-equiv="refresh" content="0;url=../inicio.php">';
            
                    }else{  //si no coinciden las contraseñas aviso y volvemos a mostrar la página de acceso
                        echo '<script>alert("usuario no encontrado");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=../acceso.php">';
                    }

             }
 
   }catch(Exception $e){
       echo $e;
            echo<<<_END
            <h4>Error de conexión. 
            Por favor vuelva a intentarlo.
            Si continúa teniendo este error envíe 
            un mensaje a admin@artyman.es. 
            Gracias</h4>
            _END;
            die('');
      
      }
    finally{
        //cerramos las conexiones
        $res->close();
        $conexion->close();
       
    } 
}else{ //si no se introduce email o contraseña vuelve a mostrar el formulario.
       
    echo '<meta http-equiv="refresh" content="0;url=../acceso.php">';

}

?>