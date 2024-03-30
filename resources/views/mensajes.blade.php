@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')

<div class="container">
    <h2 class="m-4">Mis mensajes</h2>

    @if ($chats->isEmpty())
        <h4>En este momento no tienes ningún mensaje</h4>
    
    @else
        <div id="grid">
            <table class="table table-spaced">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Último mensaje</th>                    
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se cargarán dinámicamente los datos de los mennsajes -->
                    @foreach ($chats as $chat)
                        <tr>
                            @if (auth()->user()->rol != "redactor")
                                <td class="align-middle">{{$chat->redactor->nombre}} . {{$chat->redactor->apellidos}}</td>
                                <td class="align-middle">{{$chat->redactor->email}}</td>
                                <td class="align-middle">{{$chat->redactor->mensaje}}</td>
                                <td class="align-middle">
                                    <a class="btn btn-light p-0" href="/chat/{{$chat->redactor->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                    <a class="btn btn-light p-0" href="/eliminar_chat/{{$chat->redactor->id}}"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>
                                </td>
                            @else
                                <td class="align-middle">{{$chat->medio->nombre}} {{$chat->medio->apellidos}}</td>
                                <td class="align-middle">{{$chat->medio->email}}</td>
                                <td class="align-middle">{{$chat->mensaje}}</td>
                                <td class="align-middle">
                                    <a class="btn btn-light p-0" href="/chat/{{$chat->medio->id}}"><i class="bi bi-eye mx-2" style="color: black; font-size:20px;"></i></a>
                                    <a class="btn btn-light p-0" href="/eliminar_chat/{{$chat->medio->id}}"><i class="bi bi-trash mx-2" style="color: black; font-size:20px;"></i></a>
                                </td>
                            @endif
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $chats->links() }}
        </div>
    @endif
</div>


@endsection