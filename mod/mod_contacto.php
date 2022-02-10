<h2 class="text-center marron fs-1" style="margin-top:40px;">Contacto</h2>


<section id="contacto">
    <div class="container">


        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id="columnacontacto">
               
            
            <!-- INICIO FORMULARIO HTML
                podemos validar los campos en php con filter_var
            -->
            <form method="POST" action="#" id="formularioContacto" class="needs-validation">
                <div class="mb-3">
                    <label for="validarNombre" class="marron">Nombre:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="validarNombre" name="validarNombre" required>    
                </div>
                <div class="mb-3">
                    <label for="validarApellidos" class="marron">Apellidos:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="validarApellidos" name="validarApellidos" required>
                </div>
                <div class="mb-3">
                    <label for="validarEmail" class="marron">Email:<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="validarEmail" name="validarEmail" required>
                </div>
                
                <div class="mb-3">
                    <label for="validarAsunto" class="marron">Asunto:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="validarAsunto" name="validarAsunto" required>
                </div>

                <label for="validarMensaje" class="marron">Mensaje:<span class="text-danger">*</span></label>
                <textarea class="form-control mb-3" id="validarMensaje" name="validarMensaje" rows="3" min="25" required></textarea>

                <div class="text-end">
                <button class="btn fondomarron text-white text-end mb-3" type="submit" name="submit">Enviar</button>
                <button class="btn fondomarron text-white mb-3" type="reset" name="reset">Cancelar</button>
                </div>
               <!-- cambiamos el attr display según el resultado del envío--> 
                 <div class="mensaje">
                     <div class="alert alert-primary" id="mensajeEnviado"   style="display:none">mensaje enviado</div>
                     <div class="alert alert-danger"  id="mensajeNoEnviado" style="display:none">El mensaje no se pudo enviar</p>
                </div>
            </form>
 
            </div>
            <div class="col-sm-3"></div>


        </div>

    
    </div>
</section>