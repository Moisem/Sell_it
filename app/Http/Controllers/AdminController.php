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
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRole('admin');
        return view('admin.admin');
    }
    public function users(Request $request)
    {
        $request->user()->authorizeRole('admin');
        $users=User::all();
        return view('admin.users.usuarios',['users'=>$users]);
    }
    public function categorias(Request $request)
    {
        $request->user()->authorizeRole('admin');
        $categorias=Categoria::all();
        return view('admin.categorias.categorias',['categorias'=>$categorias]);
    }
    public function productos(Request $request)
    {
        $request->user()->authorizeRole('admin');
        $productos=Producto::all();
        return view('admin.productos.productos',['productos'=>$productos]);
    }
}
