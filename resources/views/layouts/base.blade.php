<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <title>{{env('APP_NAME')}} -  @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    @yield('estilos')
    
</head>
<body class="bg-dark text-white">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgrey; padding:0.2rem;">
            <div class="container align-items-center">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Newstor Logo" style="width: auto; height: 5rem;">
                </a>
                <!-- Barra de búsqueda -->
                <form class="d-flex">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Deportes, economía, cultura..." aria-label="Search">
                    <button class="btn btn-outline-dark rounded-circle" type="submit"><i class="bi bi-search" id="search-icon"></i></button>
                </form>
                @auth
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="mx-3">
                            
                            <button type="button" class="btn rounded-circle" data-html="true" data-toggle="popover" data-placement="bottom" data-content="Nueva noticia deportes! <br> Nueva noticia local! "><img src="{{ asset('images/bell.png') }}" alt="Notificaciones" class="img-fluid" style="width: auto; height: 25px;"></button>

                        </div>
                        <div class="mx-3">
                            <a href="#">
                                <img src="{{ asset('images/message.png') }}" alt="Mensajes" class="img-fluid" style="width: auto; height: 30px;">
                            </a>
                        </div>
                    </div>
                    <div class="dropdown" style="color: black; margin-left:7rem;">
                        
                        <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="align-items-center" style="color:black;">
                                <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                                <i class="bi bi-caret-down-fill"></i> <!-- Flecha -->
                                @if (auth()->user()->rol == "medio")
                                    <p>{{auth()->user()->nombre}}</p>
                                @endif
                                
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Mis noticias</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                        </ul>
                @endauth
                    @guest
                    <a class="badge badge-info" href="/login" id="login" role="button">
                        <div class="align-items-center" style="color:black;">
                            <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                            <p>Iniciar sesión</p>
                        </div>
                    </a>
                    @endguest                    
                    </div>
            </div>
        </nav>

        
    </header>

    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container-fluid">
        
            <!-- Navbar links -->
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Más recientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recomendadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conócenos</a>
                </li>
            </ul>
            
        </div>
    </nav>


        @yield('content')

    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>