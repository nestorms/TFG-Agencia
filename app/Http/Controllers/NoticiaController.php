<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use App\Models\Noticia;
use App\Models\User;
use App\Models\Category;

class NoticiaController extends Controller
{
    //

    public function index()
    {
        // Llama a la función para obtener las noticias de la API
        $noticias = Noticia::inRandomOrder()->limit(20)->get();

        // Pasa los datos recuperados a la vista
        return view('index', ['noticias' => $noticias]);
    }

    public function show($id){

        $noticia = Noticia::findOrFail($id);

        return view('noticia', ['noticia' => $noticia]);
    }


    public static function crearNoticias($consulta, $categoria){
        // Obtener noticias de la API
        $noticias = NoticiaController::obtenerNewsAPI($consulta);
            
        $usuariosMedio = User::where('rol', 'medio')->get();

        $categoria = Category::where('nombre',$categoria)->get()->first();
        

        // Almacenar las noticias en la base de datos
        foreach ($noticias as $noticia) {

            $usuarioMedio = $usuariosMedio->random();

            //list($fecha, $hora) = explode('T', $noticia['publishedAt']);

            $fechaHora = explode('T', $noticia->publishedAt);
            $fecha = $fechaHora[0];
            $hora = $fechaHora[1];

            Noticia::create([
                'titulo' => $noticia->title,
                'descripcion' => $noticia->description,
                'foto' => $noticia->urlToImage,
                'contenido' => $noticia->content,
                'likes' => rand(10,150),
                'fecha' => $fecha,
                'hora' => substr($hora, 0, 8),
                'redactor_id' => $usuarioMedio->id, 
                'categoria_id' => $categoria->id, 
                // Otros campos de la noticia...
            ]);
        }
    }


    public static function obtenerNewsAPI($consulta){

        $newsapi = new NewsApi('8b979930f5714e1bb4d38e1842b3bd66');
        $category="business";
        
        # /v2/top-headlines/sources
        $sources = $newsapi->getSources($category, "es", null);
        # /v2/everything
        $all_articles = $newsapi->getEverything($consulta, null, null, null, null, null, "es", null,  20, null);

        

        # /v2/top-headlines
        //$top_headlines = $newsapi->getTopHeadlines(null, null, null, null, 20, null);

        if (isset($all_articles->articles)) {
            // Si hay artículos, devolverlos
            return $all_articles->articles;
        } else {
            // Si no hay artículos, devolver un array vacío o manejar el error según sea necesario
            return [];
        }
        
    }

    
}
