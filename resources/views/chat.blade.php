@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')

<style>


    .messages-container {
        max-height: 400px;
        min-height: 400px;
        overflow-y: auto;
        width: 100%;
    }

    .col-md-8{
        min-width: 60vw;
        max-height: 600px;
        min-height: 400px;
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
        margin-right: 10px; /* Espacio a la derecha del icono */
        border-radius: 50%;
        background-color: #cfcbcb;
        border: 1px solid black;
        width: 60px;
        height: 60px;
        align-content: center;
        text-align: center;
        font-size: 22px;
    }

    .icon-right {
        float: right;
        margin-left: 10px; /* Espacio a la izquierda del icono */

        border-radius: 50%;
        background-color: #b9d9c6;
        border: 1px solid black;
        width: 60px;
        height: 60px;
        align-content: center;
        text-align: center;
        font-size: 22px;
    }

    .icon-large {
        width: 50px; /* Tamaño del icono */
        height: 50px;
    }

    #message{
        border: none!important;
        width: 93%!important;
    }

    #message:focus{
        outline: none!important;
        border-color: black!important;
        transition: 1000ms!important;
    }
</style>


@endsection

@section('content')

<div class="container">

    <h2 class="m-4">Chat con {{$destinatario->nombre}} {{$destinatario->apellidos}} </h2>

    <div class="row justify-content-center m-5" >
        <div class="col-md-8 border border-dark p-1">
            <div class="messages-container">

                @foreach ($chats as $chat)
                    <div class="message overflow-auto m-4">
                        @if ($chat->remitente_id == auth()->user()->id)
                            <div class="">
                                <div class="icon-right">
                                    
                                    {{ substr(auth()->user()->nombre, 0, 1) }}
                                </div>
                                <div class="speech-bubble-right">
                                    <small>{{$chat->mensaje}}</small>
                                    
                                </div>
                                <small style="float: right; margin-top:10px; margin-right:8px">{{ \Carbon\Carbon::parse($chat->hora)->format('H:i') }}</small>
                            </div>
                        @else
                            <div class="d-flex align-items-center">
                                <div class="icon-left">
                                    
                                    {{ substr($destinatario->nombre, 0, 1) }}

                                </div>
                                <div class="speech-bubble-left">
                                    <p class="m-0">{{$destinatario->nombre}} <small>({{$destinatario->empresa}})</small></p>
                                    <small>{{$chat->mensaje}}</small>
                                    
                                </div>
                                <small style="float: left; margin-left:8px;">{{ \Carbon\Carbon::parse($chat->hora)->format('H:i') }}</small>
                            </div>
                            
                        @endif
                    </div>
                @endforeach

                
            </div>
            <div class="text-center border-top border-dark-subtle">
                <form action="/chat/{{$destinatario->id}}" method="post">
                    @csrf
                    <div class="input-group mx-1">
                        <input id="message" type="text" class="" placeholder="Escribe tu mensaje..." name="mensaje">
                        <button type="submit" class="btn btn-light"><i class="bi bi-send m-2" style="color: black; font-size:20px;"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 150px"></div>
    
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Función para desplazar el contenedor de mensajes hacia abajo
    function scrollToBottom() {
        var container = $('.messages-container');
        container.scrollTop(container[0].scrollHeight);
    }

    // Llamar a la función después de cargar la página
    $(document).ready(function() {
        scrollToBottom();
    });
</script>

@endsection