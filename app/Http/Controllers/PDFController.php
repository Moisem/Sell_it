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
    
}
