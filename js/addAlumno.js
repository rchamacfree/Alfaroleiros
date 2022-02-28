window.onload = () =>{
    document.getElementById("alumnoEmail").addEventListener("blur",comprobarMailAlumno);
    
    }  
    
    function comprobarMailAlumno(){

        let expMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
        if (!expMail.test($("#alumnoEmail").val().trim())) {
            $('#alumno_mail_error').show();
            $('#alumnoEmail').val("");
         }else {
                  $('#alumno_mail_error').hide();
                  $.ajax({
                    method: "POST",
                    url: "inc/comprobarEmailAlumno.php",
                    data: { email: $("#alumnoEmail").val()}
              
                  }).done(resp =>{
                    $("#alumnoEmailValido").html(resp);
                  })
          }
        }