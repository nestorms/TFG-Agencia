<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class NoticiaController extends Controller
{
    //

    public function show()
    {
        // Llama a la función para obtener las noticias de la API
        $noticias = $this->obtenerNewsAPI();

        // Pasa los datos recuperados a la vista
        return view('index', ['noticias' => $noticias]);
    }

    /*public function obtenerNoticias()
    {
        $client = new Client();

        // Configura la solicitud GET con la URL de la API de NewsAPI y tus credenciales de API
        $response = $client->get('https://newsapi.org/v2/top-headlines', [
            'query' => [
                'country' => 'us', // Cambia el país según tu preferencia
                'apiKey' => '8b979930f5714e1bb4d38e1842b3bd66', // Reemplaza con tu propia clave API
            ]
        ]);

        // Obtiene el cuerpo de la respuesta como una cadena JSON
        $body = $response->getBody();

        // Convierte la respuesta JSON en un array asociativo
        $data = json_decode($body, true);

        // Devuelve los datos de noticias obtenidos de la API
        return $data['articles'];
    }*/


    public function obtenerNewsAPI(){

        $newsapi = new NewsApi('8b979930f5714e1bb4d38e1842b3bd66');
        $category="sports";
        $q="futbol";
        # /v2/everything
        $all_articles = $newsapi->getEverything($q, null, null, null, null, null, "es", null,  20, null);

        # /v2/top-headlines/sources
        $sources = $newsapi->getSources($category, "es", null);

        # /v2/top-headlines
        $top_headlines = $newsapi->getTopHeadlines($q, $sources, null, null, 20, null);

        if (isset($all_articles->articles)) {
            // Si hay artículos, devolverlos
            return $all_articles->articles;
        } else {
            // Si no hay artículos, devolver un array vacío o manejar el error según sea necesario
            return [];
        }
        
    }

    
}
