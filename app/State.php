<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lga;
class State extends Model
{
    protected $fillable = [
        'state_name'
    ];

    public function lgas(){
        return $this->hasMany('App\Lga');
    }
}
