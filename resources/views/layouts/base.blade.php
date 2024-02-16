<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <title>{{env('APP_NAME')}} -  @yield('title')</title>

    <!-- Estilo personalizado para este diseño base -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
                <form class="d-flex mx-auto" >
                    <input class="form-control me-2 rounded-pill" type="search" style="width: 25rem;" placeholder="Deportes, economía, cultura..." aria-label="Search">
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
      
      
    <script>
        //inicializa los popover que tengan el atributo  data-toggle="popover"
        /*$(function () {
          $('[data-toggle="popover"]').popover();
        });   */  
        //inicializa los popover que se encuentren el header
        /*$(function () {
            $('.example-popover').popover({
                container: 'header'
            })
        })*/

        //codigo para cambiar el foco
        /*$('.popover-dismiss').popover({
          trigger: 'focus'
        })*/
        const carousel = new bootstrap.Carousel('#carouselExampleIndicators')

        const myCarouselElement = document.querySelector('#carouselExampleIndicators')

        const carousel2 = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
        touch: false
        })

        
    </script>  
</body>
</html>