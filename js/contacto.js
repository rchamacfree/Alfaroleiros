window.onload = () =>{
    document.getElementById("enviar").addEventListener("click",enviarMail);

    }

function enviarMail(){
   /* console.log('enviarMail pulsado');
    console.log($("#validarEmail").val());
    console.log($("#validarNombre").val());
    console.log($("#validarApellidos").val());
    console.log($("#validarAsunto").val());
    console.log($("#validarMensaje").val());*/

  /*  $('#mensajeEnviado').css('display','block');
    setTimeout(function(){
        $('#mensajeEnviado').css('display','none');
        
    },2000);*/

    $.ajax({
        method: "POST",
        url: "inc/msgcontacto.php",
        data: { email: $("#validarEmail").val(),
                nombre: $("#validarNombre").val(),
                apellidos: $("#validarApellidos").val(),
                asunto: $("#validarAsunto").val(),
                mensaje: $("#validarMensaje").val()
               }
         }).done(resp=>{
            $('#mensajeEnviado').css('display','block');
            setTimeout(function(){$('#mensajeEnviado').css('display','none');},4000);
            
         })
    

      
    
}