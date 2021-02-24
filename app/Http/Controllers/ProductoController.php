<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Producto;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('producto.create');
    }
    public function save(Request $request){
        //validaciones
        $validate =$this->validate($request,[
                'nombre' => ['required', 'string', 'max:255'],
                'precio' => ['required'],
                'estado' => ['required'],
                'garantia' => ['required'],
                'noexistencia' => ['required'],
                'descripcion' => ['required'],
        ]);

        //recoger datos
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $estado = $request->input('estado');
        $garantia = $request->input('garantia');
        $noexistencia = $request->input('noexistencia');
        $descripcion = $request->input('descripcion');
        $image = $request->file('image');

        //asiganar valores
        $user = \Auth::user();
        $producto = new Producto();
        $producto->user_id = $user->id;
        $producto->nombre = $nombre;
        $producto->precio  = $precio;
        $producto->estado = $estado;
        $producto->garantia = $garantia;
        $producto->noexistencia = $noexistencia;
        $producto->descripcion = $descripcion;

        //subir fichero 
        $imagen = $request->file('image');
        if($imagen){
            $imagen_name= time().$imagen->getClientOriginalName();
            Storage::disk('productos')->put($imagen_name, File::get($imagen));
            $producto->image = $imagen_name;
        }
        $producto->save();

        return redirect()->route('home')
                            ->with(['message'=>'Se posteo tu producto']);
    }
    public function getImage($filename){
        $file = Storage::disk('productos')->get($filename);
        return new Response($file,200);
    }
}
