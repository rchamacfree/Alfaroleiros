<?php
session_start();
include_once('funciones.php');
$tipoUsuario=$_SESSION['tipoUsuario'];
if($tipoUsuario!="admin") echo '<meta http-equiv="refresh" content="0;url=../index.php">';

         
        if (isset($_GET['id'])){

        
     
        $conexion = new mysqli($hn,$un,$pw,$db);
        
        //combrobar si hay error
        $error = $conexion->connect_errno;
        if ($error != null){
            echo $conexion -> connect_error;
            exit();
        }else{
            $consulta = $conexion->stmt_init();
            $consulta ->prepare('UPDATE alumnos SET activo=0 WHERE id=?');
            $id = $_GET['id'];
            $consulta ->bind_param('i', $id);
            $consulta ->execute();
            if ($consulta->error != null){
                echo $consulta -> error;
            } else {
                echo '<meta http-equiv="refresh" content="0;url=../listarAlumnos.php">';
            }
            $consulta->close();
            $conexion ->close();
        }
        
        } else echo '<h3>No se suministro un identificador para borrar</h3>';
        
        
        ?>
        
