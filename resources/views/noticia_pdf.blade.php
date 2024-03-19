<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{env('APP_NAME')}} -  @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body style="align-content: center;">
        <div class="container" style="max-width: 900px; text-align:center;">
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
            <div class="text-center mb-4" style="text-align: center;">
                <?php
                    // Obtener la ruta de la imagen
                    $imagePath = public_path($noticia->foto);
                    
                    // Obtener el tipo de imagen
                    $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
                    
                    // Obtener los datos de la imagen en formato base64
                    $imageData = file_get_contents($imagePath);
                    $base64Image = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);
                ?>
                <!-- Mostrar la imagen usando base64 -->
                <img src="{{ $base64Image }}" alt="{{ $noticia->titulo }}" style="max-width: 60%;">
            </div>
            <br>
            <small class="text-center mb-2">Publicado el {{ $noticia->fecha }} a las {{ $noticia->hora }}</small>
            <br>
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
            <br>

            <div class="d-flex justify-content align-items-center mt-5 mb-5">
                <!-- Primer conjunto de icono, contador y botón -->
                <div id="likeButton{{ $noticia->id }}">
                    <?php
                        // Obtener la ruta de la imagen
                        $imagePath2 = public_path("images/corazon.jpg");
                        
                        // Obtener el tipo de imagen
                        $imageType2 = pathinfo($imagePath2, PATHINFO_EXTENSION);
                        
                        // Obtener los datos de la imagen en formato base64
                        $imageData2 = file_get_contents($imagePath2);
                        $base64Image2 = 'data:image/' . $imageType2 . ';base64,' . base64_encode($imageData2);
                    ?>
                    <img src="{{ $base64Image2 }}" class="img-fluid" style="max-width: 45px;" alt="">
                    <!-- Contador -->
                    <span id="likeCount{{ $noticia->id }}" class="mx-1">{{ $noticia->likes }}</span>
                        <small>Me gusta</small>   
                </div>
            
                <!-- Espacio grande -->
                <div style="width: 50px;"></div> <!-- Ajusta el ancho según sea necesario -->
            
                <!-- Segundo conjunto de icono, contador y botón -->
                <div id="saveButton">
                    <!-- Icono -->
                    <?php
                        // Obtener la ruta de la imagen
                        $imagePath2 = public_path("images/marca.jpg");
                        
                        // Obtener el tipo de imagen
                        $imageType2 = pathinfo($imagePath2, PATHINFO_EXTENSION);
                        
                        // Obtener los datos de la imagen en formato base64
                        $imageData2 = file_get_contents($imagePath2);
                        $base64Image2 = 'data:image/' . $imageType2 . ';base64,' . base64_encode($imageData2);
                    ?>
                    <img src="{{ $base64Image2 }}" class="img-fluid" style="max-width: 45px;" alt="">
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


