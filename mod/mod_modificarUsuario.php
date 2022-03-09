<?php
/*********************************************************************************
 *        MOD_MODIFICARUSUARIO
 * 
 * variables:
 *      $_SESSION['idUsuario'] - El id del usuario activo
 *      $_SESSION['usuario'] - El nombre del usuario activo
 *********************************************************************************/
include_once('inc/funciones.php');
$idUsuario = $_SESSION['idUsuario'];
$nombreUsuario = $_SESSION['usuario'];


try{
    $conexion = new mysqli($hn,$un,$pw,$db);
    $comprobarUsuario=$conexion->query('SELECT * FROM usuarios WHERE id="'.$idUsuario.'"');
    $registro = $comprobarUsuario->fetch_assoc();
    $id = $registro['id'];
    $nombre = ucfirst($registro['nombre']);
    $apellidos = ucwords($registro['apellidos']);
    $telefono = $registro['telefono'];
    $email = $registro['email'];
    $tipoUsuario = $registro['tipoUsuario'];
    $pass = sha1($pass);
   

   

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

<section>
<div class="container mt-5 mb-5">
    <div class="row"> 
         
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center marron">MODIFICAR DATOS USUARIO</h2>
                </div>
                <div class="card-body">
                    <form action="inc/incModificarUsuario.php" method="POST" id="formularioModificarUsuario">
                            
                            <input type="hidden" name="id" id="id" value=<?php echo $idUsuario ?>>        

                            <div class="form-group mt-3">
                                <label for="usuarioNombre">Nombre</label>
                                <input type="text" name="usuarioNombre" class="form-control" id="usuarioNombre" placeholder="Introduce tu nombre:" value="<?php echo $nombre ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="usuarioApellidos">Apellidos</label>
                                <input type="text" name="usuarioApellidos" class="form-control" id="usuarioApellidos" placeholder="Introduce tus apellidos" value="<?php echo $apellidos ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="usuarioTelefono">Teléfono</label>
                                <input type="text" name="usuarioTelefono" class="form-control" id="usuarioTelefono" placeholder="Teléfono (opcional)" value="<?php echo $telefono ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="usuarioEmail">Email:</label>
                                <div class="input-group mb-3">
                                        <input type="email" name="usuarioEmail" class="form-control" id="modificarEmailUsuario" 
                                             placeholder="Enter email" value="<?php echo $email ?>" required>
                                       <span class="input-group-text" id="usuarioEmailValido"></span>
                                 </div>
                                 <div id="alumno_mail_error" style="display:none;font-size:0.6em;color:red;">*Introduzca una dirección de correo válida</div>

                            </div>
                            <div class="form-group mt-3">
                            
                            <div class="form-group mt-5 text-end">
                                <button type="submit" id="btnModificarUsuario" class="btn btn-default fondomarron text-white">Modificar datos</button>
                                <a href="inicio.php" id="btnCancelar"  class="btn btn-default fondomarron text-white">Volver</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</section>
