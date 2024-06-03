@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    
@endsection

@section('content')
    <section class="principal container mt-5">
        <h1 class="text-dark">Información de Newstor</h1>
        <article class="info mt-4">
            <p>
                Newstor aspira a ofrecer a los amantes de las noticias y de la información su mejor experiencia informativa.
                El concepto de Newstor se caracteriza desde hace tiempo por un esfuerzo permanente en la búsqueda de la innovación y en la orientación al cliente.
            </p>
            <br>
            <p class="lista font-weight-bold">En <strong>Newstor</strong> somos...</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Una agencia innovadora e influyente en el sector europeo de noticias. Newstor marca tendencia.</li>
                <li class="list-group-item">Noticias de España a todo el mundo</li>
                <li class="list-group-item">Dedicada a la distribución de noticias, análisis técnico y comunicación entre entidades</li>
                <li class="list-group-item">El modelo Newstor se basa en tres pilares estratégicos: ser la mejor fuente de noticias, el mejor proveedor de servicios informativos y el mejor gestor de análisis.</li>
                <li class="list-group-item"></li>
            </ul>
        </article>
    </section>

    <section class="container text-center mt-5">
        <h2 class="text-secondary">Estamos aquí</h2>
        <div class="embed-responsive embed-responsive-16by9" >
            <iframe style="height:55vh; width:60vw;" class="embed-responsive-item m-4" src="https://maps.google.com/maps?q=37.197234469401685, -3.624572157670497&hl=es&z=15&output=embed" alt="Mapa de la ETSIIT de Granada"></iframe>
        </div>
    </section>

@endsection