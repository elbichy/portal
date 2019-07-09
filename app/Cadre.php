<?php

namespace App;
use App\Rank;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cadre extends Model
{
    protected $fillable = [
        'name',
        'acronym',
        'is_commissioned'
    ];   
    
    public function ranks(){
        return $this->hasMany('App\Rank');
    }
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
