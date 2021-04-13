<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\User;
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
        return $this->belongsTo(User::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
