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
    @if(Auth::check())
        <div class="col-sm-12 heading">
            <div class="col-sm-6">
                <h4>Bienvenido {{ Auth::user()->usuario }}!</h4>
            </div>
            <div class="col-sm-6 text-right">
                <form class="form-signin" method="GET" action="Logout">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary salir">Salir</button>
                </form>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row text-center">
            <div>
                <h1 class="titulo">Productos ofertados</h1>
                <br/>
            </div>
            <div class="col-sm-6 container-producto">
                <img class="producto" src="{{url('assets/img/camisa.jpg')}}" alt="camisa">
                <br/>
                <button type="button" class="btn btn-info">Comprame</button>
            </div>
            <div class="col-sm-6 container-producto">
                <img class="producto" src="{{url('assets/img/pantalon.jpg')}}" alt="pantalon">
                <br/>
                <button type="button" class="btn btn-info">Comprame</button>
            </div>
        </div>
    </div>



        <!-- jQuery -->
        <script src="{{url('assets/js/jquery.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    </body>
</html>
