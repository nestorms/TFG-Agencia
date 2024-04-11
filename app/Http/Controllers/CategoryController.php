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

    public function create(Request $request){
        $categoria = $request->validate([
            'nombre' => 'required|min:2|max:255',
            'descripcion' => 'required|min:2|max:255',
            'palabras_clave' => 'required|min:7|max:255'],
            [
                'descripcion.required' => 'El campo descripcion es requerido',
                'nombre.required' => 'El campo nombre es requerido',
                'palabras_clave.required' => 'El campo palabras clave es requerido',
            ]);
    
        Category::create($categoria);
        
        return redirect('/administracion')->with('message', 'Categoría creada con éxito');
    }

    public function update(Request $request, $id){

        $categoria = Category::findOrFail($id);

        $datos = $request->only(['nombre', 'descripcion', 'palabras_clave']);
        $categoria->fill($datos);
        $categoria->save();

        return redirect()->route('administracion')->with('message',"Categoría modificada con éxito");
    }

    public function delete($id){
        
        Category::findOrFail($id)->delete();

        return redirect()->route('administracion')->with('message',"Categoría eliminada con éxito");
    }
}
