<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    //relacion one to many = uno a muchos
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
    //relacion many to one = muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function categoria(){
        return $this->belongTo('App\Categoria','categoria_id');
    }
}
