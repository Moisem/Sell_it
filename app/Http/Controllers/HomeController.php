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

        $productos = Producto::whereEstado('Disponible')->latest()->paginate();
        
        $sus=DB::select("SELECT users.email, suscripciones.estado 
            FROM users, suscripciones  WHERE suscripciones.id=users.suscripcion_id
            AND suscripciones.estado='vencida'");
            $num=(count($sus));
            for ($i=0; $i < $num; $i++) {
                $emails=$sus[$i]->estado;
            }
        $membrecia=Membresia::all();
        return view('home',[
            'productos'=>$productos,
            'membrecia'=>$membrecia,
            'sus'=>$emails
        ]);
    }
}
