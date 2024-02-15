@extends('layouts.base')
@section('title', 'Inicio')

@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgrey; padding:0.2rem;">
        <div class="container align-items-center">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Newstor Logo" style="width: auto; height: 5rem;">
            </a>
            <!-- Barra de búsqueda -->
            <form class="d-flex mx-auto" >
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <div class="d-flex justify-content-end align-items-center">
                <div class="mx-3">
                    <a href="#">
                        <img src="{{ asset('images/bell.png') }}" alt="Notificaciones" class="img-fluid" style="width: auto; height: 25px;">
                    </a>
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
                        <p>Néstor</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div>
    <h1>Página principal Newstor</h1>
</div>
@endsection
