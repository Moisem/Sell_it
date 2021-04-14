<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['nombre'];
    public function user(){
        return $this->belongsToMany('App\User');
    }
}
