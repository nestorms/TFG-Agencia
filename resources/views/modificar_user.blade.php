@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<div class="container">
    @if ($usuario->rol == "medio")
        <h2>Modificar medio</h2>
    @endif

    @if ($usuario->rol == "redactor")
        <h2>Modificar redactor</h2>
    @endif

    <form action="/modificar_user/{{$usuario->id}}" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5 mt-4">
            <!-- Label y text area tamaño medio -->
            <div class="container w-50">
                <label for="inputTexto1" class="form-label">Nombre</label>
                <input type="text" id="inputTexto1" name="nombre" class="form-control mb-3" value="{{$usuario->nombre}}">
            </div>

            <div class="container w-50">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control mb-3" value="{{$usuario->apellidos}}">
            </div>

            <div class="container w-50">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control mb-3" value="{{$usuario->email}}">
            </div>

            <div class="container w-50">
                <label for="password" class="form-label">Contraseña (dejar así para mantener)</label>
                <input type="password" id="password" name="password" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" id="telefono" name="telefono" class="form-control mb-3" value="{{$usuario->telefono}}">
            </div>

            <div class="container w-50">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" id="empresa" name="empresa" class="form-control mb-3" value="{{$usuario->empresa}}">
            </div>

            <div class="container">
                <label for="enlace" class="form-label">Enlace</label>
                <input type="text" id="enlace" name="enlace" class="form-control mb-3" value="{{$usuario->enlace}}">
            </div>
             
        </div>
        
        <!-- Botón centrado para enviar el formulario -->
        <div class="d-flex justify-content-center m-3">

            @if ($usuario->rol == "medio")
                <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Modificar medio</button>
            @endif

            @if ($usuario->rol == "redactor")
                <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Modificar redactor</button>
            @endif
            
        </div>
    </form>

</div>


@endsection