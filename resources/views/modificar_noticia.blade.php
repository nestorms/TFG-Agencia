@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<div class="container">
    <h2>Modificar noticia</h2>

    <form action="/modificar_noticia/{{$noticia->id}}" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5">
            <!-- Label y text area tamaño medio -->
            <div class="box">
                <label for="texto1" class="form-label">Título</label>
                <textarea id="texto1" name="titulo" class="form-control mb-3" rows="5">{{$noticia->titulo}}</textarea>
            </div>
            
            <div class="box">
                <label for="texto2" class="form-label">Descripción</label>
                <textarea id="texto2" name="descripcion" class="form-control mb-3" rows="5">{{$noticia->descripcion}}</textarea>
            </div>
            
            
            <div class="box">
                <label for="inputTexto" class="form-label">Palabras clave</label>
                <input type="text" id="inputTexto" name="palabras_clave" class="form-control mb-3" value="{{$noticia->palabras_clave}}">
            </div>
            
            
            <div class="box">
                <label for="inputArchivo" class="form-label">Foto de portada</label>
                <div class="input-group mb-3">
                    <input type="file" name="foto" class="form-control" id="inputArchivo">
                    <input type="text" value="{{$noticia->foto}}" readonly>
                </div>
            </div>
            
            
            <div class="box desplegable">
                <label for="opciones" class="form-label">Categoría</label>
                <select id="opciones" class="form-select mb-3" name="categoria">
                    <option selected>{{$noticia->category->nombre}}</option>

                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="box fecha">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" id="fecha" name="fecha" class="form-control mb-3" value="{{$noticia->fecha}}">
            </div>
            
            
            <div class="contenido m-4">
                <label for="textoAnchoCompleto" class="form-label">Contenido</label>
                <textarea id="textoAnchoCompleto" name="contenido" class="form-control w-100" rows="10">{{$noticia->contenido}}</textarea>
            </div>
            
        </div>
        
        <!-- Botón centrado para enviar el formulario -->
        <div class="d-flex justify-content-center mb-4">
            <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Modificar noticia</button>
        </div>
    </form>

</div>


@endsection