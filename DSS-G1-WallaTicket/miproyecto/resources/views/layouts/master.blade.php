<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        .navbar-logo {
            max-height: 80px; /* Define el tamaño máximo de la imagen */
            object-fit: contain; /* Escala la imagen para que se ajuste al tamaño máximo sin deformarse */
        }        
    </style>    
    <!DOCTYPE html>
<html>

</head>

<body style="display: grid; margin: 0; min-height: 100vh; grid-template-rows: auto 1fr auto">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 100px;">
    <a class="navbar-brand" href="/" style="background-color: rgba(0, 0, 0, 0.2);">
        <img src="/images/Logo.png" alt="Logo WallaTicket" class="navbar-logo">
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item {{ Request::is('locales') || Request::is('locales/*') ? 'active' : '' }}">
                        <a class="nav-link" href="/locales">Locales</a>
                    </li>
                @endif
                @if (Auth::check())
                <li class="nav-item {{ Request::is('eventos') || Request::is('eventos/*') ? 'active' : '' }}">
                    <a class="nav-link" href="/eventos">Eventos</a>
                </li>
                @endif
                @if (auth()->check() && Auth::user()->rol == 'admin')
                <li class="nav-item {{ Request::is('usuarios') ? 'active' : '' }}">
                    <a class="nav-link" href="/usuarios">Usuarios</a>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item {{ Request::is('reseñas') ? 'active' : '' }}">
                    <a class="nav-link" href="/reseñas">Reseñas</a>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item {{ Request::is('entradas') ? 'active' : '' }}">
                    <a class="nav-link" href="/entradas">Entradas</a>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item {{ Request::is('misEntradas') ? 'active' : '' }}">
                    <a class="nav-link" href="/misEntradas">Mis Entradas</a>
                </li>
                @endif
                <li class="nav-item {{ Request::is('informacion') ? 'active' : '' }}">
                    <a class="nav-link" href="/informacion">Informacion del proyecto</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="/contact">Contacto</a>
                </li>
            </ul>
        </div>
        
        @if (Auth::check())
            <form class="form-inline ml-auto" method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Cerrar sesión</button>
            </form>
        @else
            <div class="ml-auto">
                <a class="btn btn-primary" href="/login">Iniciar sesión</a>
                <a class="btn btn-success" href="/register">Registrarse</a>
            </div>
        @endif

        @if (Auth::check())
        <a class="navbar-brand" href="/profile">
            <img src="/images/generic_user.jpg" alt="Logo WallaTicket" class="navbar-logo" style="margin-left: 10px;">
        </a>

        @endif
        
        @yield('filter')
        
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-center text-white" style= "min-height: 50px;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn  btn-floating m-1" href="https://es-es.facebook.com" role="button"><i class="fab fa-facebook-f"></i> <img src="/images/facebook.png" height="42px"></a>

            <!-- Twitter -->
            <a class="btn  btn-floating m-1" href="https://twitter.com" role="button"><i class="fab fa-twitter"></i> <img src="/images/twitter.png"  height="42px"></a>

            <!-- Instagram -->
            <a class="btn btn-floating m-1" href="https://www.instagram.com" role="button"><i class="fab fa-instagram"></i> <img src="/images/instagram.png"  height="42px"></a>

        </section>
        <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="/">WallaTicket.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
