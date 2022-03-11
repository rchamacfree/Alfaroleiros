<div class="container mt-5 mb-5 " style="min-height:450px">
            <div class="row"> 
                 
                <div class="col-sm-4">
                     
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">FORMULARIO DE ACCESO</h2>
                        </div>
                        <div class="card-body">
                            <form action="inc/usuarioActivo.php" method="POST">
                                    <div class="form-group mt-3">
                                        <label for="accesoInputEmail">Email:</label>
                                        <input type="email" name="email" class="form-control" id="accesoInputEmail" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="accesoInputPassword">Password:</label>
                                        <input type="password" name="pass" class="form-control" id="accesoInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group mt-5">
                                        <button type="submit" id="btnAcceder" class="btn btn-primary">Acceder</button>
                                        <button type="reset" id="btnCancelar"  class="btn btn-primary">Cancelar</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <p>Acceder al <a href="registro.php">Registro</a></p>
                </div>
                <div class="col-sm-4">
                     
                </div>
            </div>
        </div>


