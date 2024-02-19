@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')

@endsection

@section('content')
<h1>Pagina principal Newstor</h1>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8"> <!-- Definir el ancho deseado, por ejemplo, col-8 para ocupar 8 columnas del grid -->
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators" >
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000" style="height: 550px;">
                        <div class="card h-100" >
                            <img src="{{asset('images/coparey.jpg')}}" class="card-img-top" style="height: 380px;" alt="...">
                            <div class="card-body" style="margin-bottom: 35px;">
                                <h5 class="card-title">First slide label</h5>
                                <p class="card-text">Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('noticias.show', $noticias[0]->id) }}" style="text-decoration: none";>
                        <div class="carousel-item" data-bs-interval="10000" style="height: 550px;">
                            <div class="card h-100" >
                                <img src="{{$noticias[0]->foto}}" class="card-img-top" style="height: 380px;" alt="...">
                                <div class="card-body" style="margin-bottom: 35px;">
                                    <h5 class="card-title">{{$noticias[0]->titulo}}</h5>
                                    <p class="card-text">{{$noticias[0]->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('noticias.show', $noticias[1]->id) }}" style="text-decoration: none";>
                        <div class="carousel-item" data-bs-interval="10000" style="height: 550px;">
                            <div class="card h-100" >
                                <img src="{{$noticias[1]->foto}}" class="card-img-top" style="height: 380px;" alt="...">
                                <div class="card-body" style="margin-bottom: 35px;">
                                    <h5 class="card-title">{{$noticias[1]->titulo}}</h5>
                                    <p class="card-text">{{$noticias[1]->descripcion}}</p>
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
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
        @foreach ($noticias as $noticia)
            <div class="col mx-5 mb-3">
                <a href="{{ route('noticias.show', $noticia->id) }}" style="text-decoration: none";>
                    <div class="card h-100">
                        <img src="{{ $noticia->foto }}" class="card-img-top" style="height: 180px;" alt="News">
                        <div class="card-body">
                            <h5 class="card-title">{{ $noticia->titulo }}</h5>
                            <p class="card-text" style="margin-bottom: 0;"><small class="text-body-secondary">Publicado por {{$noticia->redactor->nombre}} {{$noticia->redactor->apellidos}}</small></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">{{ \Carbon\Carbon::parse($noticia->fecha)->diffForHumans() }}</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!--
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        @foreach ($noticias as $noticia)
            <div class="col-md-4">
                <img src="{{ $noticia->foto }}" class="card-img-top" style="height: 180px;" alt="News">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $noticia->titulo }}</h5>
                    <p class="card-text">{{$noticia->descripcion}}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
      @endforeach
    </div>
  </div>
-->
@endsection
