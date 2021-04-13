<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Categoria;

class CategoriaController extends Controller
{
    
    public function formcreate(Request $request)
    {
        $request->user()->authorizeRole('admin');
        return view('admin.categorias.create');
    }
    public function save(Request $request){
        //validaciones
        $validate =$this->validate($request,[
                'nombre' => ['required', 'string', 'max:255'],
        ]);

        //recoger datos
        $nombre = $request->input('nombre');
        
        //asiganar valores
        $categoria = new Categoria();
        $categoria->nombre = $nombre;
        $categoria->save();

        return redirect()->route('admin.categorias')
                            ->with(['message'=>'Se creo la categoria']);
    }
    public function destroy(Categoria $id){
        $id->delete();
        return redirect()->route('admin.categorias')
        ->with(['message'=>'Se elimino la categoria']);
    }
    public function update(Request $request){
        $validate =$this->validate($request,[
            'nombre' => ['required', 'string', 'max:255']
    ]);
            $categoria_id = $request->input('categoria_id');
            $nombre = $request->input('nombre');
            $categoria = Categoria::find($categoria_id);
            $categoria->nombre = $nombre;

            $categoria->update();
            return redirect()->route('admin.categorias')
                            ->with(['message'=>'Se actualizo correctamente']);
    }
    
    public function edit($id)
    {
        $categoria=Categoria::find($id);
			return view('admin.categorias.edit',[
                'categoria'=>$categoria
            ]);
		}
}