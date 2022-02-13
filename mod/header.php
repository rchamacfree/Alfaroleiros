     <header class="animate__animated animate__fadeIn">
        <div class="container pantallasGrandes">
            <div class="row">

                <div class="col-2" id="logo" style="margin-top:10px;
                                                    margin-left: -20px;
                                                    height:120px">
              
                <img src="img/alfaroleirosLogo2.png" alt="" height="100" width="120"> 
                
                   
              
                </div>

                <div class="col-7 text-center" id="nav">
                    <ul>
                        <li class="btn btn-default"><a href="index.php">INICIO</a></li>
                        <li class="btn btn-default"><a href="exposicion.php">EXPOSICION</a></li>
                        <li class="btn btn-default"><a href="#">CLASES</a></li>
                        <li class="btn btn-default"><a href="contacto.php">CONTACTO</a></li>   
                    </ul>
                </div>

                <?php include_once('menuUsuario.php'); ?>
           

           

            </div>
        </div>


 
<div class="container pantallasPequenas">
                <div class="row text-center">
                   <h2><a href="#">Alfaroleiros</a></h2>
                   <h5><a href="#">iniciar sesión</a></h5>                
                </div>

                <div class="row dropdown">
                        <button class="btn btn-default dropdown-toggle" style="color:white;" 
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" 
                                aria-expanded="false">
                            MENU
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item marron" href="index.php">INICIO</a></li>
                            <li><a class="dropdown-item marron" href="#exposicion">EXPOSICION</a></li>
                            <li><a class="dropdown-item marron" href="#">CLASES</a></li>
                            <li><a class="dropdown-item marron" href="#contacto">CONTACTO</a></li>
                        </ul>
                </div>

</div>


             
    </header>

    




