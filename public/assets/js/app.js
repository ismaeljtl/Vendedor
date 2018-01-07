$(document).ready(function(){

    //uso de object_hash: var hash = objectHash.sha1("hola"); 
  
    //Registro
    getUsuarios();

    $("#usuario").keyup(function(){
        getUsuarios();
        
    });

    $("#repetir-contraseña").keyup(function(){
        validaclaves($("#contraseña").val(), $("#repetir-contraseña").val());
    });

    $("#respuesta-1").keyup(function(){
        validaRespuesta($("#respuesta-1").val());
    });

    $("#respuesta-2").keyup(function(){
        validaRespuesta($("#respuesta-2").val());
    });

    $("#respuesta-3").keyup(function(){
        validaRespuesta($("#respuesta-3").val());
    });
    
    //Antes de enviar los datos al servidor los hasheo
    /*$("#registrar").click(function(){
        $("#contraseña").val( objectHash.sha1($("#contraseña").val()) );
        $("#respuesta-1").val( objectHash.sha1($("#respuesta-1").val()) );
        $("#respuesta-2").val( objectHash.sha1($("#respuesta-2").val()) );
        $("#respuesta-3").val( objectHash.sha1($("#respuesta-3").val()) );
    });


    //Logueo
    /*$("#inicia-sesion").click(function(){
        $("#contraseña").val( objectHash.sha1($("#contraseña").val()) );
    });*/
});

function validaUsuario (user){
    var regexUsuario = /^(?=.*[0-9])[A-Za-z0-9]{4,16}$/g;
    if (regexUsuario.test(user) != true){
        $("#mensaje").text("El nombre de usuario debe tener una longitud entre 4 y 16 caracteres alfanuméricos");
        $("#registrar").prop('disabled', true);
    }
    else{
        $("#mensaje").text(" ");
        $("#registrar").prop('disabled', false);
    }
}

function validaclaves (clave1, clave2){
    var regexClave = /^(?=.*[A-Z])(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,16}$/g;

    if (clave1 == clave2){
        if (regexClave.test(clave1) != true){
            $("#mensaje").text("La contraseña debe ser de una longitud entre 8 y 16 caracteres con al menos un carácter no alfa numérico y una letra mayúscula");
            $("#registrar").prop('disabled', true);
        }
        else{
            $("#mensaje").text(" ");
            $("#registrar").prop('disabled', false);
        }
    }
    else{
        $("#mensaje").text("Las contraseñas no coinciden");
        $("#registrar").prop('disabled', true);
    }
}

//Respuestas secretas
function validaRespuesta (resp){
    var regexUsuario = /^[a-z]{1,}$/g;
    console.log();

    if (regexUsuario.test(resp) == true){
        $("#mensaje").text(" ");
        $("#registrar").prop('disabled', false);
    }
    else {
        $("#mensaje").text("La respuesta secreta debe ir en minúsculas");
        $("#registrar").prop('disabled', true);
    }
}

function getUsuarios(){
    $.ajax({
        // la URL para la petición
        url: 'getUser',
        // especifica si será una petición POST o GET
        type: 'get',
        // la información a enviar
        data: {'_token': $('input[name=_token]').val() },
        // el tipo de información que se espera de respuesta
        dataType: 'json',   
        before: function() {
            //
        },     
        success: function(data) {
            for (var i=0; i<data.length; i++){
                if (data[i].usuario == $("#usuario").val()){
                    $("#mensaje").text("El nombre de usuario ya está en uso");
                    $("#registrar").prop('disabled', true);
                }
                else{
                    validaUsuario($("#usuario").val());
                }
            }            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}