<?php
session_start();
include_once('../inc/funciones.php');
//$usuario = $_SESSION['usuario'];

// $_POST['id'] recibimos el dato del script mod_exposicion.php via ajax desde la funcion mostrarObras() con el id del alumno
if (isset($_POST['id']) && !empty($_POST['id'])){


  //////////////////////////////////////////////////////////////////////////////////////////////////
   // Esta variable se envía a la función reservar obra junto con el id de la obra
    //$usuario = $_POST['id'];
    $usuario = $_SESSION['idUsuario'];
  //echo $_SESSION['idUsuario'].'>>>'.$_SESSION['usuario'];
  ///////////////////////////////////////////////////////////////////////////////////////////////      

            try{
               $conexion = new mysqli($hn,$un,$pw,$db);
               $resultado = $conexion->query('SELECT * FROM obras where autor='.$_POST['id']);
               
               if ($resultado->num_rows == 0){echo "El alumno no ha publicado obras";}
               while($datos =$resultado->fetch_assoc()){
               $idObra = $datos['id'];
                         
                echo '<div class="col mb-3">';
                  echo '<div class="card" style="width:250px">';
                   echo '<img class="card-img-top" src="img/'.$datos["src"].'" alt="Card image" style="width:100%">';
                    echo '<div class="card-body">';

                    // Si la obra se encuentra disponible muestro el precio
                    if($datos["disponible"]){
                        echo '<h4 class="card-title text-center">PVP: '.$datos["precio"].'€</h4>';
                       
                          //compruebo si el usuario se ha identificado y muestro el botón de reservar
                        if ($_SESSION['tipoUsuario'])  
                          echo '<div class="text-center"><button class="btn fondomarron text-white" onclick=reservarObra('.$datos['id'].','.$usuario.')>RESERVAR</button></div>';

                          // en caso contrario no muestro el botón de reservar y muestro un enlace a la pagina de acceso.php
                          else echo '<div class="text-center"><a href="acceso.php">Acceder</a> para reservar</div>';
                  
                    // En caso de que la obra no se encuentre disponible lo indico.
                    }else{
                          echo '<h4 class="card-title text-center">No disponible</h4>';
                     }


                    echo '</div>';

                  echo '</div>';

                echo '</div>';

              }//fin del bucle while
            
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
