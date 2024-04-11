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
    

    <div class="row mb-3">
        <div class="col-md-3">
            <!-- Botones verticales -->
            <div class="btn-group-vertical p-1">
                <button type="button" class="btn btn-dark rounded w-75" onclick="showNoticias()">Noticias</button>
                <button type="button" class="btn btn-dark rounded w-75" onclick="showMedios()">Medios</button>
                <button type="button" class="btn btn-dark rounded w-75" onclick="showRedactores()">Redactores</button>
                <button type="button" class="btn btn-dark rounded w-75" onclick="showCategorias()">Categorías</button>
                <button type="button" class="btn btn-dark rounded w-75" onclick="showComentarios()">Comentarios</button>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Grid dinámico -->
            <div id="gridMedios">
                <h3>Medios <a href="/crear_medio" class="btn btn-secondary btn-sm mx-3">Crear nuevo</a></h3>
                
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
                <h3>Redactores <a href="/crear_redactor" class="btn btn-secondary btn-sm mx-3">Crear nuevo</a></h3>
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
                <h3>Categorías <a href="/crear_categoria" class="btn btn-secondary btn-sm mx-3">Crear nueva</a></h3>
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
                <h3>Noticias <a href="/crear_noticia" class="btn btn-secondary btn-sm mx-3">Crear nueva </a></h3>
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
<script src="{{asset('js/administracion.js')}}"></script>

@endsection