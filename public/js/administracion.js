    var comentariosMostrados = false;
    var mediosMostrados = false;
    var redactoresMostrados = false;
    var categoriasMostrados = false;
    var noticiasMostrados = false;

    function showMedios() {
        $('#gridMedios').show();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        mediosMostrados=true;
    }

    function showRedactores() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').show();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        redactoresMostrados=true;
    }

    function showComentarios() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').show();
        $('#gridNoticias').hide();
        comentariosMostrados=true;
    }

    function showCategorias() {
        $('#gridCategorias').show();
        $('#gridMedios').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').hide();
        categoriasMostrados=true;
    }

    function showNoticias() {
        $('#gridMedios').hide();
        $('#gridCategorias').hide();
        $('#gridRedactores').hide();
        $('#gridComentarios').hide();
        $('#gridNoticias').show();
        noticiasMostrados=true;
    }

    /*document.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
            showNoticias(); // Llamar a la función para mostrar las noticias
            // Aquí puedes agregar más lógica si es necesario, como cargar los datos de la página correspondiente mediante AJAX
        });
    });*/

    // Ejecutar una función por defecto al cargar la página
    $(document).ready(function() {

        if (comentariosMostrados) {
            showComentarios();
        } 
        else if(mediosMostrados){
            showMedios();
        }
        else if(redactoresMostrados){
            showRedactores();
        }
        else if(categoriasMostrados){
            showCategorias();
        }
        else if(noticiasMostrados){
            showNoticias();
            console.log("entroooooo");
        }

        showNoticias();
    });