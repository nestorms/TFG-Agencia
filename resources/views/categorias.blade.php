@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

    <div class="container mt-4">
        @foreach ($categorias as $categoria)
            <div class="mx-5 mt-5 mb-0">
                <h3>{{ $categoria->nombre }}</h3>
                <hr style="width: 25%;opacity: 0.9!important;"> <!-- Separador -->
            </div>
            <div class="card-deck">
                <div class="carta">
                    @foreach ($noticiasPorCategoria[$categoria->nombre] as $noticia)
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
            <div class="text-center mt-4">
                <a href="/categorias/{{$categoria->id}}" class="btn btn-light btn-lg btn-square"><strong>Ver más noticias</strong> </a>
            </div>
            <br>
        @endforeach
    </div>

@endsection