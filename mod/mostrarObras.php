<?php
include_once('../inc/funciones.php');

//ini_set('display_errors',1);
if (isset($_POST['id']) && !empty($_POST['id'])){


  //////////////////////////////////////////////////////////////////////////////////////////////////
  # TO _ DO   cambiar esto cuando tengamos las variables de sesión por el id o nombre de usuario de sesion
    $usuario = $_POST['id'];  
  ///////////////////////////////////////////////////////////////////////////////////////////////      

            try{
               $conexion = new mysqli($hn,$un,$pw,$db);
               $resultado = $conexion->query('SELECT * FROM obras where autor='.$_POST['id']);
               
               if ($resultado->num_rows == 0){echo "El alumno no ha publicado obras";}
               while($datos =$resultado->fetch_assoc()){
               $idObra = $datos['id'];
              /* echo $idObra;*/

              // echo 'id_obra'.$datos["id"].': '.$datos["imagen"].' '.$datos["autor"].'<br>';
              
                echo '<div class="col mb-3">';
                  echo '<div class="card" style="width:250px">';
                   echo '<img class="card-img-top" src="img/'.$datos["src"].'" alt="Card image" style="width:100%">';
                    echo '<div class="card-body">';
                    if($datos["disponible"]){
                        echo '<h4 class="card-title text-center">PVP: '.$datos["precio"].'</h4>';
                        echo '<div class="text-center"><button class="btn fondomarron text-white" onclick=reservarObra('.$datos['id'].','.$usuario.')>RESERVAR</button></div>';
                    }else{
                            echo '<h4 class="card-title text-center">No disponible</h4>';
                          }


                          echo '</div>';

                        echo '</div>';

                echo '</div>';

            }
            



               

            }catch (Exception $e){
               echo<<<_END
               <h4>Error de conexión. 
               Por favor vuelva a intentarlo.
               Si continúa teniendo este error envíe 
               un mensaje a admin@artyman.es. 
               Gracias</h4>
               _END;
               die('');
               
            }finally{
              $resultado->close();
              $conexion->close();
            }
         
    



              

 
}else{
    echo'<p>No se suministró id</p>';
 }



?>
