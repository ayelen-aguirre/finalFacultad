<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="C:\laragon\www\final\public\img\logo.png" type="image/icon type">
    <title>ISFT N°38</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">    
        <a href="{{ route('materia.index') }}">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('img/logo.png')}}" class="logo"  width="60px" height="95px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                @auth
                    <li><a class="nav-link" href="{{ route('carrera.index')}}"> Carreras </a></li>
                    <li><a class="nav-link" href="{{ route('materia.index')}}"> Materias </a></li>                    
                    <li><a class="nav-link" href="{{ route('examen.index')}}"> Exámenes </a></li>
                    <li><a class="nav-link" href="{{ route('usuario.index')}}"> Usuarios </a></li> 
                    <div class="dropdown-divider"></div>
                @endguest
            </ul>
            <ul class="navbar-nav ml-auto mr-3">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> Iniciar sesión </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"> Registarse </a>
                        </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                               Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <section>
        <div class="">
            <div class="container">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </section>
    <footer class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">    
            <div class="col-md-6 col-xs-12 text-center mx-auto">
                <ul style="list-style-type: none; color:aliceblue;">
                  <li><strong>Sede Central San Nicolás</strong></li>
                  <li><strong>Av. Central  1825</strong></li>
                  <li><strong>©2023 - ISFT 38 - Análisis de Sistemas<strong></li>
                </ul>
            </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/964e75bf64.js" crossorigin="anonymous"></script>
</body>

</html>
