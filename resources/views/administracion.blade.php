@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
@endsection

@section('content')
<div class="container">
    <h2>Administración</h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    

    <div class="row">
        <div class="col-md-3">
            <!-- Botones verticales -->
            <div class="btn-group-vertical p-2">
                <button type="button" class="btn btn-dark rounded" onclick="showNoticias()">Noticias</button>
                <button type="button" class="btn btn-dark rounded" onclick="showMedios()">Medios</button>
                <button type="button" class="btn btn-dark rounded" onclick="showRedactores()">Redactores</button>
                <button type="button" class="btn btn-dark rounded" onclick="showCategorias()">Categorías</button>
                <button type="button" class="btn btn-dark rounded" onclick="showComentarios()">Comentarios</button>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Grid dinámico -->
            <div id="gridMedios">
                <h3>Medios</h3>
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán dinámicamente los datos de los medios -->
                        @foreach ($medios as $medio)
                            <tr>
                                <td>{{$medio->nombre}}</td>
                                <td>{{$medio->apellidos}}</td>
                                <td>{{$medio->telefono}}</td>
                                <td>{{$medio->email}}</td>
                                <td>
                                    <a href="/modificar_user/{{$medio->id}}"><i class="bi bi-wrench mx-2" style="color: black;"></i></a>
                                    <a href="/eliminar_user/{{$medio->id}}"><i class="bi bi-trash mx-2" style="color: black;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div id="gridRedactores" style="display: none;">
                <h3>Redactores</h3>
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán dinámicamente los datos de los medios -->
                        @foreach ($redactores as $redactor)
                            <tr>
                                <td>{{$redactor->nombre}}</td>
                                <td>{{$redactor->apellidos}}</td>
                                <td>{{$redactor->telefono}}</td>
                                <td>{{$redactor->email}}</td>
                                <td>
                                    <a href="/modificar_user/{{$redactor->id}}"><i class="bi bi-wrench mx-2" style="color: black;"></i></a>
                                    <a href="/eliminar_user/{{$redactor->id}}"><i class="bi bi-trash mx-2" style="color: black;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div id="gridCategorias" style="display: none;">
                <h3>Categorías</h3>
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Palabras clave</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán dinámicamente los datos de las categorías -->
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->descripcion}}</td>
                                <td>{{$categoria->palabras_clave}}</td>
                                <td>
                                    <a href="/modificar_categoria/{{$categoria->id}}"><i class="bi bi-wrench mx-2" style="color: black;"></i></a>
                                    <a href="/eliminar_categoria/{{$categoria->id}}"><i class="bi bi-trash mx-2" style="color: black;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="gridComentarios" style="display: none;">
                <h3>Comentarios</h3>
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Contenido</th>
                            <th>Valoración</th>
                            <th>Medio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán dinámicamente los datos de las categorías -->
                        @foreach ($comentarios as $comentario)
                            <tr>
                                <td>{{$comentario->fecha}}</td>
                                <td>{{$comentario->contenido}}</td>
                                <td>{{$comentario->valoracion}}</td>
                                <td>{{$comentario->medio}}</td>
                                <td>
                                    <a href="/modificar_comentario/{{$comentario->id}}"><i class="bi bi-wrench mx-2" style="color: black;"></i></a>
                                    <a href="/eliminar_comentario/{{$comentario->id}}"><i class="bi bi-trash mx-2" style="color: black;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="gridNoticias" style="display: none;">
                <h3>Noticias</h3>
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Redactor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán dinámicamente los datos de las categorías -->
                        @foreach ($noticias as $noticia)
                            <tr>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{$noticia->fecha}}</td>
                                <td>{{$noticia->redactor->nombre}} {{$noticia->redactor->apellidos}}</td>
                                <td>
                                    <a href="/modificar_noticia/{{$noticia->id}}"><i class="bi bi-wrench mx-2" style="color: black;"></i></a>
                                    <a href="/eliminar_noticia/{{$noticia->id}}"><i class="bi bi-trash mx-2" style="color: black;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    var comentariosMostrados = false;
    var mediosMostrados = false;
    var redactoresMostrados = false;
    var categoriasMostrados = false;
    var noticiasMostrados = false;

    function showMedios() {
        $('#gridMedios').show();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        mediosMostrados=true;
    }

    function showRedactores() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').show();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        redactoresMostrados=true;
    }

    function showComentarios() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').show();
        $('#gridNoticias').hide();
        comentariosMostrados=true;
    }

    function showCategorias() {
        $('#gridCategorias').show();
        $('#gridMedios').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        categoriasMostrados=true;
    }

    function showNoticias() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').show();
        noticiasMostrados=true;
    }

    /*document.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
            showNoticias(); // Llamar a la función para mostrar las noticias
            // Aquí puedes agregar más lógica si es necesario, como cargar los datos de la página correspondiente mediante AJAX
        });
    });*/

    // Ejecutar una función por defecto al cargar la página
    $(document).ready(function() {

        if (comentariosMostrados) {
            showComentarios();
        } 
        else if(mediosMostrados){
            showMedios();
        }
        else if(redactoresMostrados){
            showRedactores();
        }
        else if(categoriasMostrados){
            showCategorias();
        }
        else if(noticiasMostrados){
            showNoticias();
            console.log("entroooooo");
        }

        showNoticias();
    });
</script>

@endsection