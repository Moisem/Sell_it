<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = 'membresias';

    //relacion one to many = uno a muchos
    public function suscripcion(){
        return $this->hasMny('App\Suscripcion');
    }

    
}
