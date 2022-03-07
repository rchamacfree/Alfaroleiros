<?php
session_start();
include_once('inc/funciones.php');

$tipoUsuario=$_SESSION['tipoUsuario'];
if($tipoUsuario!="admin"){
  echo '<meta http-equiv="refresh" content="0;url=index.php">';

  return null;
}

          try{

            $conexion= new mysqli($hn,$un,$pw,$db);
            $listaAlumnos=$conexion->query('SELECT * FROM alumnos');
            
          }catch (Exception $e){
            echo<<<_END
            <h4>Error de conexión. 
            Por favor vuelva a intentarlo.
            Si continúa teniendo este error envíe 
            un mensaje a admin@artyman.es. 
            Gracias</h4>
            _END;
            die('');
          } 

 ?>



<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Listar alumnos</title>



    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="css/proyecto.css" rel="stylesheet">


    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/2a4269f435.js" crossorigin="anonymous"></script>

</head>



<body>
    <?php include_once('mod/header.php'); ?>



    <section id="listarAlumnos" style="min-height:450px">
    
           <div class="container">
            
              <h2 class="text-center marron m-5">Listar Alumnos</h2>
              <a href="addAlumno.php" class="marron"><i class="bi bi-person-plus-fill"></i> Añadir Alumno</a>
           
            </div> 
  
    
    <div class="container">
        <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Email</th>
              <th scope="col">Día de Clase</th>
              <th scope="col">Obras</th>
              <th scope="col">Opciones admin</th>
              <th scope="col">activo</th>
            </tr>
          </thead>
          <tbody>

            <?php
               while($alumno = $listaAlumnos->fetch_assoc()){
                echo '<tr>';
                echo '<td scope="row">'.$alumno["id"].'</td>';
                echo '<td>'.ucfirst($alumno["nombre"]).'</td>';
                echo '<td>'.ucwords($alumno["apellidos"]).'</td>';
                echo '<td>'.$alumno["telefono"].'</td>';
                echo '<td>'.$alumno["email"].'</td>';
                echo '<td>'.$alumno["diaClase"].'</td>';
                echo '
                      <td>
                        <form action="subirObra.php" method="POST" style="display:inline">
                              <input type="hidden" name="autor" value="'.$alumno["id"].'">
                              <button type="submit" class="btn btn-default">
                              <i class="bi bi-plus-lg"></i><!-- script anadirObra.php -->
                              </button>
                        </form>

                        <a href="listarObrasAlumno.php?id='.$alumno["id"].'&alumno='.ucfirst($alumno["nombre"]).'"><i class="bi bi-eye"></i></a><!--script mostrarObras.php-->
                      </td>
                      <td>
                        <a href="modificarAlumno.php?id='.$alumno["id"].'"><i class="fas fa-user-edit">Modificar</i></a><!-- script modificarAlumno -->
                        <a href="inc/bajaAlumno.php?id='.$alumno["id"].'"  onclick = "return confirm()"> <i class="fas fa-user-minus">Dar Baja</i></a>     <!-- borrar alumno establece la propiedad activo a false-->
                      </td>
                     ';
                     echo '<td>'.$alumno["activo"].'</td>';
                
                echo '<tr>';
                
                 //'<a href="borrado.php?id='.$datos["id_persona"].' onclick= "return confirm()" ></a>;
               }
               echo '</table>';
               //cerramos la conexion
               $listaAlumnos->close();
               $conexion->close();
            ?>

        



          </tbody>
        </table>
      </div>
    </div>

    </section>



    <?php include_once('mod/footer.php'); ?>




</body>
</html>


	
											