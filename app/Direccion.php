<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    //relacion many to one = muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
