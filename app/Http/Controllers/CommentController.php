<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'comentario' => 'required|string',
            'valoracion' => 'required',
        ],[
            'comentario.required' => 'El campo comentario es requerido',
            'valoracion.required' => 'Selecciona tu valoracion de 1 a 5 ',
        ]);

        // Crear un nuevo comentario
        $comentario = new Comment();
        $comentario->comentario = $request->comentario;
        $comentario->valoracion = $request->valoracion;

        // Guardar el comentario en la base de datos
        $comentario->save();

        // Redireccionar a la página anterior o a cualquier otra página que desees
        return redirect()->back()->with('success', 'Comentario publicado exitosamente.');
    }
}
