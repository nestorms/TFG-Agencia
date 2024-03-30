@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')

    <style>
        .form-control{
            border-color:gray   ;
        }

        .form-label{
            font-weight: bold;
        }
        .izq{
            font-weight: bold;
            font-size: 20px
        }

        h2{
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
<div class="container align-items-center">
    <h2 class="mx-4">Modificar perfil</h2>

    @if($message != null)
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    <div class="row pt-3">
        <div class="col-md-3 p-0">
            <!-- Botones verticales -->
            <div class="d-flex flex-column align-items-center p-2 m-2">
                <img src="{{ asset('images/profile.png') }}" class="img-fluid" style="width: 7vw; height: auto;" alt="Imagen de perfil">
                <p class="izq"><strong>{{$usuario->nombre}}</strong></p>

                <div class="d-flex justify-content-center mb-4">
                    <a href="/personal/{{$usuario->id}}" class="btn btn-outline-dark p-3">Mis noticias</a>
                </div>

                @if ($usuario->rol == "medio")
                    <p class="izq">{{$usuario->noticias_medio->count()}} noticias seleccionadas</p>
                    <p class="izq">Medio de comunicación</p>
                @else
                    <p class="izq">{{$usuario->noticias_redactor->count()}} noticias publicadas</p>
                    <p class="izq">Redactor de Newstor</p>
                @endif
                
                
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="d-flex flex-column align-items-center p-3 m-3">
                <form action="/config/{{$usuario->id}}" method="post">
                    @csrf
                        <!-- Label y text area tamaño medio -->
                        <div class="container w-100 mb-4">
                            <label for="inputTexto1" class="form-label">Nombre</label>
                            <input type="text" id="inputTexto1" name="nombre" class="form-control mb-3" value="{{$usuario->nombre}}">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control mb-3" value="{{$usuario->apellidos}}">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" id="email" name="email" class="form-control mb-3" value="{{$usuario->email}}">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="password" class="form-label">Contraseña (dejar así para mantener)</label>
                            <input type="password" id="password" name="password" class="form-control mb-3">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" id="telefono" name="telefono" class="form-control mb-3" value="{{$usuario->telefono}}">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="empresa" class="form-label">Empresa</label>
                            <input type="text" id="empresa" name="empresa" class="form-control mb-3" value="{{$usuario->empresa}}">
                        </div>
            
                        <div class="container w-100 mb-4">
                            <label for="enlace" class="form-label">Enlace</label>
                            <input type="text" id="enlace" name="enlace" class="form-control mb-3" value="{{$usuario->enlace}}">
                        </div>
                         
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-dark w-50 p-3">Guardar perfil</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection