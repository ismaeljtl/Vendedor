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
    <div class="container container-login col-sm-offset-4 col-sm-4 text-center">
        <h1>Confirme su compra</h1>
        <form class="form-signin" method="get" action="enviarTarjeta">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="tarjetahabiente" id="tarjetahabiente" class="form-control" placeholder="tarjetahabiente" required autofocus>
            <input type="password" name="cvv" id="cvv" class="form-control" placeholder="CVV" required autofocus>
            <input type="number" name="numero-tarjeta" id="numero-tarjeta" class="form-control" placeholder="Numero de tarjeta" required autofocus>
            <select class="form-control" name="mes">
                <option>Enero</option>       
                <option>Febrero</option>       
                <option>Marzo</option>       
                <option>Abril</option>       
                <option>Mayo</option>       
                <option>Junio</option>       
                <option>Julio</option>       
                <option>Agosto</option>       
                <option>Septiembre</option>       
                <option>Octubre</option>       
                <option>Noviembre</option>       
                <option>Diciembre</option> 
            </select>
            <input type="number" name="año" id="año" class="form-control" placeholder="Año" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" id="pagar" type="submit">Pagar</button>
        </form>
        
        <a href="{{url('volverProd')}}">Regresar</a>

        <!-- jQuery -->
        <script src="{{url('assets/js/jquery.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{url('assets/js/app.js')}}"></script>
    </body>
</html>
