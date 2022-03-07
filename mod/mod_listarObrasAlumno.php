<?php
/*********************************************************************************
 *        MOD_LISTAROBRASALUMNO
 * 
 * variables:
 *      $_GET['id'] = 'id' del alumno
 *      $_GET['alumno'] = nombre del alumno
 * 
 *********************************************************************************/
 try{
    if ($_GET['id']){
    $conexion= new mysqli($hn,$un,$pw,$db);
    $resultado = $conexion->query('SELECT * FROM obras where autor='.$_GET['id']);

    } 
  }catch (Exception $e){
    echo<<<_END
    <div class="container">

    <h4>Error de conexión. 
    Por favor vuelva a intentarlo más tarde.
    Si continúa teniendo este error envíe 
    un mensaje a admin@artyman.es. 
    Gracias</h4>

    </div>
    _END;
    die('');
  }
?>
<section id="listarObrasAlumno" style="min-height:450px">
    <div class="container">
            
            <h2 class="text-center marron m-5">Obras de <?php echo $_GET['alumno']?></h2>
    </div>
    <div class="container">
        <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>         
              <th scope="col">Obra</th>
              <th scope="col">img</th>
              <th scope="col">Precio</th>
              <th scope="col">Reservada por usuario:</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
               while($obra = $resultado->fetch_assoc()){
                echo '<tr>';
                echo '<td scope="row">'.$obra["id"].'</td>';
                echo '<td>'.$obra["src"].'</td>';
                echo '<td><img src="img/'.$obra["src"].'" width="50"</td>';

                echo '<td>'.$obra["precio"].'€</td>';
                echo '<td>'.$obra["comprador"].'</td>';   
                echo '<td><button class="btn btn-default text-white fondomarron" id="borrarObra" onclick="borrarObra('.$obra["id"].')">borrar obra</button></td>';            
                echo '<tr>';
                
               }
               echo '</table>';
              
            ?>

        



          </tbody>
        </table>

      </div>
    </div>
    <div class="container">
        <div class="col float-end">
            <a href="listarAlumnos.php" class="btn btn-default text-white fondomarron">Volver</a>
        </div>
    </div>

    <?php
     $listaAlumnos->close();
     $conexion->close();
     ?>





            
    </div> 
  
</section>