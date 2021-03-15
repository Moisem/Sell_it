<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable=['nombre', 'precio', 'estado', 'garantia', 'existencia', 
    'descripcion', 'image', 'user_id', 'categoria_id'];

    //relacion one to many = uno a muchos
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
    //relacion many to one = muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
