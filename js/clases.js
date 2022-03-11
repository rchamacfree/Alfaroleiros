window.onload = () => {
tabla();
$('#reservarLunes').on('click',reservarLunes);
$('#reservarMartes').on('click',reservarMartes);
$('#reservarMiercoles').on('click',reservarMiercoles);
$('#reservarJueves').on('click',reservarJueves);
$('#reservarViernes').on('click',reservarViernes);
$('#reservarSabado').on('click',reservarSabado);

}






/**
 *                      FUNCION   TABLA
 *         Obtiene los valores de disponibilidad de las celdas
 *          Si la disponibilidad es 0 oculta el botón de reservar y establece el color de la celda a rojo
 *          Si la disponibilidad es mayor que 0 establece el color de la celda a verde
 * 
 */
function tabla(){
    
    let lunes       = parseInt($('#lunes').text());
    let martes      = parseInt($('#martes').text());
    let miercoles   = parseInt($('#miercoles').text());
    let jueves      = parseInt($('#jueves').text());
    let viernes     = parseInt($('#viernes').text());
    let sabado      = parseInt($('#sabado').text());

    
    if (lunes === 0){
        $('#celdaLunes').css("background-color","red");
        $('#reservarLunes').hide();
    }else  $('#celdaLunes').css("background-color","green");

    if (martes === 0){
        $('#celdaMartes').css("background-color","red");
        $('#reservarMartes').hide();
    }else  $('#celdaMartes').css("background-color","green");

    if (miercoles === 0){
        $('#celdaMiercoles').css("background-color","red");
        $('#reservarMiercoles').hide();
    }else  $('#celdaMiercoles').css("background-color","green");

    if (jueves === 0){
        $('#celdaJueves').css("background-color","red");
        $('#reservarJueves').hide();
    }else  $('#celdaJueves').css("background-color","green");

    if (viernes === 0){
        $('#celdaViernes').css("background-color","red");
        $('#reservarViernes').hide();
    }else  $('#celdaViernes').css("background-color","green");

    if (sabado === 0){
        $('#celdaSabado').css("background-color","red");
        $('#reservarSabado').hide();
    }else  $('#celdaSabado').css("background-color","green");

}


/**
 *                      FUNCION RESERVARLUNES || MARTES || MIERCOLES || JUEVES || VIERNES || SABADO
 * 
 *          Dependiendo el botón pulsado asignamos a la variable 'dia' el día correspondiente y 
 *          llamamos a la funcion reservarDia pasando el valor
 */
function reservarLunes(){
    let dia='lunes';
    reservarDia(dia);
}
function reservarMartes(){
    let dia='martes';
    reservarDia(dia);
}
function reservarMiercoles(){
    let dia='miercoles';
    reservarDia(dia);
}
function reservarJueves(){
    let dia='jueves';
    reservarDia(dia);
}
function reservarViernes(){
    let dia='viernes';
    reservarDia(dia);
}
function reservarSabado(){
    let dia='sabado';
    reservarDia(dia);
}



/**
 * 
 *                  FUNCION RESERVARDIA 
 *  
 * Petición ajax a reservarDia.php pasamos el dia de clase
 * 
 */
function reservarDia(val){
    let dia = val;
   //console.log(`Dia reservado: ${dia}`);
    $.ajax({
        method: "POST",
        url: "inc/reservarDia.php",
        data: { diaClase : dia }
    }).done(resp=>{
       
        $('#respuestaAjax').css("display","block").html(resp);
        
        if(resp=='Clase reservada correctamente'){
        switch (dia) {
            case 'lunes':
              let plazasl = parseInt($('#lunes').text());
              plazasl--;
              $('#lunes').text(plazasl);
              break;
            case 'martes':
                let plazasm = parseInt($('#martes').text());
                plazasm--;
                $('#martes').text(plazasm);
              break;
              case 'miercoles':
                let plazasx = parseInt($('#miercoles').text());
                plazasx--;
                $('#miercoles').text(plazasx);
                break;
            case 'jueves':
                let plazasj = parseInt($('#jueves').text());
                plazasj--;
                $('#jueves').text(plazasj);
                    break;
            case 'viernes':
                let plazasv = parseInt($('#viernes').text());
                plazasv--;
                 $('#viernes').text(plazasv);
                 break;
            case 'sabado':
                let plazass = parseInt($('#sabado').text());
                plazass--;
                $('#sabado').text(plazass);
                break;
        }
        }        
    })
}