<?php

namespace App\Http\Controllers;

use App\Membresia;
use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class welcomeController extends Controller
{
    public function index(){
        $productos = Producto::whereEstado('Disponible')->latest()->paginate();
        $susProductos=DB::select("SELECT pro.id, pro.nombre, pro.precio, pro.estado, pro.garantia,
        pro.noexistencia, pro.descripcion, pro.image, pro.user_id, pro.categoria_id,
        pro.created_at, pro.updated_at FROM productos AS pro,
                users, suscripciones 
                WHERE pro.estado='Disponible' AND 
                pro.user_id=users.id AND
                users.suscripcion_id=suscripciones.id AND 
                suscripciones.estado='activa'");

        $membrecia=Membresia::all();
        return view('home',[
            'productos'=>$productos,
            'membrecia'=>$membrecia,
            'sus'=>$susProductos
        ]);
    }
    public function getImage($filename){
        $file = Storage::disk('productos')->get($filename);
        return new Response($file,200);
    }
}
