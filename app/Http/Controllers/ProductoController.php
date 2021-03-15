<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Producto;
use App\Categoria;
use App\Users;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user=Auth::user()->id;
        $productos = Producto::latest()->paginate();
        return view('producto',[
            'productos'=>$productos
        ]);
    }
    public function create(){
            $categorias=Categoria::all();
            return view('producto.create',[
                'categoria'=>$categorias
            ]);
    }
    public function store(Request $request){
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
        $existencia = $request->input('existencia');
        $descripcion = $request->input('descripcion');
        $image = $request->file('image');
        $categoria=$request->input('categoria');

        //asiganar valores
        $user = Auth::user();
        $producto = new Producto();
        $producto->user_id = $user->id;
        $producto->nombre = $nombre;
        $producto->precio  = $precio;
        $producto->estado = $estado;
        $producto->garantia = $garantia;
        $producto->existencia = $existencia;
        $producto->descripcion = $descripcion;
        $producto->categoria_id=$categoria;
        //subir fichero 
        $imagen = $request->file('image');
        if($imagen){
            $imagen_name= time().$imagen->getClientOriginalName();
            Storage::disk('productos')->put($imagen_name, File::get($imagen));
            $producto->image = $imagen_name;
        }
        $producto->save();

        return redirect()->route('producto')
                            ->with(['message'=>'Se posteo tu producto']);
    }
    public function getImage($filename){
        $file = Storage::disk('productos')->get($filename);
        return new Response($file,200);
    }

    public function show($id){
        $product=Producto::whereId($id)->first();
        $relacion=Producto::whereCategoria_id($product->categoria_id)->inRandomOrder()->take(3)->get();
        return view('producto.show',[
            "producto"=>$product,
            "productos"=>$relacion
        ]);
    }

}
