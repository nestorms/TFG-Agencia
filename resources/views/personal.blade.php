@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')

<div class="container mb-4">
    <div class="d-flex align-items-center column gap-3">
        <h2 class="m-4">Mi sección personal</h2>
        <strong class="mb-0 mx-4">Filtrar por:</strong>
        <div>
            <a class="btn btn-secondary btn-sm dropdown " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorías
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categorias as $cat)
                    <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}/filtrar/categoria/{{$cat->id}}">{{$cat->nombre}}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <a class="btn btn-secondary btn-sm dropdown " id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Fecha
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}/filtrar/fecha/0">Más reciente</a></li>
                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}/filtrar/fecha/1">Más antiguo</a></li>
            </ul>
        </div>
        <div>
            <a class="btn btn-secondary btn-sm dropdown " id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Guardados
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}/filtrar/guardados/0">Más guardados</a></li>
                <li><a class="dropdown-item" href="/personal/{{auth()->user()->id}}/filtrar/guardados/1">Menos guardados</a></li>
            </ul>
        </div>
        <div>
            <a href="/personal/{{auth()->user()->id}}/cluster" class="btn btn-secondary btn-sm">
                Por clusters automáticos
            </a>
        </div>
        <div>
            <a href="/personal/{{auth()->user()->id}}">
                <i class="bi bi-x-square-fill text-dark"></i>
            </a>
        </div>
    </div>

    @if(count($personal) > 0)
        @if ($ruta == "")
            <div id="grid">
                <table class="table table-spaced">
                    <thead>
                        <tr>
                            <th>Portada</th>
                            <th>Título</th>
                            <th>Fecha</th>
                            
                            @if (auth()->user()->rol != "redactor")
                                <th>Redactor</th>
                            
                            @else
                                <th>Categoría</th>
                            @endif
                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->user()->rol != "redactor")
                            <!-- Aquí se cargarán dinámicamente los datos de los medios -->
                            @foreach ($personal as $seleccionada)
                                <tr>
                                    <td class="align-middle"><img src="{{ asset($seleccionada->noticia->foto)}}" alt="{{ $seleccionada->noticia->titulo }}" style="max-width: 60%; max-height:30vh"></td>
                                    <td class="align-middle">{{$seleccionada->noticia->titulo}}</td>
                                    <td class="align-middle">{{$seleccionada->noticia->fecha}}</td>
                                    @if (auth()->user()->rol != "redactor")
                                        <td class="align-middle">{{$seleccionada->noticia->redactor->nombre}} {{$seleccionada->noticia->redactor->apellidos}}</td>
                                    
                                    @else
                                        <td class="align-middle">{{$seleccionada->noticia->category->nombre}}</td>
                                    @endif
                                    
                                    <td class="align-middle column">
                                        <div class="dropdown" style="display: inline-block;">
                                            <button class="btn btn-light p-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-download" style="color: black; font-size:20px;"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/noticias/{{$seleccionada->noticia->id}}/descargarPDF" download>Descargar PDF</a>
                                                <a class="dropdown-item" href="/noticias/{{$seleccionada->noticia->id}}/descargarJSON" download>Descargar JSON</a>
                                            </div>
                                        </div>
                                        <a class="btn btn-light p-0" href="/noticia/{{$seleccionada->noticia->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                        <a class="btn btn-light p-0" href="/noticias/{{$seleccionada->noticia->id}}/unsave"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>

                                        @if (auth()->user()->rol != "redactor")
                                            <a class="btn btn-light p-0" href="/chat/{{$seleccionada->noticia->redactor->id}}"><i class="bi bi-send mx-2" style="color: black; font-size:20px;"></i></a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($personal as $seleccionada)
                                <tr>
                                    <td class="align-middle"><img src="{{ asset($seleccionada->foto)}}" alt="{{ $seleccionada->titulo }}" style="max-width: 60%; max-height:30vh"></td>
                                    <td class="align-middle">{{$seleccionada->titulo}}</td>
                                    <td class="align-middle">{{$seleccionada->fecha}}</td>
                                    @if (auth()->user()->rol != "redactor")
                                        <td class="align-middle">{{$seleccionada->redactor->nombre}} {{$seleccionada->redactor->apellidos}}</td>
                                    
                                    @else
                                        <td class="align-middle">{{$seleccionada->category->nombre}}</td>
                                    @endif
                                    
                                    <td class="align-middle">
                                        <div class="dropdown" style="display: inline-block;">
                                            <button class="btn btn-light p-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-download" style="color: black; font-size:20px;"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/noticias/{{$seleccionada->id}}/descargarPDF" download>Descargar PDF</a>
                                                <a class="dropdown-item" href="/noticias/{{$seleccionada->id}}/descargarJSON" download>Descargar JSON</a>
                                            </div>
                                        </div>
                                        <a class="btn btn-light p-0" href="/noticia/{{$seleccionada->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                        <a class="btn btn-light p-0" href="/noticias/{{$seleccionada->id}}/unsave"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>

                                        @if (auth()->user()->rol != "redactor")
                                            <a class="btn btn-light p-0" href="/chat/{{$seleccionada->redactor->id}}"><i class="bi bi-send mx-2" style="color: black; font-size:20px;"></i></a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div style="margin-bottom: 155px;"></div>
        @else
            <div class="text-center mt-4">
                <h3 class="m-0">Tus noticias agrupadas en bloques automáticos</h3>
                <img class="img-fluid" src="{{ asset('images/' . $ruta) }}" alt="Mapa de calor generado automáticamente a partir de tus noticias">
            </div>
        @endif
        
    @else
        <h4>No has seleccionado ninguna noticia</h4>
        <div style="margin-bottom: 350px;"></div>
    @endif

    <div class="d-flex justify-content-center">
        @if (auth()->user()->rol == "redactor" || (!($personal->count() > 3)))
            {{ $personal->links() }}
        @endif
        
        
    </div>
</div>

   

@endsection