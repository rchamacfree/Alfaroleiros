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