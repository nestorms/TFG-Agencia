@extends('layouts.base')
@section('title', 'Noticia')
@section('estilos')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Estilo para las estrellas */
    .rating input[type="radio"] {
        display: none;
    }

    .rating2 input[type="radio"] {
        display: none;
    }

    .rating2{
        display: flex;
        flex-direction: row-reverse;
    }

    .rating label {
        font-size: 4em;
        color: #ccc; /* Color por defecto de las estrellas */
        cursor: pointer;
    }

    .rating input[type="radio"]:checked ~ label {
        color: yellow; /* Cambia el color a amarillo cuando está seleccionado */
    }

    .border{
        background-color:darkslategray;
    }

    .rating2 label {
        font-size: 2.5em;
        color: #ccc; /* Color por defecto de las estrellas */
        cursor: pointer;
    }

    .rating2 input[type="radio"]:checked ~ label {
        color: yellow; /* Cambia el color a amarillo cuando está seleccionado */
    }

    .star {
        color: #ccc; /* Color por defecto de las estrellas */
    }

    .star.yellow {
        color: yellow; /* Cambia el color a amarillo */
    }


    .btn-success{
        background-color: gray;
        border: none;
    }

</style>
@endsection

@section('content')


    <div class="container" style="max-width: 900px;">
        <!-- Categoria de la noticia -->
        <div class="mb-3 mt-5">
            <h3>{{ $noticia->category->nombre }}</h3>
            <hr style="width: 25%;"> <!-- Separador -->
        </div>
        
        <!-- Titulo de la noticia -->
        <h1>{{ $noticia->titulo }}</h1>
        
        <!-- Descripcion de la noticia -->
        <p class="text-left mb-4">{{ $noticia->descripcion }}</p>
        
        <!-- Imagen de portada de la noticia -->
        <div class="text-center mb-4">
            <img src="{{ asset($noticia->foto) }}" alt="{{ $noticia->titulo }}" style="max-width: 100%;">
        </div>
        <small class="text-center mb-2">Publicado el {{ $noticia->fecha }} a las {{ $noticia->hora }}</small>
        <!-- Separador -->
        <hr>
        
        <!-- Nombre del autor -->
        <p class="text-center mb-4"><strong>Autor: {{ $noticia->redactor->nombre }} {{ $noticia->redactor->apellidos }}</strong></p>
        
    </div>  
    <div class="container" style="max-width: 1100px;">
        <!-- Contenido de la noticia -->
        <div>
            <p style="font-size: 1.2rem;">{{ $noticia->contenido }}</p>
        </div>

        <div class="d-flex justify-content align-items-center mt-5 mb-5">
            <!-- Primer conjunto de icono, contador y botón -->
            <div id="likeButton{{ $noticia->id }}">
                <!-- Icono -->
                <img src="{{ asset('images/corazon.png') }}" class="img-fluid" style="max-width: 50px;" alt="">
                <!-- Contador -->
                <span id="likeCount{{ $noticia->id }}" class="mx-1">{{ $noticia->likes }}</span>
                @guest
                    <small>Me gusta</small>
                @endguest
                <!-- Botón -->
                @auth
                    <button id="like" onclick="like()" data-id="{{ $noticia->id }}" type="button" class="btn btn-outline-light likeBtn">Me gusta</button>
                @endauth
                
            </div>
        
            <!-- Espacio grande -->
            <div style="width: 50px;"></div> <!-- Ajusta el ancho según sea necesario -->
        
            <!-- Segundo conjunto de icono, contador y botón -->
            <div id="saveButton">
                <!-- Icono -->
                <img src="{{ asset('images/marca.png') }}" class="img-fluid" style="max-width: 45px;" alt="">
                <!-- Contador -->
                <span id="saveCount" class="mx-1">3</span>
                @guest
                    <small>Guardados</small>
                @endguest
                <!-- Botón -->
                @auth
                    <button data-id="{{ $noticia->id }}" type="button" class="btn btn-outline-light saveBtn">Guardar</button>
                @endauth
                
            </div>
        </div>
        <hr>
    </div>
    <div class="container mb-5 mt-4" style="max-width: 1100px;">
        @if (session('success'))
            <span class="alert alert-success text-left">{{ session('success') }}</span> <br> <br>
        @endif
        <h3>Comentarios</h3>
        
        @foreach ($noticia->comentarios as $comment)
            <div class="border border-dark-subtle rounded-start-4 mb-5 mt-4 p-3">
                <div class="d-flex align-items-start justify-items-center">
                    <div class="me-3">
                        <img src="{{asset('images/profile_white.png')}}" class="img-fluid" style="width: 3vw;">
                    </div>
                    <div class="d-flex mb-3" >
                        <div class="d-flex align-items-center mx-2">
                            <div style="margin-right: 3vw">
                                <p style="margin: 0; padding:0;">{{$comment->medio}}</p>
                                <small style="margin: 0; padding:0;">{{$comment->fecha}}</small>
                            </div>
                            <div class="rating" style="margin: 0; padding: 0;">
                                @php
                                    $rating = $comment->valoracion; // Valor del usuario (3 de 5 estrellas)
                                @endphp
                
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating)
                                        <span class="star yellow">&#9733;</span> <!-- Estrella rellena -->
                                    @else
                                        <span class="star">&#9734;</span> <!-- Estrella vacía -->
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <p>{{$comment->contenido}}</p>
                </div>   
            </div>    
        @endforeach
        
        @auth
            <div class="container p-0">
                <form action="{{ route('comentar.store') }}" method="POST" class="d-flex align-items-center justify-items-center ">
                    @csrf
                    <input type="hidden" name="noticia_id" value="{{ $noticia->id }}">
                    <!-- Comentario -->
                    <div class="mb-5 w-75">
                        <label for="comentario" class="form-label"><h5>Publica un comentario:</h5></label>
                        @if ($errors->has('comentario'))
                            <span class="text-danger text-left">{{ $errors->first('comentario') }}</span>
                        @endif
                        @if ($errors->has('valoracion'))
                            <span class="text-danger text-center">{{ $errors->first('valoracion') }}</span>
                        @endif
                        <textarea class="form-control w-100" style="height: 15vh" id="comentario" name="comentario" rows="3" required></textarea>
                    </div>
                
                    <!-- Valoración -->
                    <div class="mb-3 mx-3 w-30">
                        
                        <div class="rating2 w-100 mx-2">
                            <input type="radio" id="estrella1" name="valoracion" value="1">
                            <label for="estrella1">&#9733;</label>
                            <input type="radio" id="estrella2" name="valoracion" value="2">
                            <label for="estrella2">&#9733;</label>
                            <input type="radio" id="estrella3" name="valoracion" value="3">
                            <label for="estrella3">&#9733;</label>
                            <input type="radio" id="estrella4" name="valoracion" value="4">
                            <label for="estrella4">&#9733;</label>
                            <input type="radio" id="estrella5" name="valoracion" value="5">
                            <label for="estrella5">&#9733;</label>
                        </div>
                    </div>
                
                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-success mx-5 mb-2" style="width: 150px; height:8vh; font-size:1.2em;">Comentar</button>
                </form>
            </div>
        @endauth

        @guest
            <div>
                <h5>Para publicar un comentario, 
                <a class="icon-link icon-link-hover link-warning" href="/login">Inicia sesión<i class="bi bi-lock-fill"></i></a>
                </h5>
            </div>
        @endguest

    </div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/botones.js')}}"></script>
@endsection
