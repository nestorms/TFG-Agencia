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
        <div class="container mt-4 mb-5">
            <h4>Noticias con la búsqueda '{{$busqueda}}'.</h4>
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

        <div style="margin-bottom: 435px;"></div>
    @endif
</div>
@endsection
