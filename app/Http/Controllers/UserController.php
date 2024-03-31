<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Noticia;
use App\Models\UserNoticia;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function registro(){
        if(Auth::check()){
            return redirect('/');
        }

        return view('registro');
    }

    public function login(Request $request){
        if(Auth::check()){
            return redirect('/');
        }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'],
            [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El email debe ser una dirección de correo válida',
                'password.required' => 'El campo contraseña es requerido',
                'password.min' => 'La contraseña debe tener al menos :min caracteres'
            ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)){
            return redirect('/login')->withErrors([
                'message' => 'Credenciales incorrectas. Por favor, verifica tu email y contraseña.']);
        }
        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect('/');
        
        
    }

    public function logout(){
        
        Session::flush();
        Auth::logout();

        return redirect('/');
        
        
    }


    public function store(Request $request){
        //dd($request->all());
        $user = $request->validate([
        'nombre' => 'required|min:2|max:255',
        'apellidos' => 'required|min:2|max:255',
        'email' => 'required|unique:users,email|min:7|max:255',
        'password' => 'required|min:5',
        'enlace' => 'min:5',
        'empresa' => 'required|min:3',
        'telefono' => 'required'],
        [
            'email.required' => 'El campo email es requerido',
            'email.unique' => 'Este correo ya está en uso',
            'email.min' => 'Longitud mínima de 2 caracteres',
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'Longitud mínima de 2 caracteres',
            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'Longitud mínima de 5 caracteres',
            'apellidos.required' => 'El campo apellido es requerido',
            'apellidos.min' => 'Longitud mínima de 2 caracteres',
            'empresa.required' => 'El campo empresa es requerido',
            'telefono.required' => 'El campo teléfono es requerido',
            
        ]);

        $user['rol']="medio";

        User::create($user);
        return redirect('/login')->with('success', 'Registro completado con éxito!');
    }

    public function modificar($id){
        
        $usuario = User::findOrFail($id);

        return view('modificar_user', ['usuario' => $usuario]);
    }
    

    public function update(Request $request, $id){

        $usuario = User::findOrFail($id);

        $datos = $request->only(['nombre', 'apellidos', 'enlace', 'empresa', 'telefono', 'email']); //La contraseña no, ya que debo hashearla antes de meterla en la BD

        if ($request->filled('password')) {
            // Hasheo la nueva contraseña
            $passwordEncriptada = bcrypt($request->password);
            // Actualizo la contraseña del usuario
            $usuario->password = $passwordEncriptada;
        }
    
        $usuario->fill($datos);
        $usuario->save();


        if($usuario->rol =="medio"){
            $rol="Medio";
        }
        else{
            $rol="Redactor";
        }

        return redirect()->route('administracion')->with('message', $rol . " modificado con éxito");
    }

    public function delete($id){
        
        $usuario = User::findOrFail($id);
        User::findOrFail($id)->delete();

        if($usuario->rol =="medio"){
            $rol="Medio";
        }
        else{
            $rol="Redactor";
        }

        return redirect()->route('administracion')->with('message', $rol . " eliminado con éxito");
    }


    public function administracion(){

        $medios = User::where('rol', 'medio')->get();
        $redactores = User::where('rol', 'redactor')->get();
        $categorias = Category::all();
        $noticias = Noticia::paginate(5);
        $comentarios = Comment::all();

        if(auth()->user()->rol == "admin"){
            return view('/administracion',
            [
                'medios' => $medios,
                'redactores' => $redactores,
                'noticias' => $noticias,
                'categorias' => $categorias,
                'comentarios' => $comentarios
            ]);
        }
        else{
            return redirect('/');
        }
    }


    public function personal($id){

        $personal="";

        if(User::findOrFail($id)->rol != "redactor"){
            $personal=UserNoticia::where('user_id',$id)->where('recomendada',false)->paginate(3);
        }
        else{
            $personal=Noticia::where('redactor_id',$id)->paginate(3);
        }

        

        return view('personal', ['personal' => $personal]);
    }

    public function config($id){

        $usuario=User::findOrFail($id);

        return view('config', ['usuario' => $usuario, 'message' => null]);
    }

    public function modificarPerfil(Request $request, $id){

        $usuario = User::findOrFail($id);

        $datos = $request->only(['nombre', 'apellidos', 'enlace', 'empresa', 'telefono', 'email']); //La contraseña no, ya que debo hashearla antes de meterla en la BD

        if ($request->filled('password')) {
            // Hasheo la nueva contraseña
            $passwordEncriptada = bcrypt($request->password);
            // Actualizo la contraseña del usuario
            $usuario->password = $passwordEncriptada;
        }
    
        $usuario->fill($datos);
        $usuario->save();

        return view('config', ['usuario' => $usuario, 'message' => 'Perfil modificado con éxito']);
    }


    public function showMensajes($id){

        $chats="";

        if(auth()->user()->rol != "redactor"){

            $chats = Chat::where('medio_id', $id)->get();
        }
        else{

            $chats = Chat::where('redactor_id', $id)->get();
        }

        $uniqueChats = [];

        //Bucle para crear un par clave-valor y almacenar los chats sin repetir ID de usuarios. Se restan los ID para poner el key del array
        foreach ($chats as $chat) {
            $key = $chat->medio_id < $chat->redactor_id ? $chat->medio_id . '-' . $chat->redactor_id : $chat->redactor_id . '-' . $chat->medio_id;

            //Si no existe aun el par clave-valor o si la fecha y hora del mensaje es más reciente, se introduce el chat en el array
            if (!array_key_exists($key, $uniqueChats) || $chat->fecha . ' ' . $chat->hora > $uniqueChats[$key]->fecha . ' ' . $uniqueChats[$key]->hora) {
                $uniqueChats[$key] = $chat;
            }
        }

        //Se pasa a colección para la vista
        $chats = collect($uniqueChats);

        return view('mensajes', ['chats' => $chats]);
        
    }

    public function showChat($id){

        $chats="";

        $destinatario = User::findOrFail($id);

        if(auth()->user()->rol != "redactor"){

             $chats = Chat::where('medio_id', auth()->user()->id)
             ->where('redactor_id', $id)
             ->orderBy('fecha', 'asc')
             ->orderBy('hora', 'asc')
             ->get();
        }
        else{

             $chats = Chat::where('redactor_id', auth()->user()->id)
             ->where('medio_id', $id)
             ->orderBy('fecha', 'asc')
             ->orderBy('hora', 'asc')
             ->get();
        }

        return view('chat', ['chats' => $chats, 'destinatario' => $destinatario]);
        
    }

    public function enviarMensaje(Request $request, $id){

        $chats="";

        if(auth()->user()->rol != "redactor"){

            Chat::create([
                'redactor_id' => $id,
                'remitente_id' => auth()->user()->id,
                'medio_id' => auth()->user()->id,
                'mensaje' => $request->mensaje,
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s'),

            ]);
        }
        else{

            Chat::create([
                'medio_id' => $id,
                'remitente_id' => auth()->user()->id,
                'redactor_id' => auth()->user()->id,
                'mensaje' => $request->mensaje,
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s'),

            ]);
        }

        return redirect()->route('chat',$id);
        
    }
}
