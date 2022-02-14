<?php
include_once('funciones.php');

    $conexion = new mysqli($hn,$un,$pw,$db);
    $query = "UPDATE obras SET disponible=NULL WHERE id='".$_POST['id']."'";       
    $resultado=$conexion->query($query);//tenemos los nombres de los alumnos en el array $resultado


?>