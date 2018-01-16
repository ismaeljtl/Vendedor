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
        
        <div class="container text-center">
            <h1>Status de compras Realizadas:</h1>
            
            <table style="width:100%">
                <tr>
                    <th>Fecha</th>
                    <th>Monto</th> 
                    <th>Cantidad de camisas</th>
                    <th>Cantidad de pantalones</th>
                    <th>Estado de la transacción</th>
                </tr>
                @foreach ($datos as $dato)
                <tr>
                    <td>{{$dato->fecha}}</td>
                    <td>{{$dato->monto}}</td> 
                    <td>{{$dato->cantCamisa}}</td>
                    <td>{{$dato->cantPantalon}}</td>
                    <td>{{$dato->estatusTransaccion}}</td>
                </tr>
                @endforeach
            </table>
            <br/>
            <a href="{{url('volverProd')}}">Regresar</a>
        </div>

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
