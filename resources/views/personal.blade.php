@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')

<div class="container">
    <h2 class="m-4">Mi sección personal</h2>


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
                            
                            <td class="align-middle">
                                <a href="/noticias/{{$seleccionada->noticia->id}}/descargar" download><i class="bi bi-download mx-2" style="color: black; font-size:20px;"></i></a>
                                <a href="/noticia/{{$seleccionada->noticia->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                <a href="/noticias/{{$seleccionada->noticia->id}}/unsave"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>

                                @if (auth()->user()->rol != "redactor")
                                    <a href="/mensaje/{{$seleccionada->noticia->redactor->id}}"><i class="bi bi-send mx-2" style="color: black; font-size:20px;"></i></a>
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
                                <a href="/noticias/{{$seleccionada->id}}/descargar" download><i class="bi bi-download mx-2" style="color: black; font-size:20px;"></i></a>
                                <a href="/noticia/{{$seleccionada->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                <a href="/noticias/{{$seleccionada->id}}/unsave"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>

                                @if (auth()->user()->rol != "redactor")
                                    <a href="/mensaje/{{$seleccionada->redactor->id}}"><i class="bi bi-send mx-2" style="color: black; font-size:20px;"></i></a>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $personal->links() }}
    </div>
</div>


@endsection