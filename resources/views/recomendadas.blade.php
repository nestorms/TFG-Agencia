@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

    <div class="container mt-4 mb-5">
        @auth
            @if (auth()->user()->rol != "redactor")
            <h2 class="m-4" style="text-decoration: underline; text-align:center;">Noticias para ti</h2>
                @if($noticias)
                    <div class="carta">
                        @foreach ($noticias as $noticia)
                                <a href="{{ route('noticias.show', $noticia->id) }}">
                                    <div class="card news-card h-100">
                                        <img src="{{ asset($noticia->foto) }}" class="card-img-top" alt="Imagen de la noticia">
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
                @else   
                    <!-- El array $noticias está vacío -->
                    <h4>No se encontraron noticias recomendadas para ti.</h4>
                @endif
            @else
                <h4>Esta es una función restringida para los medios de comunicación</h4>
            @endif  
        @endauth
        
        @guest
            <h4>Para ver noticias recomendadas <a class="icon-link icon-link-hover link-warning" href="/login">inicia sesión<i class="bi bi-lock-fill"></i></a></h4>
        @endguest
    </div>
    
@endsection
