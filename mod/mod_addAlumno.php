<div class="container mt-5 mb-5">
    <div class="row"> 
         
        <div class="col-md-3">
             
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">AÑADIR ALUMNO</h2>
                </div>
                <div class="card-body">
                    <form action="inc/registrarAlumno.php" method="POST" id="formularioRegistroAlumno">
                            
                            
                            <div class="form-group mt-3">
                                <label for="alumnoNombre">Nombre</label>
                                <input type="text" name="alumnoNombre" class="form-control" id="alumnoNombre" placeholder="Introduce tu nombre:" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoApellidos">Apellidos</label>
                                <input type="text" name="alumnoApellidos" class="form-control" id="alumnoApellidos" placeholder="Introduce tus apellidos" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoTelefono">Teléfono</label>
                                <input type="text" name="alumnoTelefono" class="form-control" id="alumnoTelefono" placeholder="Teléfono (opcional)">
                            </div>
                            <div class="form-group mt-3">
                                <label for="alumnoEmail">Email:</label>
                                <div class="input-group mb-3">
                                        <input type="email" name="alumnoEmail" class="form-control" id="alumnoEmail" 
                                             placeholder="Enter email" required>
                                       <span class="input-group-text" id="alumnoEmailValido"></span>
                                 </div>
                                 <div id="alumno_mail_error" style="display:none;font-size:0.6em;color:red;">*Introduzca una dirección de correo válida</div>

                            </div>
                            <div class="form-group mt-3">
                            <label for="alumnoDiaClase">Día de Clase:</label>

                                <select class="form-select" aria-label="Default select example" id="alumnoDiaClase" name="alumnoDiaClase">
                                    <option value="lunes" selected>Lunes</option>
                                    <option value="martes">Martes</option>
                                    <option value="miercoles">Miércoles</option>
                                    <option value="jueves">Jueves</option>
                                    <option value="viernes">Viernes</option>
                                    <option value="sabado">Sábado</option>
                                </select>
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" id="btnAddAlumno" class="btn btn-primary">Registrar</button>
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

