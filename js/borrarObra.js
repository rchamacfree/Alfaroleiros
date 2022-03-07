

    function borrarObra(id){
        console.log("pulsado botón borrar obra");
        console.log("id Obra : "+ id);
        
        $.ajax({
            method: "POST",
            url: "inc/borrarObra.php",
            data: { id: id  }
        }).done(resp =>{
            $('#borrarObra').html("Obra Borrada");

        })       
    }
