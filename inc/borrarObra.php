<?php
session_start();
include_once('funciones.php');
$tipoUsuario=$_SESSION['tipoUsuario'];
if($tipoUsuario!="admin") echo '<meta http-equiv="refresh" content="0;url=../index.php">';

         
        if (isset($_POST['id'])){
            
        $conexion = new mysqli($hn,$un,$pw,$db);
        
        //combrobar si hay error
        $error = $conexion->connect_errno;
        if ($error != null){
            echo $conexion -> connect_error;
            exit();
        }else{
            $consulta = $conexion->stmt_init();
            $consulta ->prepare('DELETE FROM obras WHERE id=?');
            $id = $_POST['id'];
            $consulta ->bind_param('i', $id);
            $consulta ->execute();
            if ($consulta->error != null){
                echo $consulta -> error;
            }

            $consulta->close();
            $conexion ->close();
        }
        
        } else echo '<h3>No se suministro un identificador para borrar</h3>';
        
        
        ?>
        
