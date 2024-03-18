@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<div class="container">
    <h2>Modificar categoría</h2>

    <form action="/modificar_categoria/{{$categoria->id}}" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5 mt-4">
            <!-- Label y text area tamaño medio -->
            <div class="container">
                <label for="inputTexto1" class="form-label">Nombre</label>
                <input type="text" id="inputTexto1" name="nombre" class="form-control mb-3" value="{{$categoria->nombre}}">
            </div>

            <div class="container">
                <label for="inputTexto2" class="form-label">Palabras clave</label>
                <input type="text" id="inputTexto2" name="palabras_clave" class="form-control mb-3" value="{{$categoria->palabras_clave}}">
            </div>
            
            <div class="container">
                <label for="texto2" class="form-label">Descripción</label>
                <textarea id="texto2" name="descripcion" class="form-control mb-3 w-100" rows="5">{{$categoria->descripcion}}</textarea>
            </div>   
        </div>
        
        <!-- Botón centrado para enviar el formulario -->
        <div class="d-flex justify-content-center mb-4">
            <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Modificar categoría</button>
        </div>
    </form>

</div>


@endsection