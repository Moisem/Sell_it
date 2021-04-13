<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Producto;
use App\Categoria;
use App\User;
use Illuminate\Support\Facades\DB;
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
        $productos = Producto::whereEstado('Disponible')->latest()->paginate();
        $susProductos=DB::select("SELECT pro.id, pro.nombre, pro.precio, pro.estado, pro.garantia,
        pro.noexistencia, pro.descripcion, pro.image, pro.user_id, pro.categoria_id,
        pro.created_at, pro.updated_at FROM productos AS pro,
                users, suscripciones 
                WHERE pro.estado='Disponible' AND 
                pro.user_id=users.id AND
                users.suscripcion_id=suscripciones.id AND 
                suscripciones.estado='activa' LIMIT 5");
        return view('producto.index',[
            'productos'=>$productos,
            'sus'=>$susProductos
        ]);
    }
    public function create(){
        $categorias=Categoria::all();
            return view('producto.create',[
                'categorias'=>$categorias
            ]);
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
                'categoria' => ['required'],
        ]);

        //recoger datos
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $estado = $request->input('estado');
        $garantia = $request->input('garantia');
        $noexistencia = $request->input('noexistencia');
        $descripcion = $request->input('descripcion');
        $categoria=$request->input('categoria');
        $image = $request->file('image');
        

        //asiganar valores
        $user = Auth::user();
        $producto = new Producto();
        $producto->user_id = $user->id;
        $producto->nombre = $nombre;
        $producto->precio  = $precio;
        $producto->estado = $estado;
        $producto->garantia = $garantia;
        $producto->noexistencia = $noexistencia;
        $producto->descripcion = $descripcion;
        $producto->categoria_id = $categoria;
        //subir fichero 
        $imagen = $request->file('image');
        if($imagen){
            $imagen_name= time().$imagen->getClientOriginalName();
            Storage::disk('productos')->put($imagen_name, File::get($imagen));
            $producto->image = $imagen_name;
        }
        $producto->save();

        return redirect()->route('productos')
                            ->with(['message'=>'Se posteo tu producto']);
    }
    public function getImage($filename){
        $file = Storage::disk('productos')->get($filename);
        return new Response($file,200);
    }
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categorias=Categoria::all();
        return view('producto.edit',[
            'producto'=>$producto,
            'categorias'=>$categorias
        ]);
    }
    public function update(Producto $id, Request $request){
        $validate =$this->validate($request,[
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required'],
            'estado' => ['required'],
            'garantia' => ['required'],
            'noexistencia' => ['required'],
            'descripcion' => ['required'],
            'categoria' => ['required'],
    ]);
            $producto = Producto::findOrFail($id)->first();
            $nombre = $request->input('nombre');
            $precio = $request->input('precio');
            $estado = $request->input('estado');
            $garantia = $request->input('garantia');
            $noexistencia = $request->input('noexistencia');
            $descripcion = $request->input('descripcion');
            $categoria=$request->input('categoria');
            $image = $request->file('image');
        
            $user=Auth::user();
            $producto->user_id = $user->id;
            $producto->nombre = $nombre;
            $producto->precio  = $precio;
            $producto->estado = $estado;
            $producto->garantia = $garantia;
            $producto->noexistencia = $noexistencia;
            $producto->descripcion = $descripcion;
            $producto->categoria_id = $categoria;

            $imagen = $request->file('image');
            if($imagen){
                $imagen_name= time().$imagen->getClientOriginalName();
                Storage::disk('productos')->put($imagen_name, File::get($imagen));
                $producto->image = $imagen_name;
            }
            $producto->save();

            return redirect()->route('misproductos');
    }
    
    public function show($id){
        $product=Producto::whereId($id)->first();
        $relacion=Producto::whereCategoria_id($product->categoria_id)->inRandomOrder()->take(4)->get();
        return view('producto.show',[
            "producto"=>$product,
            "productos"=>$relacion
        ]);
    }
    public function misproductos(){
        $categorias=Categoria::all();
        $user=User::with('productos')->findOrFail(auth()->user()->id);
        return view('user.misproductos',[
            'usuario'=>$user,
            'categoria'=>$categorias,
        ]);
    }
    public function destroy(Producto $id){
        $id->delete();
        return redirect()->route('misproductos');
    }

}
