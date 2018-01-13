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
        <form class="form-signin" method="POST" action="desbloquearUsuario">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="form-signin-heading text-center">Responde a las preguntas</h2>
            <br/>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label class="pregunta">ID</label>
                </div>
                <div class="col-sm-10">
                <input type="text" name="id" id="id" class="form-control" value="{{$preguntas[0]->id}}" required autofocus disabled>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label class="pregunta">{{$preguntas[0]->pregunta1}}</label>
                </div>
                <div class="col-sm-10">
                <input type="text" name="respuesta1" id="respuesta1" class="form-control" placeholder="Respuesta a la pregunta" required autofocus>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label class="pregunta">{{$preguntas[0]->pregunta2}}</label>
                </div>
                <div class="col-sm-10">
                <input type="text" name="respuesta2" id="respuesta2" class="form-control" placeholder="Respuesta a la pregunta" required autofocus>
                </div>
            </div><div class="col-sm-12">
                <div class="col-sm-2">
                    <label class="pregunta">{{$preguntas[0]->pregunta3}}</label>
                </div>
                <div class="col-sm-10">
                <input type="text" name="respuesta3" id="respuesta3" class="form-control" placeholder="Respuesta a la pregunta" required autofocus>
                </div>
            </div> 

            <button class="btn btn-lg btn-primary btn-block" id="desbloquear" type="submit">Desbloquear</button>
            <br/>
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
