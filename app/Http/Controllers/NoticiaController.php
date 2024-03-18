<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use App\Models\Noticia;
use App\Models\User;
use App\Models\Category;
use App\Models\UserNoticia;

use Dompdf\Dompdf;
use Dompdf\Options;

class NoticiaController extends Controller
{
    //

    public function index()
    {
        // Llama a la función para obtener las noticias de la API
        $noticias = Noticia::limit(20)->get();

        // Pasa los datos recuperados a la vista
        return view('index', ['noticias' => $noticias]);
    }

    public function show($id){

        $noticia = Noticia::findOrFail($id);

        return view('noticia', ['noticia' => $noticia]);
    }

    public function modificar($id){
        
        $noticia = Noticia::findOrFail($id);
        $categorias = Category::whereNotIn('id', [$noticia->category->id])->get();

        return view('modificar_noticia', ['noticia' => $noticia, 'categorias' => $categorias]);
    }

    public function editar(Request $request, $id){

        $noticia = Noticia::findOrFail($id);

        $datos = $request->only(['titulo', 'descripcion', 'palabras_clave', 'fecha', 'contenido']);

        // Guardar la imagen en el sistema de archivos
        if($request->filled('foto')){

            $imagenPath = "images/" . $request['foto'] ;
            $noticia->foto = $imagenPath;
        }


        $noticia->fill($datos);
        $noticia->save();

        return redirect()->route('administracion')->with('message',"Noticia modificada con éxito");
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
                'guardados' => rand(10,150),
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

    public function like($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->likes++;
        $noticia->save();
        return response()->json(['likes' => $noticia->likes]);
    }

    public function unlike($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->likes--;
        $noticia->save();
        return response()->json(['likes' => $noticia->likes]);
    }

    public function save($id)
    {
        if (auth()->check()) {
            // Obtengo el ID del usuario autenticado
            $userId = auth()->user()->id;
            $noticia = Noticia::findOrFail($id);
            UserNoticia::create([
                'user_id' => $userId,
                'noticia_id' => $id,
            ]);
            $noticia->guardados++;
            $noticia->save();
            return response()->json(['saved' => $noticia->guardados]);

        }
        else {
            // Si el usuario no está autenticado, devuelvo mensaje de error
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }

    public function unsave($id)
    {
        if (auth()->check()) {
            // Obtengo el ID del usuario autenticado
            $userId = auth()->user()->id;
            $noticia = Noticia::findOrFail($id);
            
            // Busco la fila en la tabla intermedia user_noticia
            UserNoticia::where('user_id', $userId)->where('noticia_id', $id)->delete();

            $noticia->guardados--;
            $noticia->save();
            return response()->json(['saved' => $noticia->guardados]);

        }
        else {
            // Si el usuario no está autenticado, devuelvo mensaje de error
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }


    public function descargarPDF($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Cargar la vista con la información de la noticia
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);
        $pdf->loadHtml(view('noticia_pdf', ['noticia' => $noticia])->render());

        // Renderizar el PDF
        $pdf->render();

        // Descargar el PDF
        return $pdf->stream('noticia.pdf');
    }

    
}
