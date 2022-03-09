<?php
session_start();


$tipoUsuario=$_SESSION['tipoUsuario'];
$eventoautor=$_POST['autor']; //Guarda el id del autor que recibimos de la listaAlumnos
$nombreAutor=$_POST['nombreAutor'];//Guarda el nombre del autor de la listaAlumnos
include_once('inc/funciones.php');

//$tipoUsuario=$_SESSION['tipoUsuario'];

if($tipoUsuario!="admin"){
  echo '<meta http-equiv="refresh" content="0;url=index.php">';
  return null;
}
 ?>



    <div class="container" id="subirObra" style="min-height:450px">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            <h2 class="text-center marron mt-3">AÑADIR OBRA DE <?php echo strtoupper($nombreAutor)?></h2>
            <br>
            <form action="subirObra.php" method="POST" enctype="multipart/form-data">
                    <h4>Seleccionar imagen jpg:</h4><br>
                    <label for="filename">imagen jpeg</label>
                    <input type="file" name="filename" id="filename" size="10" required>
                    <br>
                    <input type="hidden" name="autor" value="<?php echo $eventoautor ?>">
                    <br>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" placeholder="10.00" required>
                    <hr>
                    <button class="btn fondomarron text-white text-end mb-3" type="submit" id="enviar" name="submit">Subir Obra</button>
                    <button class="btn fondomarron text-white mb-3" type="reset" name="reset">Cancelar</button>
                    <a href="listarAlumnos.php" class="btn fondomarron text-white mb-3" >Volver</a>

                    <br>


                    <?php
                            $autor=$_POST['autor'];
                            $name =$_FILES['filename']['name'];

                            
                        if($_FILES['filename']['type']=='image/jpeg'){
                            $precio = $_POST['precio'];
                                    try{
                                        
                                    $conexion= new mysqli($hn,$un,$pw,$db);
                                    $query = "INSERT INTO obras (id,src,autor,disponible,precio,comprador) VALUES(NULL,'".$name."','".$autor."',TRUE,'".$precio."',NULL)";
                                    //echo $query; 
                                    $result=$conexion->query($query);
                                    move_uploaded_file($_FILES['filename']['tmp_name'],"img/$name"); 
                                   
                                    if($result){
                                        echo '<div id="resultado"><img src="img/'.$name.'" alt="imagen del alumno"  width="200px" height="200px"></div>';
                                        echo '<div class="alert alert-primary" role="alert">Imagen subida correctamente</div>';
                                    }else{
                                        echo '<div class="alert alert-danger" role="alert">Error al subir la imagen</div>';

                                    }
                                       
                              }catch (Exception $e){
                                        echo<<<_END
                                        <h4>Error de conexión. 
                                        Por favor vuelva a intentarlo.
                                        Si continúa teniendo este error envíe 
                                        un mensaje a admin@alfaroleiros.es. 
                                        Gracias</h4>
                                        _END;
                                        die('');
                              }finally{
                                    $result ->close();
                                    $conexion ->close();
                              } 
                                    
                        }
                        if($_FILES['filename']['type']!='image/jpeg' && $_FILES['filename']['type']!= NULL){

                            echo '<div class="alert alert-danger" role="alert">Formato de archivo no válido</div>';

                        } 

                        
                    ?>

            </form>
           
            </div>
            <div class="col-4"></div>
        

        </div>

    </div>

                   