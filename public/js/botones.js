function like(){
    var button2 = document.getElementById("like");
        var id = button2.getAttribute("data-id");
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: '/noticias/' + id + '/like',
            data: { 
                id: id,
                _token: token
            },
            dataType: 'json',
            success: function(response) {
                // Actualizar el contador de likes en la interfaz de usuario
                $('#likeCount' + id).text(response.likes);

                $(button2).removeClass('btn-outline-dark likeBtn').addClass('btn-dark unlikeBtn').text('No me gusta');
                button2.setAttribute("onclick","unlike()");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
};


function save(){
    //Obtengo el botón a pulsar y el ID de la noticia
    var button3 = document.getElementById("guardar");
    var id = button3.getAttribute("data-id");
    console.log("ID obtenido:", id);
    var token2 = $('meta[name="csrf-token"]').attr('content');
    console.log("Token obtenido:", token2);
    $.ajax({
        //URL donde se ejecuta la petición y que llama al controlador
        type: 'POST',
        url: '/noticias/' + id + '/save', 
        data: { //Datos a enviar en la petición (id noticia)
            id: id,
            _token: token2,
        },
        dataType: 'json',
        success: function(response) {
            console.log("Respuesta exitosa recibida:", response);
            // Actualizar el contador de guardados en la interfaz de usuario
            $('#saveCount' + id).text(response.saved);

            //Cambio el botón de color y la función a activar con el onclick
            $(button3).removeClass('btn-outline-dark saveBtn').addClass('btn-dark unsaveBtn').text('No guardar');
            button3.setAttribute("onclick","unsave()");
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};




function unlike(){
    var button2 = document.getElementById("like");
    var id = button2.getAttribute("data-id");
    var token = $('meta[name="csrf-token"]').attr('content');
    

    $.ajax({
        type: 'POST',
        url: '/noticias/' + id + '/unlike',
        data: { 
            id: id,
            _token: token
        },
        dataType: 'json',
        success: function(response) {
            // Actualizar el contador de likes en la interfaz de usuario
            $('#likeCount' + id).text(response.likes);

            // Cambiar la apariencia y el texto del botón
            
                $(button2).removeClass('btn-dark unlikeBtn').addClass('btn-outline-dark likeBtn').text('Me gusta');
                button2.setAttribute("onclick","like()");
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};


function unsave(){
    var button3 = document.getElementById("guardar");
    var id = button3.getAttribute("data-id");
    var token = $('meta[name="csrf-token"]').attr('content');
    

    $.ajax({
        type: 'POST',
        url: '/noticias/' + id + '/unsave',
        data: { 
            id: id,
            _token: token
        },
        dataType: 'json',
        success: function(response) {
            // Actualizar el contador de guardados en la interfaz de usuario
            $('#saveCount' + id).text(response.saved);

            // Cambiar la apariencia y el texto del botón
            
                $(button3).removeClass('btn-dark unsaveBtn').addClass('btn-outline-dark saveBtn').text('Guardar');
                button3.setAttribute("onclick","save()");
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};
