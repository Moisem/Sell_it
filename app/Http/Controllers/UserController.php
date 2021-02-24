<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function miperfil(){
        return view('user.miperfil');
    }
    public function update(Request $request){
        //Conseguir usuario
        $user = \Auth::user();
        $id = $user->id;
        //Validacion del formularios
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'apellidopaterno' => ['required', 'string', 'max:255'],
            'apellidomaterno' => ['required', 'string', 'max:255'],
            'numtelefonico' => ['required', 'string', 'max:255','unique:users,numtelefonico,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
        //Recoger datos del formulario
        $name = $request->input('name');
        $apellidopaterno = $request->input('apellidopaterno');
        $apellidomaterno = $request->input('apellidomaterno');
        $numtelefonico = $request->input('numtelefonico');
        $email = $request->input('email');
        
        //Asiganar nuevos valores al objeto usuario
        $user->name = $name;
        $user->apellidopaterno  = $apellidopaterno ;
        $user->apellidomaterno = $apellidomaterno;
        $user->numtelefonico = $numtelefonico;
        $user->email = $email;

        $user->update();
        return redirect()->route('miperfil')
                            ->with(['message'=>'Usuario actulizado correctamente']);

    }
}
