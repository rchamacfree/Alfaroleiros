<?php
/*********************************************************************************
 *        MOD_VERPEDIDOS
 * 
 * variables:
 *      $_SESSION['idUsuario'] - El id del usuario activo
 *      $_SESSION['usuario'] - El nombre del usuario activo
 *********************************************************************************/
include_once('inc/funciones.php');
$idUsuario = $_SESSION['idUsuario'];
$nombreUsuario = $_SESSION['usuario'];


 try{
    if ($_SESSION['idUsuario']){
    $conexion= new mysqli($hn,$un,$pw,$db);
    $resultado = $conexion->query('SELECT * FROM obras where comprador='.$idUsuario);

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
<section id="verPedidos" style="min-height:450px">
    <div class="container">
            
            <h2 class="text-center marron m-5">Pedidos de <?php echo ucfirst($nombreUsuario);?></h2>
    </div>
    <div class="container">
        <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>         
              <th scope="col">img</th>
              <th scope="col">Precio</th>
            </tr>
          </thead>
          <tbody>

            <?php
               while($pedido = $resultado->fetch_assoc()){
                echo '<tr>';
                echo '<td scope="row">'.$pedido["id"].'</td>';
                echo '<td><img src="img/'.$pedido["src"].'" width="50"</td>';
                echo '<td>'.$pedido["precio"].'€</td>';
                echo '</tr>';
               }
             ?>
          </tbody>
        </table>

      </div>
    </div>
    <div class="container">
        <div class="col float-end">
            <a href="inicio.php" class="btn btn-default text-white fondomarron">Volver</a>
        </div>

    </div>



    <?php
     $listaAlumnos->close();
     $conexion->close();
     ?>





            
    </div> 


</section>