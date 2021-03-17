<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function modificarperfil(){
        return view('user.modificarperfil');
    }
    public function update(Request $request){
        //Conseguir usuario
        $user = Auth::user();
        $id = $user->id;
        //Validacion del formularios
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'apellidopaterno' => ['required', 'string', 'max:255'],
            'apellidomaterno' => ['required', 'string', 'max:255'],
            'numtelefonico' => ['required', 'string', 'max:255','unique:users,numtelefonico,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
        //Recoger datos del formulario
        $name = $request->input('name');
        $apellidopaterno = $request->input('apellidopaterno');
        $apellidomaterno = $request->input('apellidomaterno');
        $numtelefonico = $request->input('numtelefonico');
        $email = $request->input('email');
        
        //Asiganar nuevos valores al objeto usuario
        $user->name = $name;
        $user->apellidopaterno  = $apellidopaterno ;
        $user->apellidomaterno = $apellidomaterno;
        $user->numtelefonico = $numtelefonico;
        $user->email = $email;

        //subir imagen
        $imagen = $request->file('image');
        if($imagen){
            $imagen_name= time().$imagen->getClientOriginalName();
            Storage::disk('users')->put($imagen_name, File::get($imagen));
            $user->image = $imagen_name;
        }

        $user->update();
        return redirect()->route('miperfil')
                            ->with(['message'=>'Perfil actulizado correctamente']);

    }
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }

    public function perfil($id){
        $user = User::find($id);
        return view('user.miperfil',[
            'user'=>$user
        ]);
    }
}
