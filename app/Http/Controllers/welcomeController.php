<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class welcomeController extends Controller
{
    public function index(){
        $product=Producto::latest()->take(6)->get();
        return view('welcome', [
            'productos'=>$product
        ]);
    }
}
