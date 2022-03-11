<?php
include_once('inc/funciones.php');
$lunes = 6 ; $martes = 8 ; $miercoles = 8; $jueves = 2 ; $viernes = 8; $sabado = 8;

 try{
    $conexion = new mysqli($hn,$un,$pw,$db);
    //$query = 'SELECT * FROM alumnos WHERE (activo=FALSE) AND (diaClase="jueves")';
    $query = 'SELECT diaClase FROM alumnos WHERE activo=TRUE';
    $resultado=$conexion->query($query);
    while($datos =$resultado->fetch_assoc()){
        if ($datos['diaClase'] == 'lunes') $lunes --;
        if ($datos['diaClase'] == 'martes') $martes --;
        if ($datos['diaClase'] == 'miercoles') $miercoles --;
        if ($datos['diaClase'] == 'jueves') $jueves --;
        if ($datos['diaClase'] == 'viernes') $viernes --;
        if ($datos['diaClase'] == 'sabado') $sabado --;
    }
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


<section  id="clases">
<h2 class="text-center marron fs-1" style="margin-top:40px;">APUNTATE A NUESTRAS CLASES</h2>

    <div class="container"> 
       
         <div class="row" > 
              <div class="col-sm-1"></div>
             <div class="col-sm-5 mt-5">
                <p style="text-align:justify;">Nuestras clases grupales son mensuales de dos horas a la semana en el grupo que elijas según plazas disponibles. Cuentan con un aforo limitado a 8 personas para que sean mucho más personalizadas y dirigidas, respetando todos los protocolos Covid.
                                            La formación se adecúa al grupo en cuestión según los objetivos que se persiguen, pero es esencial el trabajo que realizamos con cada persona para que adquiera recursos útiles y beneficiosos para él</p>
                <div class="text-center mb-1">
                    <img src="img/imagen clases 3.jpg" class="img-fluid" alt="profesor con alumnos">
                </div>
                <p style="text-align:justify;">Nuestra filosofía se basa en acompañar de la mano a cada alumno en su proceso. Ofrecer un lugar de encuentro genuino con un ambiente distendido y cómodo, idóneo para ir asimilando la formación. Un espacio de juego y creatividad grupal para dar rienda suelta a la imaginación y al crecimiento individual.</p>
                <div class="text-center mb-1">
                 <img src="img/imagen clases 2.webp" class="img-fluid" alt="profesora con niño">
                </div>
            </div>
             <div class="col-sm-1"></div>

             <div class="col-sm-5 mt-5">
                 <div class="alert alert-info">
                 <p>Clases de lunes a viernes en horario de 5 a 7 de la tarde.</p>
                 <p>Clases de los sábados para niños de 11 a 1 de la mañana.</p>
                 <p>Consulta otras opciones</p>
                 </div>
             <table class="table table-bordered border-white text-center text-white">
                <thead>
                    <tr class="text-black">
                    <th scope="col">LUNES</th>
                    <th scope="col">MARTES</th>
                    <th scope="col">MIERCOLES</th>
                   

                    </tr>
                </thead>
                  
                    <tr>
                    <td id="celdaLunes">Plazas disponibles: <p id="lunes"><?php echo $lunes?></p><button type="button" id="reservarLunes" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>    
                    <td id="celdaMartes">Plazas disponibles: <p id="martes"><?php echo $martes?></p> <button type="button" id="reservarMartes" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>
                    <td id="celdaMiercoles">Plazas disponibles: <p id="miercoles"><?php echo $miercoles?></p><button type="button" id="reservarMiercoles" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>
                                     
                    </tr>
                    
                </tbody>
                
                <thead>
                    <tr class="text-black">
                    <th scope="col">JUEVES</th>
                    <th scope="col">VIERNES</th>
                    <th scope="col">SABADO</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td id="celdaJueves">Plazas disponibles: <p id="jueves"><?php echo $jueves?></p><button type="button" id="reservarJueves" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>
                    <td id="celdaViernes">Plazas disponibles: <p id="viernes"><?php echo $viernes?></p><button type="button" id="reservarViernes" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>
                    <td id="celdaSabado">Plazas disponibles: <p id="sabado"><?php echo $sabado?></p><button type="button" id="reservarSabado" class="btn btn-default fondomarron text-white mt-1">Reservar</button></td>

                  
                    </tr>
                    
                </tbody>
            </table>
        <div class="alert alert-success" id="respuestaAjax" style="display:none"></div>
        </div>
    </div>

  

     </div>

 </section>