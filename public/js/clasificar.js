function clasificar(){
    var titulo = document.getElementById("texto1").value;
    var descripcion = document.getElementById("texto2").value;
    var contenido = document.getElementById("textoAnchoCompleto").value;

    // Uno los valores en un solo string
    var texto = titulo + " " + descripcion + " " + contenido;

    if(texto.trim() == ""){
        document.getElementById("error-clasificar").innerHTML="Escribe algo para clasificar tu noticia automáticamente!";
        return;
    }

    console.log("Texto obtenido:", texto);
    var token2 = $('meta[name="csrf-token"]').attr('content');
    console.log("Token obtenido:", token2);
    $.ajax({
        type: 'POST',
        url: '/clasificar',
        data: { 
            test: texto,
            _token: token2,
        },
        dataType: 'json',
        success: function(response) {
            console.log("Respuesta exitosa recibida:", response);
            //Eliminar posible mensaje de error anterior
            document.getElementById("error-clasificar").innerHTML="";
            document.getElementById("ok-clasificar").innerHTML="Noticia clasificada automáticamente por Newstor!";
            // Actualizar la categoria seleccionada
            var selectedOption = response.categoria; // Suponiendo que 'response.categoria' contiene el valor deseado
            $('#opciones').val(selectedOption);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};