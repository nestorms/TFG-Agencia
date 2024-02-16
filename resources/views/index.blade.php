@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')

@endsection

@section('content')
<h1>Pagina principal Newstor</h1>

<div class="container" style="max-width: 800px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/coparey.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: white;">Título de la Noticia 1</h5>
                    <p>Descripción de la Noticia 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/profile.png') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título de la Noticia 2</h5>
                    <p>Descripción de la Noticia 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/bell.png') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título de la Noticia 3</h5>
                    <p>Descripción de la Noticia 3</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
