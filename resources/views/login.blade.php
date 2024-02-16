<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>{{env('APP_NAME')}}</title>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
  
      
      <!-- Estilo personalizado para este diseño login -->
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  </head>


  <body class="text-center"> 
    <main class="form-signin">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo de la Agencia">
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <form method="post" action="/login" class="container w-25">
            @csrf   
            <h1>Iniciar sesión</h1>

            <!-- Campo de Correo Electrónico -->
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="email" placeholder="Correo electrónico" required="required" autofocus>
                <label for="floatingName">Correo electrónico</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            <!-- Campo de Contraseña -->
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
                <label for="floatingPassword">Contraseña</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Botón de Iniciar Sesión -->
            <button class="w-100 btn btn-lg btn-dark" type="submit">Inicia sesión</button>
            <hr class="separator">
            <p>¿No tienes cuenta?</p>
            <a href="/registro">Regístrate</a>
        </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>