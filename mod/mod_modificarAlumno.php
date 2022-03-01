<?php
    include_once('inc/funciones.php');
    try{
        $conexion = new mysqli($hn,$un,$pw,$db);
        $comprobarUsuario=$conexion->query('SELECT * FROM alumnos WHERE id="'.$_GET["id"].'"');
        $registro = $comprobarUsuario->fetch_assoc();
        $id = $registro['id'];
        $nombre = $registro['nombre'];
        $apellidos = $registro['apellidos'];
        $telefono = $registro['telefono'];
        $email = $registro['email'];
        $diaClase = $registro['diaClase'];  
       

       

    }catch(exception $e){
        echo<<<_END
        <h4>Error de conexión. 
        Por favor vuelva a intentarlo.
        Si continúa teniendo este error envíe 
        un mensaje a admin@alfaroleiros.es. 
        Gracias</h4>
        _END;
        die('');

    }finally{
        $comprobarUsuario->close();
        $conexion->close();

    }
?>

<div class="container mt-5 mb-5">
    <div class="row"> 
         
        <div class="col-md-3">
             
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">MODIFICAR DATOS ALUMNO</h2>
                </div>
                <div class="card-body">
                    <form action="inc/incModificarAlumno.php" method="POST" id="formularioModificarAlumno">
                            
                            <input type="hidden" name="id" id="id" value=<?php echo $id ?>>        

                            <div class="form-group mt-3">
                                <label for="alumnoNombre">Nombre</label>
                                <input type="text" name="alumnoNombre" class="form-control" id="alumnoNombre" placeholder="Introduce tu nombre:" value="<?php echo $nombre ?>"required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoApellidos">Apellidos</label>
                                <input type="text" name="alumnoApellidos" class="form-control" id="alumnoApellidos" placeholder="Introduce tus apellidos" value="<?php echo $apellidos ?>"required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoTelefono">Teléfono</label>
                                <input type="text" name="alumnoTelefono" class="form-control" id="alumnoTelefono" placeholder="Teléfono (opcional)" value="<?php echo $telefono ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoEmail">Email:</label>
                                <div class="input-group mb-3">
                                        <input type="email" name="alumnoEmail" class="form-control" id="modificarEmail" 
                                             placeholder="Enter email" value="<?php echo $email ?>" required>
                                       <span class="input-group-text" id="alumnoEmailValido"></span>
                                 </div>
                                 <div id="alumno_mail_error" style="display:none;font-size:0.6em;color:red;">*Introduzca una dirección de correo válida</div>

                            </div>
                            <div class="form-group mt-3">
                            <label for="alumnoDiaClase">Día de Clase:</label>

                                <select class="form-select" aria-label="Default select example" id="alumnoDiaClase" name="alumnoDiaClase">
                                    <option value="lunes" <?php if($diaClase=="lunes")echo "selected";?> >Lunes</option>
                                    <option value="martes" <?php if($diaClase=="martes")echo "selected";?> >Martes</option>
                                    <option value="miercoles" <?php if($diaClase=="miercoles")echo "selected";?> >Miércoles</option>
                                    <option value="jueves" <?php if($diaClase=="jueves")echo "selected";?>  >Jueves</option>
                                    <option value="viernes" <?php if($diaClase=="viernes")echo "selected";?> >Viernes</option>
                                    <option value="sabado" <?php if($diaClase=="sabado")echo "selected";?>>Sábado</option>
                                </select>
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" id="btnAddAlumno" class="btn btn-primary">Modificar datos</button>
                                <a href="listarAlumnos.php" id="btnCancelar"  class="btn btn-primary">Volver</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
             
        </div>
    </div>
</div>

