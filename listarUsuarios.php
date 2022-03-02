<?php
session_start();
include_once('inc/funciones.php');

$tipoUsuario=$_SESSION['tipoUsuario'];
if($tipoUsuario!="admin"){
  echo '<meta http-equiv="refresh" content="0;url=index.php">';

  return null;
}

          

 ?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Listar Usuarios</title>



    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="css/proyecto.css" rel="stylesheet">


    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/2a4269f435.js" crossorigin="anonymous"></script>
    <script src="js/proyecto.js"></script>

</head>

<body>
    <?php 
    include_once('mod/header.php');
    include_once('mod/mod_listarUsuarios.php');
    include_once('mod/footer.php');

    
    ?>

    
<script src="js/proyecto.js"></script>

</body>
</html>