@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="css/index.css">
@endsection

@section('content')


<div class="container mt-4">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if($noticias)
        <div class="row justify-content-center">
            <div class="col-8"> <!-- Definir el ancho deseado, por ejemplo, col-8 para ocupar 8 columnas del grid -->
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators" >
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000" style="height: 550px;">
                            <div class="card h-100" >
                                <img src="{{asset('images/coparey.jpg')}}" class="card-img-top" style="height: 380px;" alt="...">
                                <div class="card-body" style="margin-bottom: 35px;">
                                    <h5 class="card-title">First slide label</h5>
                                    <p class="card-text">Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('noticias.show', $noticias[0]->id) }}" style="text-decoration: none";>
                            <div class="carousel-item" data-bs-interval="3000" style="height: 550px;">
                                <div class="card h-100" >
                                    <img src="{{asset($noticias[0]->foto)}}" class="card-img-top" style="height: 380px;" alt="...">
                                    <div class="card-body" style="margin-bottom: 35px;">
                                        <h5 class="card-title">{{$noticias[0]->titulo}}</h5>
                                        <p class="card-text">{{$noticias[0]->descripcion}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('noticias.show', $noticias[0]->id) }}" style="text-decoration: none";>
                            <div class="carousel-item" data-bs-interval="3000" style="height: 550px;">
                                <div class="card h-100" >
                                    <img src="{{$noticias[0]->foto}}" class="card-img-top" style="height: 380px;" alt="...">
                                    <div class="card-body" style="margin-bottom: 35px;">
                                        <h5 class="card-title">{{$noticias[0]->titulo}}</h5>
                                        <p class="card-text">{{$noticias[0]->descripcion}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
</div>





        <div class="container mt-4">
            <div class="carta">
                @foreach ($noticias as $noticia)
                        <a href="{{ route('noticias.show', $noticia->id) }}">
                            <div class="card news-card h-100">
                                <img src="{{ $noticia->foto }}" class="card-img-top" alt="Imagen de la noticia">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                    <p class="card-text author-info">Publicado por <span class="author-name">{{ $noticia->redactor->nombre }} {{ $noticia->redactor->apellidos }}</span></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Publicado {{ \Carbon\Carbon::parse($noticia->fecha)->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                @endforeach
            </div>
        </div>
    @else
    <!-- El array $noticias está vacío -->
        <h4>No se encontraron noticias con la búsqueda '{{$busqueda}}'.</h4>
    @endif
    
@endsection
