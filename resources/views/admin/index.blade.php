<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <title>Thambwe Admin</title>
</head>
<body>
    <div class="topmenu">
        <h4>Thambwe</h4>
        <div class="">
            <i class="fas fa-user-circle" aria-hidden="true"></i>
            <i class="fas fa-power-off" aria-hidden="true"></i>
        </div>
    </div>
    <div class="control">
        <div class="ladoMenu">
            <div class="dash">
                <h4>Navegação</h4>
            </div>
            <div>
                <ul class="menus">
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li><a href="{{route('musica')}}">Musicas</a></li>
                    <li><a href="{{route('video')}}">Vidoes</a></li>
                    <li><a href="{{route('galeria')}}">Galeria</a></li>
                    <li><a href="{{route('musico')}}">Artista</a></li>
                </ul>
            </div>
        </div>
        <div class="conteudo">
            @yield('thamb')
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>