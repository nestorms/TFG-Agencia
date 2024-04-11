@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<div class="container">
    <h2>Crear redactor</h2>

    <form action="/crear_redactor" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5 mt-4">
            <!-- Label y text area tamaño medio -->
            <div class="container w-50">
                <label for="inputTexto1" class="form-label">Nombre</label>
                <input type="text" id="inputTexto1" name="nombre" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" id="telefono" name="telefono" class="form-control mb-3">
            </div>

            <div class="container w-50">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" id="empresa" name="empresa" class="form-control mb-3">
            </div>

            <div class="container">
                <label for="enlace" class="form-label">Enlace</label>
                <input type="text" id="enlace" name="enlace" class="form-control mb-3">
            </div>
             
        </div>
        
        <!-- Botón centrado para enviar el formulario -->
        <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Crear redactor</button>
        </div>
    </form>

</div>


@endsection