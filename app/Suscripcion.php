<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $table = 'suscripciones';

    //relacion one to many = uno a muchos
    public function user(){
        return $this->hasMany('App\User');
    }
    //relacion many to one = muchos a uno
    public function membresia(){
        return $this->belongsTo('App\Membresia','membresia_id');
    }
}
