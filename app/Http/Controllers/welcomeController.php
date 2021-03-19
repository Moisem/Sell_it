<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class welcomeController extends Controller
{
    public function index(){
        $productos = Producto::whereEstado('Disponible')->latest()->paginate();
        return view('welcome',[
            'productos'=>$productos
        ]);
    }
}
