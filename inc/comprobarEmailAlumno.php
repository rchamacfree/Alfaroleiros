<?php
include_once('funciones.php');



try{
    $conexion = new mysqli($hn,$un,$pw,$db);
    $comprobarUsuario=$conexion->query('SELECT * FROM alumnos WHERE email="'.$_POST["email"].'"');
    $registro = $comprobarUsuario->fetch_assoc();

    if($registro)   echo '<i class="bi bi-x-lg text-danger"></i>';
    else            echo '<i class="bi bi-check-lg text-success"></i>';
}catch(Excption $e){
    echo '<p>Error de conexión</p>';
}finally{
    $comprobarUsuario->close();
    $conexion->close();

}
?>