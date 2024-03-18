<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function modificar($id){
        
        $categoria = Category::findOrFail($id);

        return view('modificar_categoria', ['categoria' => $categoria]);
    }

    public function editar(Request $request, $id){

        $categoria = Category::findOrFail($id);

        $datos = $request->only(['nombre', 'descripcion', 'palabras_clave']);
        $categoria->fill($datos);
        $categoria->save();

        return redirect()->route('administracion')->with('message',"Categoría modificada con éxito");
    }
}
