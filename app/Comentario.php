<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    //relacion many to one = muchos a uno
    public function user(){
        return $this->belongsTo('App\User','users_id');
    }
    public function producto(){
        return $this->belongTo('App\Producto','producto_id');
    }
}
