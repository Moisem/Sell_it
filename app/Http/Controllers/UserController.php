<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use App\Categoria;
use Validator;
use Hash;
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

        $user->save();
        return redirect()->route('modificarperfil')
                            ->with(['message'=>'Perfil actulizado correctamente']);

    }
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->route('modificarperfil')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect()->route('modificarperfil')->with('message', 'Password cambiado con éxito');
            }
            else
            {
                return redirect()->route('modificarperfil')->with('message', 'No es tu password actual');
            }
        }
    }
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }

    public function perfil($id){
        $user = User::find($id);
        $productos = Producto::whereUser_id($user->id)
        ->whereEstado('Disponible')
        ->latest()->paginate();
        return view('user.miperfil',[
            'user'=>$user,
            'productos'=>$productos
        ]);
    }
}
