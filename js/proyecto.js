console.log("enlace proyecto.js");



window.onload = ()=> {
  mostrarObras(); //Cargar por primera vez la zona de exposición
  document.getElementById("selectorAlumno").addEventListener("change",mostrarObras);
  

}   



function mostrarObras(){
  console.log("mostrarObras");
  var id = $("#selectorAlumno").val();
  console.log(`valor id:  ${id}`);

    $.ajax({
             method: "POST",
             url: "mod/mostrarObras.php",
             data: { id: id }
            }).done(resp =>{
              $('#pruea').html(resp);
            })

            
          };


function reservarObra(idObra,idUsuario){
  //TO DO  actualmente estoy recibiendo el id del alumno tiene que ser del usuario 
  // modificar el script reservarObra.php para que use la variable de sesion usuario.


         $.ajax({
                 method: "POST",
                 url: "inc/reservarObra.php",
                 data: {id: idObra}
                 }).done(resp =>{
                      console.log('obra reservada por: '+idUsuario);
                      alert('Obra reservada por: '+idUsuario+' el escript enviará un mail al administrador para que prepare la obra para su recogida y un mail al usuario confirmando la reserva.');
                      mostrarObras();
                 })
           
                       
  }     


