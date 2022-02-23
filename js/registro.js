window.onload = () =>{
document.getElementById("registroInputEmail").addEventListener("blur",comprobar);
document.getElementById("registroInputPasswordRepeat").addEventListener("blur",comprobarPassIguales);

}

/*      COMPROBAR
Al perder el foco el input email hacemos una comprobación de que sea un email válido y en
ese caso hacemos una comprobación ajax de que no esté ya registrado.
*/

  function comprobar(){

    let expMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if (!expMail.test($("#registroInputEmail").val().trim())) {
        $('#mail_error').show();
        $('#registroInputEmail').val("");
     }else {
              $('#mail_error').hide();
              $.ajax({
                method: "POST",
                url: "inc/comprobarEmail.php",
                data: { email: $("#registroInputEmail").val()}
          
              }).done(resp =>{
                $("#valido").html(resp);
              })
      }
    }



   function comprobarPassIguales(){
    email=$('#registroInputEmail').val();
    pass1=$('#registroInputPassword').val();
    pass2=$('#registroInputPasswordRepeat').val();
    if(pass1!==pass2){
      $('#registroInputPasswordRepeat').val("");
      $('#msgError').show();
    }else  $('#msgError').hide();
  }
  