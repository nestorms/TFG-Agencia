<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

            @if ($errors->has('message'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
            @endif

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
            <a class="icon-link icon-link-hover link-primary" href="/registro">Regístrate<i class="bi bi-person-plus-fill"></i></a>
        </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>