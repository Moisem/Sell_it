<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Suscripcion extends Model
{
    protected $table = 'suscripciones';
    protected $fillable=['fechainicio', 'fechafin', 'total', 'estado', 'membresia_id'];

    //relacion one to many = uno a muchos
    public function user(){
        return $this->hasMany(User::class);
    }
    //relacion many to one = muchos a uno
    public function membresia(){
        return $this->belongsTo('App\Membresia','membresia_id');
    }
}
