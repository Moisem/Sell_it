<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class Membresia extends Model
{
    protected $table = 'membresias';

    //relacion one to many = uno a muchos
    public function suscripcion(){
        return $this->hasMny('App\Suscripcion');
    }

    public function guardar($membresia){
        $user=Auth::user();
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
                $user->update();
    }
    
}
