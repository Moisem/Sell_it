<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use App\Mail\RespondeMailable;
use Illuminate\Support\Facades\Mail;
use App\Contacto;
class ContactanosController extends Controller
{
    public function store(Request $request){
        $nombre=$request->get('nombre');
        $apellidos=$request->get('apellidos');
        $email=$request->get('email');
        $comentario=$request->get('comentarios');

        $validate = $this->validate($request,[
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'apellidos' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string','email', 'min:10', 'max:50'],
            'comentarios' => ['required', 'string', 'min:10','max:255']
        ]);

        Contacto::create([
            'nombre'=>$nombre,
            'apellidos'=>$apellidos,
            'email'=>$email,
            'comentarios'=>$comentario
        ]);
        $correo = new ContactanosMailable($request->all());
        Mail::to('sellitdml@gmail.com')->send($correo);

        return redirect()->route('quiensomos')->with(['message'=>'¡Gracias por tus comentarios!']);
    }
    public function email(Request $request){
        $request->user()->authorizeRole('admin');
        $emails = Contacto::all();
        return view('admin.emails.emails',['emails'=>$emails]);
    }
    public function responde(Request $request){
        $email=$request->get('email');
        $correo = new RespondeMailable($request->all());
        Mail::to($email)->send($correo);

        return redirect()->route('emails')->with(['message'=>'¡Gracias por tus comentarios!']);
    }
    public function respondec(Request $request, $id)
    {
        $request->user()->authorizeRole('admin');
        $email=Contacto::find($id);
			return view('admin.emails.responde',[
                'email'=>$email
            ]);
        
    }
}
