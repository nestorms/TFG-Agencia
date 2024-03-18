@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<div class="container">
    <h2>Modificar comentario</h2>

    <form action="/modificar_comentario/{{$comentario->id}}" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5 mt-4">
            <!-- Label y text area tamaño medio -->
            <div class="container">
                <label for="inputTexto1" class="form-label">Medio</label>
                <input type="text" id="inputTexto1" name="medio" class="form-control mb-3" value="{{$comentario->medio}}" readonly>
            </div>

            <div class="container">
                <label for="inputTexto2" class="form-label">Valoración</label>
                <input type="number" id="inputTexto2" name="valoracion" class="form-control mb-3" min="1" max="5" value="{{$comentario->valoracion}}">
            </div>

            <div class="fecha container">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" id="fecha" name="fecha" class="form-control mb-3" value="{{$comentario->fecha}}">
            </div>
            
            <div class="container">
                <label for="texto2" class="form-label">Contenido</label>
                <textarea id="texto2" name="contenido" class="form-control mb-3 w-100" rows="5">{{$comentario->contenido}}</textarea>
            </div>   
        </div>
        
        <!-- Botón centrado para enviar el formulario -->
        <div class="d-flex justify-content-center mb-4">
            <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Modificar comentario</button>
        </div>
    </form>

</div>


@endsection