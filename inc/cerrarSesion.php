<?php
//incializo sesion
session_start();

//destruyo las variables de sesion
$_SESSION = array();

//destruyo la sesion
session_destroy();
echo '<meta http-equiv="refresh" content="0;url=../inicio.php">';

?>