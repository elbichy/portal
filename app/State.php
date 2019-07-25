<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lga;
use App\User;
class State extends Model
{
    protected $fillable = [
        'state_name'
    ];

    public function lgas(){
        return $this->hasMany('App\Lga');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
