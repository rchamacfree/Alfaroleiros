
/**
 * Recibimos el id de la obra a borrar y llamamos vía ajax al script borrarObra.php
 *  
 */

    function borrarObra(id){
        console.log("pulsado botón borrar obra");
        console.log("id Obra : "+ id);
        
        $.ajax({
            method: "POST",
            url: "inc/borrarObra.php",
            data: { id: id  }
        }).done(resp=>{
            $('#borrarObra').css("display","block");
        })       
    }
