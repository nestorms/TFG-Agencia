@extends('layouts.base')
@section('title', 'Inicio')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="container">
    <h2 class="text-left m-4">Publicar noticia</h2>

    <form action="/crear_noticia" method="post">
        @csrf
        <div class="d-flex flex-wrap justify-content-center mx-5">
            
            <div class="box">
                <label for="texto1" class="form-label">Título</label>
                <textarea id="texto1" name="titulo" class="form-control mb-3" rows="5"></textarea>
                @if ($errors->has('titulo'))
                    <span class="text-danger text-left">{{ $errors->first('titulo') }}</span>
                @endif
            </div>
            
            <div class="box">
                <label for="texto2" class="form-label">Descripción</label>
                <textarea id="texto2" name="descripcion" class="form-control mb-3" rows="5"></textarea>
                @if ($errors->has('descripcion'))
                    <span class="text-danger text-left">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
            
            
            <div class="box">
                <label for="inputTexto" class="form-label">Palabras clave</label>
                <input type="text" id="inputTexto" name="palabras_clave" class="form-control mb-3" >
            </div>
            
            
            <div class="box">
                <label for="inputArchivo" class="form-label">Foto de portada</label>
                <div class="input-group mb-3">
                    <input type="file" name="foto" class="form-control" id="inputArchivo">
                    @if ($errors->has('foto'))
                        <span class="text-danger text-left">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
                
            </div>
            
            
            <div class="box desplegable">
                <label for="opciones" class="form-label">Categoría</label> <button type="button" onclick="clasificar()" id="btnSeleccionAutomatica" class="btn btn-light">Seleccionar automáticamente</button>
                <select id="opciones" class="form-select mb-3" name="categoria_id">
                    <option selected value="0">Selecciona una opción</option>

                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('categoria_id'))
                    <span class="text-danger text-left">{{ $errors->first('categoria_id') }}</span>
                @endif
            </div>
            
            
            <div class="box fecha">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" id="fecha" name="fecha" class="form-control mb-3">
                @if ($errors->has('fecha'))
                    <span class="text-danger text-left">{{ $errors->first('fecha') }}</span>
                @endif
            </div>
            
            
            <div class="contenido m-4">
                <label for="textoAnchoCompleto" class="form-label">Contenido</label>
                <textarea id="textoAnchoCompleto" name="contenido" class="form-control w-100" rows="10"></textarea>
                @if ($errors->has('contenido'))
                    <span class="text-danger text-left">{{ $errors->first('contenido') }}</span>
                @endif
            </div>
            
        </div>
        
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-lg btn-dark w-25 p-3">Publicar</button>
        </div>
    </form>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    /*document.getElementById("btnSeleccionAutomatica").addEventListener("click", function() {
        // Realizar una solicitud AJAX a la ruta 'llamar-script-python'
        var titulo = document.getElementById("texto1").value;
        var descripcion = document.getElementById("texto2").value;
        var contenido = document.getElementById("textoAnchoCompleto").value;

        // Unir los valores en un solo texto
        var texto = titulo + " " + descripcion + " " + contenido;

        fetch('{{ url("clasificar") }}', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ texto: texto })
        })
            .then(response => response.text())
            .then(data => {
            // Actualizar el valor seleccionado en el desplegable con el número devuelto por el script de Python
            document.getElementById("opciones").value = data;
            })
            .catch(error => {
            console.error('Error al llamar al script de Python:', error);
            });
        });


       /* var token2 = $('meta[name="csrf-token"]').attr('content');
        console.log("Token obtenido:", token2);
        $.ajax({
            type: 'POST',
            url: '/script',
            data: { 
                test: texto,
                _token: token2,
            },
            dataType: 'json',
            success: function(response) {
                console.log("Respuesta exitosa recibida:", response);
                // Actualizar el contador de guardados en la interfaz de usuario
                $('#saveCount' + id).text(response.saved);
                document.getElementById("opciones").value = data;
                $(button3).removeClass('btn-outline-dark saveBtn').addClass('btn-dark unsaveBtn').text('No guardar');
                button3.setAttribute("onclick","unsave()");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });*/


</script>
<script>
    function clasificar(){
        var titulo = document.getElementById("texto1").value;
        var descripcion = document.getElementById("texto2").value;
        var contenido = document.getElementById("textoAnchoCompleto").value;

        // Uno los valores en un solo texto
        var texto = titulo + " " + descripcion + " " + contenido;

        console.log("Texto obtenido:", texto);
        var token2 = $('meta[name="csrf-token"]').attr('content');
        console.log("Token obtenido:", token2);
        $.ajax({
            type: 'POST',
            url: '/script',
            data: { 
                test: texto,
                _token: token2,
            },
            dataType: 'json',
            success: function(response) {
                console.log("Respuesta exitosa recibida:", response);
                // Actualizar la categoria seleccionada
                var selectedOption = response.categoria; // Suponiendo que 'response.categoria' contiene el valor deseado
                $('#opciones').val(selectedOption);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    };
</script>


@endsection