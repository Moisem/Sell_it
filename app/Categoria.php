<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    
    //relacion one to many = uno a muchos
    public function productos(){
        return $this->hasMany('App\Producto');
    } 


}
