<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function registro(){
        return view('registro');
    }


    public function store(Request $request){
        //dd($request->all());
        $user = $request->validate([
        'nombre' => 'required|min:2|max:255',
        'apellidos' => 'required|min:2|max:255',
        'email' => 'required|unique:users,email|min:7|max:255',
        'password' => 'required|min:5',
        'enlace' => 'min:5',
        'empresa' => 'required|min:4',
        'telefono' => 'required']);

        $user['rol']="medio";

        User::create($user);
        return redirect('/login')->with('success', 'Registro completado con éxito!');
    }
}
