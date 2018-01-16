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
    $("#registrar").click(function(){
        $("#contraseña").val( objectHash.sha1($("#contraseña").val()) );
        $("#respuesta-1").val( objectHash.sha1($("#respuesta-1").val()) );
        $("#respuesta-2").val( objectHash.sha1($("#respuesta-2").val()) );
        $("#respuesta-3").val( objectHash.sha1($("#respuesta-3").val()) );
    });


    //Logueo
    $("#usuario-index").keyup(function(){
        bloqueaUsuario();
    });
    
    $("#inicia-sesion").click(function(){
        $("#contraseña").val( objectHash.sha1($("#contraseña").val()) );
    });


    //Productos
    $("#check-camisa").click(function(){
        if ($(this).prop('checked')){
            $("#cantidad-camisa").prop('disabled', false);
        }
        else{
            $("#cantidad-camisa").prop('disabled', true);
        }
    }); 

    $("#check-pantalon").click(function(){
        if ($(this).prop('checked')){
            $("#cantidad-pantalon").prop('disabled', false);
        }
        else{
            $("#cantidad-pantalon").prop('disabled', true);
        }
    }); 


    //Desbloqueo
    $("#desbloquear").click(function(){
        $('#id').prop('disabled', false);
        $("#respuesta1").val( objectHash.sha1($("#respuesta1").val()) );
        $("#respuesta2").val( objectHash.sha1($("#respuesta2").val()) );
        $("#respuesta3").val( objectHash.sha1($("#respuesta3").val()) );
    });


    //Envio de datos de la tarjeta
    $("#pagar").click(function(){
        getStatus();
    });

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

function bloqueaUsuario(){
    $.ajax({
        // la URL para la petición
        url: 'getUserData',
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
                if (data[i]['usuario'] == $("#usuario-index").val()){
                    if (data[i]['intentos'] == 3){
                        //$("#mensaje").text("El usuario esta bloqueado");
                        $("#inicia-sesion").prop('disabled', true);
                    }
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


// Metodo ajax que se encarga de guardar la transaccion en la BD con estatus en proceso
function getStatus(){
    $.ajax({
        // la URL para la petición
        url: 'getStatus',
        // especifica si será una petición POST o GET
        type: 'POST',
        // la información a enviar
        data: {'_token': $('input[name=_token]').val() },
        // el tipo de información que se espera de respuesta
        dataType: 'json',   
        before: function() {
            //
        },     
        success: function(data) {
            //envioDatos();
            
            var obj = { 
                'numero_tarjeta' : $('#numero-tarjeta').val(), 
                'cvv' : $('#cvv').val(),
                'nombre_tarjetahabiente' : $('#tarjetahabiente').val(),
                'fecha_vencimiento_mes' : $('#mes').val(),
                'fecha_vencimiento_año' : $('#año').val(),
                'identificacion' : $('#cedula').val(),
                'monto' : data[0]['monto'],
                'id_vendedor': 1,
                'direccion_respuesta' : 'http://vendedor.seg/',
                'id_transaccion' : data[0]['idTransaccion']
            };
            var myJSON = JSON.stringify(obj);

            envioDatos(myJSON);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

// Metodo ajax que se encarga de enviar la tarjeta
function envioDatos(myJSON){
    $.ajax({
        // la URL para la petición
        url: 'bancocliente.seg/comprar',
        // especifica si será una petición POST o GET
        type: 'post',
        // la información a enviar
        data: myJSON,
        // el tipo de información que se espera de respuesta
        dataType: 'json', 
        contentType: 'application/json; charset=utf-8',  
        before: function() {
            //
        },     
        success: function(data) {
            console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}