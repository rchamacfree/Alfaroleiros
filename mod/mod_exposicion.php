<?php
 try{

    $conexion = new mysqli($hn,$un,$pw,$db);
    $resultado=$conexion->query('SELECT id,nombre FROM alumnos');//tenemos los nombres de los alumnos en el array $resultado
}catch(exception $e){
    echo<<<_END
    <div class="container" style="height:400px;">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        <p>En estos momentos no podemos mostrarle las obras de nuestros alumnos.</p>
        <p>Disculpen las molestias.</p>
        </div>
        <div class="col-3"></div>


      </div>
    </div>
    _END;

    include_once('footer.php');
    
    die('');
}
?>
<h2 class="text-center marron fs-1" style="margin-top:40px;">Exposición</h2>


<section  id="exposicion">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">  <!-- pantallas pequeñas col-12 pantallas >768px col-6 --> 
                <article class="m-5">

                        <!-- CARGAR ALUMNOS DESDE LA BD -->
                        <h6 class="marron">Selecciona el nombre de un alumno para ver sus trabajos:</h6>

                    <!-- <form name="alumnos" action="exposicion.php" method="POST">-->
                        <select id="selectorAlumno" name="selectorAlumno" class="form-select" aria-label="Default select example">
                        <?php

                       

                        //Obtenemos los id y nombre de los alumnos y los mostramos en el select 
                           // if($resultado->num_rows > 0){

                                while($registro=$resultado->fetch_assoc()){
                                    echo '<option value="'.htmlspecialchars($registro["id"]).'">'.ucfirst(htmlspecialchars($registro["nombre"])).'</option>';
                                    }
                           // }
                      ?>

                        </select>

                    
                    <!--<button type="button" id="miboton" onclick="mostrar()">Mostrar Obras</button> -->
                    <!--     </form> -->

                </article>
            </div>
        </div>




         <article>
        
            <div class="container" style="min-height: 300px;">
                <div class="row col-12 col-sd-6" id="pruea"> 
                
                </div>
            </div>

        </article>
    </div>
</section>

<?php
  //Cerrar la consulta y la conexión
 // $resultado ->close();
  ///$conexion ->close();

?>