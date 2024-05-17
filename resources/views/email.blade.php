<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: white;
            padding: 10px;
            text-align: left;
        }
        .logo {
            width: 250px;
            height: 80px;
        }
        .content {
            padding: 20px;
        }
        .noticia {
            border-bottom: 1px solid #dddddd;
            padding: 10px 0;
        }
        .noticia:last-child {
            border-bottom: none;
        }
        .categoria {
            font-size: 1.2em;
            color: #007bff;
        }
        .titulo {
            font-size: 1.5em;
            font-weight: bold;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="http://newstor.test"><img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Logo de la Aplicación" class="logo"></a>
    </div>
    <div class="content">
        <h2>Hey {{$usuario->nombre}}, tienes nuevas noticias recomendadas en Newstor:</h2>
        @foreach ($noticias as $noticia)
            <div class="noticia">
                <div class="categoria">{{ $noticia['noticia']->category->nombre }}</div>
                <div class="titulo">{{ $noticia['noticia']->titulo }}</div>
            </div>
        @endforeach
        <br>
        <strong>Accede a tu cuenta de Newstor aquí: <a href="http://newstor.test/login">http://newstor.test/login</a></strong>
    </div>
</body>
</html>