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
                <form method="post" action="/buscadorIndex" class="d-flex w-50 mx-auto justify-content-center">
                    @csrf
                    <button class="btn" type="submit"><i class="bi bi-search" id="search-icon"></i></button>
                    <input class="me-2 border-bottom border-dark-subtle" type="search" name="busqueda" placeholder="Deportes, economía, cultura..." aria-label="Search">
                    
                </form>
                @auth
                    <div class="d-flex justify-content-end align-items-center">

                        @if (auth()->user()->rol == "medio")
                        <div class="dropdown">
                            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/bell.png') }}" alt="Notificaciones" style="width: 25px; height: 25px;">
                                @if (auth()->user()->notificaciones_medio->where('estado', 'pendiente')->where('user_id', auth()->user()->id)->count() > 0)
                                    <span class="position-absolute top-0 start-75 translate-middle badge rounded-pill bg-danger">
                                        {{auth()->user()->notificaciones_medio->where('estado', 'pendiente')->where('user_id',auth()->user()->id)->count()}}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                @endif
                                
                            </button>
                          
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start p-0">
                                <li class="notificaciones">
                                    @php
                                        $notificaciones = auth()->user()->notificaciones_medio->where('fecha', '>=', now()->subWeek())->where('user_id',auth()->user()->id)->sortByDesc('estado');
                                    @endphp
                                    @if (auth()->user()->notificaciones_medio->where('estado', 'pendiente')->where('user_id', auth()->user()->id)->count() > 0)
                                        @foreach ($notificaciones as $notificacion)
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="/noticia/{{$notificacion->noticia_id}}/notificar">{{ $notificacion->descripcion}} <br>
                                            
                                                @if ($notificacion->estado == "pendiente")
                                                    <small><strong>Pendiente &nbsp; &nbsp;</strong></small>
                                                @else
                                                    <small>Leída &nbsp; &nbsp;</small> 
                                                @endif
                                                <small>{{ \Carbon\Carbon::parse($notificacion->fecha)->diffForHumans() }}</small>

                                                <a class="link-danger" style="font-size: 12px;" href="/eliminar_notificacion/{{$notificacion->noticia_id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eliminar</a>
                                                <hr class="p-1 m-0">
                                            </a>
                                            
                                            
                                        </div>
                                            
                                        @endforeach
                                    
                                    @else
                                    <div class="d-flex flex-column">
                                        <a class="dropdown-item p-2" href="">No tienes ninguna notificación</a>
                                    </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                            
  
                        @else
                            <div class="mx-1">  
                                @if (auth()->user()->rol == "admin")
                                    <a class="btn btn-light" href="/administracion">
                                        <img src="{{ asset('images/llave.png') }}" alt="Administración" class="img-fluid" style="width: auto; height: 25px;">
                                    </a>

                                @elseif(auth()->user()->rol == "redactor")
                                    <a class="btn btn-light" href="/crear_noticia">
                                        <img src="{{ asset('images/lapiz.png') }}" alt="Publicar" class="img-fluid" style="width: auto; height: 25px;">
                                    </a>
                                @endif
                                
                            </div>
                        @endif

                        <div class="mx-1">
                            <a class="btn btn-light" href="/mensajes/{{auth()->user()->id}}">
                                <img src="{{ asset('images/message.png') }}" alt="Mensajes" class="img-fluid" style="width: auto; height: 30px;">
                            </a>
                        </div>
                    </div>
                    <button class="dropdown btn btn-light p-2" style="color: black; margin-left:7rem;">
                        
                        <a class="nav-link dropdown" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="align-items-center" style="color:black;">
                                <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                                
                                @if (auth()->user()->rol == "admin")
                                    <i class="bi bi-caret-down-fill"></i>
                                    <p class="m-0 p-0">Administrador </p>
                                
                                @else
                                    <p class="m-0 p-0">{{auth()->user()->nombre}} <i class="bi bi-caret-down-fill"></i></p> 
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
                                <li><a class="dropdown-item" href="/config/{{auth()->user()->id}}">Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            @endif
                            @if (auth()->user()->rol == "medio")
                                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}">Mis noticias</a></li>
                                <li><a class="dropdown-item" href="/config/{{auth()->user()->id}}">Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            @endif
                            
                            
                        </ul>
                @endauth
                    @guest
                    <a class="btn" href="/login" id="login" role="button">
                        <div class="align-items-center" style="color:black;">
                            <img src="{{ asset('images/profile.png') }}" alt="Perfil" class="img-fluid" style="width: auto; height: 3rem;">
                            <p class="login">Iniciar sesión</p>
                        </div>
                    </a>
                    @endguest                    
                    </button>
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
                @auth
                    <a class="nav-link" href="/recomendadas/{{auth()->user()->id}}">RECOMENDADAS</a>
                @endauth
                @guest
                    <a class="nav-link" href="/recomendadas/0">RECOMENDADAS</a>
                @endguest
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categorias">CATEGORÍAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONÓCENOS</a>
            </li>
        </ul>
    </nav>
    <hr class="w-75 mx-auto">
    


        @yield('content')


        
        <footer class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top border-black m-0">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Newstor, Inc</p>
        
            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="Newstor Logo" style="width: auto; height: 3rem;">
            </a>
        
            <ul class="nav col-md-4 justify-content-end">
              <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Inicio</a></li>
              <li class="nav-item"><a href="/categorias" class="nav-link px-2 text-body-secondary">Categorías</a></li>
              <li class="nav-item"><a href="/recientes" class="nav-link px-2 text-body-secondary">Novedades</a></li>
              <li class="nav-item"><a href="/conocenos" class="nav-link px-2 text-body-secondary">Sobre nosotros</a></li>
            </ul>
          </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   
    
</body>
</html>