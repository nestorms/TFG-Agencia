<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Newstor</title>

    <link rel="stylesheet" href="css/login.css">
</head>


    <body class="text-center"> 

            <!-- Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo de la Agencia">
            </div>
            
            <h1 class=" text-decoration-underline mb-5">Registro</h1>
            <!-- Formulario de Inicio de Sesión -->
            <form method="post" action="/registro" class="container align-items-center w-50 mb-5">
                @csrf   
            
                <!-- Primera fila: Nombre y Teléfono -->
                <div class="form-group mb-5 row">
                    <div class="form-floating col-md-6 ">
                        <input type="text" class="form-control border border-dark-subtle" name="nombre" placeholder="">
                        <label for="floatingInput" style="margin-left: 11px">Nombre</label>
                        @if ($errors->has('nombre'))
                            <span class="text-danger text-left">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control floating-input border border-dark-subtle" pattern="[0-9]{9}" min="1" name="telefono" placeholder=" " maxlength="9">
                        <label for="floatingName" style="margin-left: 11px">Teléfono</label>
                        @if ($errors->has('telefono'))
                            <span class="text-danger text-left">{{ $errors->first('telefono') }}</span>
                        @endif
                    </div>
                </div>
            
                <!-- Segunda fila: Apellidos y Empresa -->
                <div class="form-group form-floating mb-5 row">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control border border-dark-subtle" name="apellidos" placeholder=" ">
                        <label for="floatingName" style="margin-left: 11px">Apellidos</label>
                        @if ($errors->has('apellidos'))
                            <span class="text-danger text-left">{{ $errors->first('apellidos') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control floating-input border border-dark-subtle" name="empresa" placeholder=" ">
                        <label for="empresa" style="margin-left: 11px">Empresa Asociada</label>
                        @if ($errors->has('empresa'))
                            <span class="text-danger text-left">{{ $errors->first('empresa') }}</span>
                        @endif
                    </div>
                </div>
            
                <!-- Tercera fila: Email y Enlace Web -->
                <div class="form-group mb-5 row">
                    <div class="col-md-6 form-floating">
                        <input type="email" class="form-control floating-input border border-dark-subtle" name="email" placeholder=" ">
                        <label for="email" style="margin-left: 11px">Correo electrónico</label>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="url" class="form-control floating-input border border-dark-subtle" name="enlace_web" placeholder=" ">
                        <label for="enlace_web" style="margin-left: 11px">Enlace Web</label>
                    </div>
                </div>
            
                <!-- Cuarta fila: Contraseña -->
                <div class="form-group mb-5 row">
                    <div class="col-md-6 form-floating">
                        <input type="password" class="form-control floating-input border border-dark-subtle" name="password" placeholder=" ">
                        <label for="password" style="margin-left: 11px">Contraseña</label>
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <!-- Botón de Registrarse -->
                        <button class="btn btn-lg btn-dark" type="submit">Registrarme</button>
                        
                    </div> 
                </div> 
                <hr>
                <p>¿Ya tienes una cuenta?</p>
                <a class="icon-link icon-link-hover link-primary" href="/login">Inicia sesión<i class="bi bi-lock-fill"></i></a>
            </form>
            

            
            
            
    

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>