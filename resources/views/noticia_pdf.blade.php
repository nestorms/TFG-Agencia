<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <div class="container" style="max-width: 900px;">
            <!-- Categoria de la noticia -->
            <div class="mb-3 mt-5">
                <h3>{{ $noticia->category->nombre }}</h3>
                <hr style="width: 100%;opacity: 0.9!important;"> <!-- Separador -->
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
            <hr style="opacity: 0.7!important;">
            
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
                        <small>Me gusta</small>   
                </div>
            
                <!-- Espacio grande -->
                <div style="width: 50px;"></div> <!-- Ajusta el ancho según sea necesario -->
            
                <!-- Segundo conjunto de icono, contador y botón -->
                <div id="saveButton">
                    <!-- Icono -->
                    <img src="{{ asset('images/marca.png') }}" class="img-fluid" style="max-width: 45px;" alt="">
                    <!-- Contador -->
                    <span id="saveCount{{ $noticia->id }}" class="mx-1">{{ $noticia->guardados }}</span>
                        <small>Guardados</small>
                    
                </div>
            </div>
            <hr style="opacity: 0.7!important;">
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>


