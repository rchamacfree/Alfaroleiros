<?php
 try{

    $conexion= new mysqli($hn,$un,$pw,$db);
    $listaUsuarios=$conexion->query('SELECT * FROM usuarios');
    
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
<section id="listarAlumnos" style="min-height:450px">
    
           <div class="container">
            
              <h2 class="text-center marron m-5">Listar Usuarios</h2>
           
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
              <th scope="col">Admin</th>
              
            </tr>
          </thead>
          <tbody>

            <?php
               while($usuario = $listaUsuarios->fetch_assoc()){
                echo '<tr>';
                echo '<td scope="row">'.$usuario["id"].'</td>';
                echo '<td>'.ucfirst($usuario["nombre"]).'</td>';
                echo '<td>'.ucwords($usuario["apellidos"]).'</td>';
                echo '<td>'.$usuario["telefono"].'</td>';
                echo '<td>'.$usuario["email"].'</td>';
                echo '
                      <td>
                        <a href="inc/borrarUsuario.php?id='.$usuario["id"].'"  onclick = "return confirm()"> <i class="fas fa-user-minus">Borrar</i></a>
                      </td>
                     ';
               
                echo '<tr>';
                
               }
               echo '</table>';
               //cerramos la conexion
               $listaUsuarios->close();
               $conexion->close();
            ?>

        



          </tbody>
        </table>
      </div>
    </div>

    </section>