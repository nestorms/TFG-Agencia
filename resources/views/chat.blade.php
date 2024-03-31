@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')

<style>


    .messages-container {
        max-height: 500px;
        overflow-y: auto;
        width: 100%;
    }

    .col-md-8{
        min-width: 60vw;
        max-height: 700px;
    }

    .message {
        clear: both;
        margin-bottom: 20px;
    }

    .speech-bubble-left {
        background-color: #cfcbcb;
        border-radius: 10px;
        padding: 10px;
        margin-left: 10px; /* Espacio a la izquierda del bocadillo */
        float: left;
        max-width: 70%; /* Ancho máximo del bocadillo */
    }

    .speech-bubble-right {
        background-color: #b9d9c6;
        border-radius: 10px;
        padding: 10px;
        margin-right: 10px; /* Espacio a la derecha del bocadillo */
        float: right;
        max-width: 70%; /* Ancho máximo del bocadillo */
    }

    .icon-left {
        float: left;
        margin-right: 0px; /* Espacio a la derecha del icono */
    }

    .icon-right {
        float: right;
        margin-left: 0px; /* Espacio a la izquierda del icono */
    }

    .icon-large {
        width: 50px; /* Tamaño del icono */
        height: 50px;
    }
</style>


@endsection

@section('content')

<div class="container">

    <h2 class="m-4">Chat con {{$destinatario->nombre}} {{$destinatario->apellidos}} </h2>

    <div class="row justify-content-center m-5" >
        <div class="col-md-8 border border-dark">
            <div class="messages-container">

                @foreach ($chats as $chat)
                    <div class="message overflow-auto m-4">
                        @if ($chat->remitente_id == auth()->user()->id)
                            <div class="">
                                <div class="icon-right">
                                    <!-- Icono grande a la derecha -->
                                    <i class="bi bi-person-circle" style="font-size: 3vw;"></i>
                                </div>
                                <div class="speech-bubble-right">
                                    <small>{{$chat->mensaje}}</small>
                                    
                                </div>
                                <small style="float: right; margin-top:10px; margin-right:8px">{{ \Carbon\Carbon::parse($chat->hora)->format('H:i') }}</small>
                            </div>
                        @else
                            <div class="d-flex align-items-center">
                                <div class="icon-left">
                                    <!-- Icono grande a la izquierda -->
                                    <i class="bi bi-person-fill" style="font-size: 3vw;"></i>

                                </div>
                                <div class="speech-bubble-left">
                                    <p class="m-0">{{$destinatario->nombre}}</p>
                                    <small>{{$chat->mensaje}}</small>
                                    
                                </div>
                                <small style="float: left; margin-left:8px;">{{ \Carbon\Carbon::parse($chat->hora)->format('H:i') }}</small>
                            </div>
                            
                        @endif
                    </div>
                @endforeach

                
            </div>
            <div class="text-center">
                <form action="/chat/{{$destinatario->id}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control border border-dark" placeholder="Escribe tu mensaje..." name="mensaje">
                        <button type="submit" class="btn btn-light border border-dark"><i class="bi bi-send mx-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection