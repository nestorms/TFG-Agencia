<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{env('APP_NAME')}} -  @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    @yield('estilos')
     
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding:0.2rem;">
            <div class="container align-items-center">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Newstor Logo" style="width: auto; height: 5rem;">
                </a>
                <!-- Barra de búsqueda -->
                <form class="d-flex w-50 mx-auto">
                    <button class="btn" type="submit"><i class="bi bi-search" id="search-icon"></i></button>
                    <input class="me-2 border-bottom border-dark-subtle" type="search" placeholder="Deportes, economía, cultura..." aria-label="Search">
                    
                </form>
                @auth
                    <div class="d-flex justify-content-end align-items-center">

                        @if (auth()->user()->rol == "medio")
                            <div class="mx-3">  
                                <button type="button" class="btn rounded-circle" data-html="true" data-toggle="popover" data-placement="bottom" data-content="Nueva noticia deportes! <br> Nueva noticia local! ">
                                    <img src="{{ asset('images/bell.png') }}" alt="Notificaciones" class="img-fluid" style="width: auto; height: 25px;">
                                </button>
                            </div>
  
                        @else
                            <div class="mx-3">  
                                @if (auth()->user()->rol == "admin")
                                    <a href="/administracion">
                                        <img src="{{ asset('images/llave.png') }}" alt="Notificaciones" class="img-fluid" style="width: auto; height: 25px;">
                                    </a>

                                @elseif(auth()->user()->rol == "redactor")
                                    <a href="/publicar">
                                        <img src="{{ asset('images/llave.png') }}" alt="Notificaciones" class="img-fluid" style="width: auto; height: 25px;">
                                    </a>
                                @endif
                                
                            </div>
                        @endif

                        <div class="mx-3">
                            <a href="/mensajes">
                                <img src="{{ asset('images/message.png') }}" alt="Mensajes" class="img-fluid" style="width: auto; height: 30px;">
                            </a>
                        </div>
                    </div>
                    <div class="dropdown" style="color: black; margin-left:7rem;">
                        
                        <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="align-items-center" style="color:black;">
                                <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                                <i class="bi bi-caret-down-fill"></i> <!-- Flecha -->
                                @if (auth()->user()->rol == "admin")
                                    <p>Administrador</p>
                                
                                @else
                                    <p>{{auth()->user()->nombre}}</p> 
                                @endif
                                
                            </div>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->rol == "admin")
                                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}">Mis noticias</a></li>
                                <li><a class="dropdown-item" href="/administracion">Administración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            @endif
                            @if (auth()->user()->rol == "redactor")
                                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}">Mis publicaciones</a></li>
                                <li><a class="dropdown-item" href="/config">Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            @endif
                            @if (auth()->user()->rol == "medio")
                                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}">Mis noticias</a></li>
                                <li><a class="dropdown-item" href="/config">Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            @endif
                            
                            
                        </ul>
                @endauth
                    @guest
                    <a class="badge badge-info" href="/login" id="login" role="button">
                        <div class="align-items-center" style="color:black;">
                            <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                            <p class="login">Iniciar sesión</p>
                        </div>
                    </a>
                    @endguest                    
                    </div>
            </div>
        </nav>

        
    </header>

    <nav class="navbar navbar-light navbar-expand-lg">
        
        <!-- Navbar links -->
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">MÁS RECIENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">RECOMENDADAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CATEGORÍAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONÓCENOS</a>
            </li>
        </ul>
    </nav>
    <hr class="w-75 mx-auto">
    


        @yield('content')

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   
    
</body>
</html>