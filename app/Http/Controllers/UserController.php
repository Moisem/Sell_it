<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use App\Categoria;
use App\Comentario;
use App\Contacto;
use App\Membresia;
use Validator;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function modificarperfil(){
        $role=DB::select("SELECT * FROM users AS us, role_user AS rol WHERE rol.user_id=us.id AND rol.role_id=2");
        return view('user.modificarperfil',[
            'rol'=>$role
        ]);
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
        $productos = Producto::whereUser_id($id)
        ->whereEstado('Disponible')->get();
        return view('user.miperfil',[
            'user'=>$user,
            'productos'=>$productos
        ]);
    }

    public function comentarios(Request $request){
        $nombre=$request->get('nombre');
        $apellidos=$request->get('apellidos');
        $email=$request->get('email');
        $comentario=$request->get('comentarios');

        $validate = $this->validate($request,[
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'apellidos' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string','email', 'min:10', 'max:50'],
            'comentarios' => ['required', 'string', 'min:10','max:255']
        ]);

        Contacto::create([
            'nombre'=>$nombre,
            'apellidos'=>$apellidos,
            'email'=>$email,
            'comentarios'=>$comentario
        ]);

        return redirect()->route('quiensomos')->with(['message'=>'¡Gracias por tus comentarios!']);
    }
}

