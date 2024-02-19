@extends('layouts.base')
@section('title', 'Noticia')
@section('estilos')

@endsection

@section('content')


<div class="container">
    <!-- Categoria de la noticia -->
    <div class="mb-3 mt-5">
        <h3>{{ $noticia->category->nombre }}</h3>
        <hr style="width: 25%;"> <!-- Separador -->
    </div>
    
    <!-- Titulo de la noticia -->
    <h1>{{ $noticia->titulo }}</h1>
    
    <!-- Descripcion de la noticia -->
    <p>{{ $noticia->descripcion }}</p>
    
    <!-- Imagen de portada de la noticia -->
    <div class="text-center mb-3">
        <img src="{{ $noticia->foto }}" alt="{{ $noticia->titulo }}" style="max-width: 100%;">
    </div>
    
    <!-- Separador -->
    <hr>
    
    <!-- Nombre del autor -->
    <p class="text-center">Autor: {{ $noticia->autor }}</p>
    
    <!-- Contenido de la noticia -->
    <div>
        {{ $noticia->contenido }}
    </div>
</div>  


@endsection
