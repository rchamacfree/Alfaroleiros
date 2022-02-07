console.log("enlace proyecto.js");

$('#prueba').html("prueba");

$('#selectorAlumno').change(mostrar());
$('#formularioContacto').submit(enviarMail());

function mostrar(){

    $.ajax({
             method: "POST",
             url: "mod/imagen.php",
             data: { id: $("#selectorAlumno").val() }
            }).done(resp =>{
              $('#pruea').html(resp);
            })

            
          };

function comprobar(){

   $.ajax({
      method: "POST",
      url: "inc/comprobarEmail.php",
      data: { email: $("#registroInputEmail").val()}

    }).done(resp =>{
     $("#valido").html(resp);
     
    })

  };

//$('#btnRegistrar').click(comprobarPassIguales());
//$('#registroInputPasswordRepeat').blur(comprobarPassIguales());
function comprobarPassIguales(){
  console.log('pulsado Registrar');
  email=$('#registroInputEmail').val();
  pass1=$('#registroInputPassword').val();
  pass2=$('#registroInputPasswordRepeat').val();
  if(pass1!==pass2){
    $('#registroInputPasswordRepeat').val("");
    $('#msgError').show();
  }else  $('#msgError').hide();

  console.log(pass1,pass2,email);
}



//TO DO ajax a contacto.php y aviso al usuario de success o error
function enviarMail(){
$('#mensajeEnviado').css('display','block');
setTimeout(function(){$('#mensajeEnviado').css('display','none');},2000);
}





