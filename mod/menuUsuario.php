<?php
session_start();

//TO DO obtener tipo usuario por una variable de sesion.
$tipoUsuario=$_SESSION['tipoUsuario'];
$usuario = ucfirst($_SESSION["usuario"]);
//echo $tipoUsuario;
?>
               
               
               
               <div class="col-2" id="registro">
                    <?php
                    if(!isset($_SESSION['usuario'])){
                       echo '<div class="dropdown-toggle"><a href="acceso.php" id="signin"><i class="bi bi-person-fill"></i> Sign In</a></div>';

                    }else{
                     //echo   '<a href="#" id="bienvenido"><i class="bi bi-person-fill"></i>&nbsp'.$_SESSION["usuario"].'</a>';
                     // TO DO   crear un menu collapse con opcion cerrar sesion
                     if($tipoUsuario=="admin"){
                     echo '<div class="dropdown">';
                    // echo   '<a href="#" id="bienvenido" class="dropdown-toggle" ><i class="bi bi-person-fill"></i>&nbsp'.$_SESSION["usuario"].'</a>';

                    echo '<button class="btn btn-default dropdown-toggle" 
                                  type="button" 
                                  id="dropdownMenu2" 
                                  data-bs-toggle="dropdown" 
                                  style="color:white;"
                                  aria-expanded="false">
                                  <i class="bi bi-person-fill"></i>&nbsp'
                                  .$usuario.'
                          </button>';
                    echo<<<_INIT
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><button class="dropdown-item" type="button"><a href="listarUsuarios.php">Listar Usuarios</a></button></li>
                                    <li><button class="dropdown-item" type="button"><a href="listarAlumnos.php">Listar Alumnos</a></button></li>
                                    <li><button class="dropdown-item" type="button"><a href="inc/cerrarSesion.php">Cerrar Sesión</a></button></li>
                              </ul>
                        </div>
                    _INIT;
                     }
                     if($tipoUsuario=="usuario"){
                        echo '<div class="dropdown">';
                        // echo   '<a href="#" id="bienvenido" class="dropdown-toggle" ><i class="bi bi-person-fill"></i>&nbsp'.$_SESSION["usuario"].'</a>';
    
                        echo '<button class="btn btn-default dropdown-toggle" 
                                      type="button" 
                                      id="dropdownMenu2" 
                                      data-bs-toggle="dropdown" 
                                      style="color:white;"
                                      aria-expanded="false">
                                      <i class="bi bi-person-fill"></i>&nbsp'
                                      .$usuario.'
                              </button>';
                        echo<<<_INIT
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><button class="dropdown-item" type="button"><a href="verPedidos.php">           Ver pedidos       </a></button></li>
                                    <li><button class="dropdown-item" type="button"><a href="modificarUsuario.php">     Modificar datos   </a></button></li>
                                    <li><button class="dropdown-item" type="button"><a href="inc/cerrarSesion.php">     Cerrar Sesión     </a></button></li>
                              </ul>
                        </div>
                        _INIT;

                     }
                     
                    }
                     ?>
                </div>

            </div>