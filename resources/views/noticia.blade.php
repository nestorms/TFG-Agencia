@extends('layouts.base')
@section('title', 'Noticia')
@section('estilos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
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
            <!-- Botón -->
            <button id="like" onclick="like()" data-id="{{ $noticia->id }}" type="button" class="btn btn-outline-light likeBtn">Me gusta</button>
        </div>
    
        <!-- Espacio grande -->
        <div style="width: 50px;"></div> <!-- Ajusta el ancho según sea necesario -->
    
        <!-- Segundo conjunto de icono, contador y botón -->
        <div id="saveButton">
            <!-- Icono -->
            <img src="{{ asset('images/marca.png') }}" class="img-fluid" style="max-width: 45px;" alt="">
            <!-- Contador -->
            <span id="saveCount" class="mx-1">3</span>
            <!-- Botón -->
            <button data-id="{{ $noticia->id }}" type="button" class="btn btn-outline-light saveBtn">Guardar</button>
        </div>
    </div>
    <hr>
</div>
<div class="container mb-5" >

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    function like(){
        console.log("HOLA BLEBEL");
        var button2 = document.getElementById("like");
            var id = button2.getAttribute("data-id");
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/noticias/' + id + '/like',
                data: { 
                    id: id,
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    // Actualizar el contador de likes en la interfaz de usuario
                    $('#likeCount' + id).text(response.likes);

                    $(button2).removeClass('btn-outline-light likeBtn').addClass('btn-light unlikeBtn').text('No me gusta');
                    button2.setAttribute("onclick","unlike()");
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    };




    function unlike(){
        console.log("HOLA AMIGO");
            var button2 = document.getElementById("like");
            var id = button2.getAttribute("data-id");
            var token = $('meta[name="csrf-token"]').attr('content');
            

            $.ajax({
                type: 'POST',
                url: '/noticias/' + id + '/unlike',
                data: { 
                    id: id,
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    // Actualizar el contador de likes en la interfaz de usuario
                    $('#likeCount' + id).text(response.likes);

                    // Cambiar la apariencia y el texto del botón
                    
                        $(button2).removeClass('btn-light unlikeBtn').addClass('btn-outline-light likeBtn').text('Me gusta');
                        button2.setAttribute("onclick","like()");
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    };



    /*
        $('.likeBtn').click(function() {
            console.log("HOLA BLEBEL");
            var id = $(this).data('id');
            var token = $('meta[name="csrf-token"]').attr('content');
            var button = $(this);

            $.ajax({
                type: 'POST',
                url: '/noticias/' + id + '/like',
                data: { 
                    id: id,
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    // Actualizar el contador de likes en la interfaz de usuario
                    $('#likeCount' + id).text(response.likes);

                    // Cambiar la apariencia y el texto del botón
                    if (button.hasClass('btn-outline-light')) {
                        button.removeClass('btn-outline-light likeBtn').addClass('btn-light unlikeBtn').text('No me gusta');
                    } else {
                        button.removeClass('btn-primary').addClass('btn-outline-light').text('PACOO');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('.unlikeBtn').click(function() {
            console.log("HOLA AMIGO");
            var id = $(this).data('id');
            var token = $('meta[name="csrf-token"]').attr('content');
            var button2 = $(this);

            $.ajax({
                type: 'POST',
                url: '/noticias/' + id + '/unlike',
                data: { 
                    id: id,
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    // Actualizar el contador de likes en la interfaz de usuario
                    $('#likeCount' + id).text(response.likes);

                    // Cambiar la apariencia y el texto del botón
                    if (button2.hasClass('btn-light unlikeBtn')) {
                        button2.removeClass('btn-light unlikeBtn').addClass('btn-outline-light likeBtn').text('Me gusta');
                    } else {
                        button2.removeClass('btn-primary').addClass('btn-outline-light').text('MASAAAAAAAAAAl');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        */

</script>
@endsection
