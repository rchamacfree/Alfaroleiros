window.onload = () =>{
    document.getElementById("modificarEmailUsuario").addEventListener("blur",comprobarMailmodificar);
    document.getElementById("usuarioTelefono").addEventListener("blur",comprobarTelefono);

    }  


    function comprobarTelefono(){
      let telefono = document.getElementById("usuarioTelefono").value;
                let patron = /^\d{9}$/;
                if (!telefono.match(patron))
                    $('#usuarioTelefono').val('');


    }

    function comprobarMailmodificar(){
        //console.log ('comporbarMailmodificar');

        let expMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  
      
          if (!expMail.test($("#modificarEmailUsuario").val().trim())) {
              $('#alumno_mail_error').show();
              $('#usuarioEmail').val("");
           }else {
                    $('#alumno_mail_error').hide();
                    $.ajax({
                      method: "POST",
                      url: "inc/comprobarEmail.php",
                      data: { email: $("#modificarEmailUsuario").val()}
                
                    }).done(resp =>{
                      $("#usuarioEmailValido").html(resp);
                    })
            }
          }