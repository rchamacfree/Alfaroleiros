<div class="container mt-5 mb-5">
    <div class="row"> 
         
        <div class="col-md-3">
             
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">FORMULARIO DE REGISTRO</h2>
                </div>
                <div class="card-body">
                    <form action="inc/registrarUsuario.php" method="POST" id="formularioRegistro">
                            <div class="form-group mt-3">
                                <label for="registroInputEmail">Email:</label>
                                <div class="input-group mb-3">
                                        <input type="email" name="registroInputEmail" class="form-control" id="registroInputEmail" 
                                             placeholder="Enter email" required>
                                       <span class="input-group-text" id="valido"></span>
                                 </div>
                                 <div id="mail_error" style="display:none;font-size:0.6em;color:red;">*Introduzca una dirección de correo válida</div>

                            </div>
                            <div class="form-group mt-3">
                                <label for="registroInputPassword">Password:</label>
                                <input type="password" name="registroInputPassword" class="form-control" id="registroInputPassword" minlength="6" placeholder="Password" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="registroInputPasswordRepeat">Confirmar Password:</label>
                                <input type="password" name="registroInputPasswordRepeat" class="form-control"  
                                        id="registroInputPasswordRepeat" minlength="6" placeholder="Password" required>
                                <div id="msgError" style="display:none;font-size:0.6em;color:red;">*Las contraseñas tienen que ser iguales</div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="registroNombre">Nombre</label>
                                <input type="text" name="registroNombre" class="form-control" id="registroNombre" placeholder="Introduce tu nombre:" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="registroApellidos">Apellidos</label>
                                <input type="text" name="registroApellidos" class="form-control" id="registroApellidos" placeholder="Introduce tus apellidos" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="registroTelefono">Teléfono</label>
                                <input type="text" name="registroTelefono" class="form-control" id="registroTelefono" placeholder="Teléfono (opcional)">
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" id="btnRegistrar" class="btn btn-primary">Registrar</button>
                                <button type="reset" id="btnCancelar"  class="btn btn-primary">Cancelar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
             
        </div>
    </div>
</div>

