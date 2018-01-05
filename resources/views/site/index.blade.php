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
        <form class="form-signin">
            <h2 class="form-signin-heading text-center">Ingresar a la aplicación</h2>
            <br/>
            <input type="email" id="usuario" class="form-control" placeholder="Nombre de usuario" required autofocus>
            <input type="password" id="contraseña" class="form-control" placeholder="Contraseña" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
            
            <br/>
            <div class="col-sm-12 text-center">
                <a href="{{url('registro')}}">¿No posees una cuenta? Regístrate aquí</a>
            </div>
        </form>
    </div> <!-- /container -->


        <!-- jQuery -->
        <script src="{{url('assets/js/jquery.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    </body>
</html>
