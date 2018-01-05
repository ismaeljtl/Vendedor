<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <title>Vendedor</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{url('assets/css/app.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>
    <body>

    <div class="container container-login col-sm-offset-4 col-sm-4">
        <form class="form-signin" method="POST" action="registrar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="form-signin-heading text-center">Regístrate</h2>
            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Nombre de usuario" required autofocus>
            <input type="password" name="contraseña" class="form-control" id="contraseña" placeholder="Contraseña" required autofocus>
            <input type="password" name="repetir-contraseña" class="form-control" id="repetir-contraseña" placeholder="Repite la contraseña" >
            <input type="text" name="pregunta-1" class="form-control" id="pregunta-1" placeholder="Pregunta de seguridad n° 1" required autofocus>
            <input type="text" name="respuesta-1" class="form-control" id="respuesta-1" placeholder="Respuesta de seguridad n° 1" required autofocus>
            <input type="text" name="pregunta-2" class="form-control" id="pregunta-2" placeholder="Pregunta de seguridad n° 2" required autofocus>
            <input type="text" name="respuesta-2" class="form-control" id="respuesta-2" placeholder="Respuesta de seguridad n° 2" required autofocus>
            <input type="text" name="pregunta-3" class="form-control" id="pregunta-3" placeholder="Pregunta de seguridad n° 3" required autofocus>
            <input type="text" name="respuesta-3" class="form-control" id="respuesta-3" placeholder="Respuesta de seguridad n° 3" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" id="registrar" type="submit">Registrar</button>
            <br/>
            <label id="mensaje" class="mensaje"></label>
            <div class="col-sm-12 text-center">
                <a href="..">Regresar</a>
            </div>
            
        </form>
    </div> <!-- /container -->


        <!-- jQuery -->
        <script src="{{url('assets/js/jquery.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{url('assets/js/app.js')}}"></script>
        <!-- Libreria para hash -->
        <!-- https://github.com/puleos/object-hash -->
        <script src="{{url('assets/js/object_hash.js')}}"></script>
    </body>
</html>
