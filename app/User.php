<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role','name', 'apellidopaterno','apellidomaterno','numtelefonico', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion one to many = uno a muchos
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
    public function producto(){
        return $this->hasMany('App\Producto');
    }
    public function direccion(){
        return $this->hasMany('App\Direccion');
    }
    //relacion many to one = muchos a uno
    public function suscripcion(){
        return $this->belongsTo('App\Suscripcion','suscripcion_id');
    }
}
