<?php

namespace App\Http\Controllers;

use App\Membresia;
use Illuminate\Http\Request;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $productos = Producto::whereEstado('Disponible')->inRandomOrder()->take(4)->get();
        $susProductos=DB::select("SELECT pro.id, pro.nombre, pro.precio, pro.estado, pro.garantia,
        pro.noexistencia, pro.descripcion, pro.image, pro.user_id, pro.categoria_id,
        pro.created_at, pro.updated_at FROM productos AS pro,
                users, suscripciones 
                WHERE pro.estado='Disponible' AND 
                pro.user_id=users.id AND
                users.suscripcion_id=suscripciones.id AND 
                suscripciones.estado='activa' LIMIT 6");

        $membrecia=Membresia::all();
        return view('home',[
            'productos'=>$productos,
            'membrecia'=>$membrecia,
            'sus'=>$susProductos
        ]);
    }
}
