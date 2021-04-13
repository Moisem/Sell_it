<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\User;
use PDF;

class PDFController extends Controller
{
    public function PDFCategorias (){
        $categorias=Categoria::all();
        $pdf = PDF::loadView('admin.categorias.PDF.PDFCategorias', compact('categorias'));
        return $pdf->download('categorias.pdf');
    }
    public function PDFUserproductos ($id){
        $user = User::find($id);
        $productos = Producto::whereUser_id($user->id)->latest()->paginate();
        $pdf = PDF::loadView('admin.users.PDF.PDFUserproductos', compact('user','productos'));
        return $pdf->setPaper('a4','landscape')->download('ReporteIndividual.pdf');
    }
    public function PDFProductosmensual (){

        $productos = Producto::where('created_at', '>=', now()->subDays(30))->get();
        $contar = count(Producto::where('created_at', '>=', now()->subDays(30))->get());
        $pdf = PDF::loadView('admin.productos.PDF.PDFProductosmensual', compact('productos','contar'));
        return $pdf->setPaper('a4','landscape')->download('ReporteMensualProductos.pdf');
    }
    public function PDFUsersmensual (){

        $users = User::where('created_at', '>=', now()->subDays(30))->get();
        $contar = count(User::where('created_at', '>=', now()->subDays(30))->get());
        $pdf = PDF::loadView('admin.users.PDF.PDFUsersmensual', compact('users','contar'));
        return $pdf->setPaper('a4','landscape')->download('ReporteMensualUsuarios.pdf');
    }
    public function PDFproductosdisponibles (){
        $productos = Producto::whereEstado('Disponible')->latest()->get();
        $contar = count(Producto::whereEstado('Disponible')->latest()->get());
        $pdf = PDF::loadView('admin.productos.PDF.PDFProductosdisponibles', compact('productos','contar'));
        return $pdf->setPaper('a4','landscape')->download('ProductosDisponibles.pdf');
    }
    public function PDFproductosvendidos (){
        $productos = Producto::whereEstado('Vendido')->latest()->get();
        $contar = count(Producto::whereEstado('Vendido')->latest()->get());
        $pdf = PDF::loadView('admin.productos.PDF.PDFProductosvendidos', compact('productos','contar'));
        return $pdf->setPaper('a4','landscape')->download('ProductosVendidos.pdf');
    }
    
}
