<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newstor</title>
</head>
<body>
    <h1>Registro de Newstor</h1><br>

    <form action="/registro" method="post">
        @csrf

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">

        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email">

        <label for="password">Contraseña(min longitud 6)</label>
        <input type="password" name="password" id="password">

        <label for="telefono">Teléfono</label>
        <input type="number" name="telefono" id="telefono">

        <label for="empresa">Empresa asociada</label>
        <input type="text" name="empresa" id="empresa">

        <label for="enlace">Enlace web</label>
        <input type="text" name="enlace" id="enlace">

        <input type="submit" value="Registrarse">
    </form>
    

    
</body>
</html>