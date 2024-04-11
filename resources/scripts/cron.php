<?php

// Rutas que deseas ejecutar
$rutas = [
    'http://localhost/entrenar_modelo',
    'http://localhost/indexar-noticias',
    'http://localhost/indexar-principal',
];

// Itero sobre las rutas y hacer una petición HTTP GET a cada una
foreach ($rutas as $ruta) {
    // Realizo la petición HTTP GET a la ruta
    $response = @file_get_contents($ruta);

    if ($response === false) {
        // Manejo el caso en el que la solicitud falle
        echo "Error al hacer la petición a $ruta\n";
    } else {
        // Código de estado de la respuesta HTTP
        $http_status = explode(' ', $http_response_header[0])[1];
        echo "Petición a $ruta: $http_status\n";
    }
}