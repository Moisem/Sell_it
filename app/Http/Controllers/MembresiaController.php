<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membresia;
use App\Suscripcion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MembresiaController extends Controller
{

    public function show($id){
        $membresia=Membresia::whereId($id)->first();
        return view('membresias.show',[
            "membresia"=>$membresia
        ]);
    }
        public function save($membresia){
            $user=Auth::user();
            if ($user->suscripcion_id==0) {
                $fecha=Carbon::now();
                $fin=Carbon::now()->addMonths(1);
                $comprar=Membresia::findOrFail($membresia);
                $fechainicio=$fecha->format('y-m-d');
                $fechafin=$fin->format('y-m-d');
                $total=$comprar->precio;
                $estado="activa";
                $membresiaid=request('id');
                $suscipcion=Suscripcion::create([
                'fechainicio'=>$fechainicio,
                'fechafin'=>$fechafin,
                'total'=>$total,
                'estado'=>$estado,
                'membresia_id'=>$membresiaid
            ]);
                $user->suscripcion_id=$suscipcion->id;
                $user->save();
                return redirect()->route('home')->with(['message'=>'Tu suscripcion ha sido aprobada']);
            }else{
                return redirect()->route('home')->with(['message'=>'Lo sentimos, no puede contratar otro plan porque ya cuenta con uno']);
            }
        }
}
