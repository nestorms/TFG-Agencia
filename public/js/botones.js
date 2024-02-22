function like(){
    console.log("HOLA BLEBEL");
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

                $(button2).removeClass('btn-outline-light likeBtn').addClass('btn-light unlikeBtn').text('No me gusta');
                button2.setAttribute("onclick","unlike()");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
};




function unlike(){
    console.log("HOLA AMIGO");
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
                
                    $(button2).removeClass('btn-light unlikeBtn').addClass('btn-outline-light likeBtn').text('Me gusta');
                    button2.setAttribute("onclick","like()");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
};



/*
    $('.likeBtn').click(function() {
        console.log("HOLA BLEBEL");
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var button = $(this);

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

                // Cambiar la apariencia y el texto del botón
                if (button.hasClass('btn-outline-light')) {
                    button.removeClass('btn-outline-light likeBtn').addClass('btn-light unlikeBtn').text('No me gusta');
                } else {
                    button.removeClass('btn-primary').addClass('btn-outline-light').text('PACOO');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('.unlikeBtn').click(function() {
        console.log("HOLA AMIGO");
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var button2 = $(this);

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
                if (button2.hasClass('btn-light unlikeBtn')) {
                    button2.removeClass('btn-light unlikeBtn').addClass('btn-outline-light likeBtn').text('Me gusta');
                } else {
                    button2.removeClass('btn-primary').addClass('btn-outline-light').text('MASAAAAAAAAAAl');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    */