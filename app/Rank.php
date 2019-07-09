<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cadre;
class Rank extends Model
{
    protected $fillable = [
        'cadre_id',
        'name',
        'acronym',
        'gl'
    ];

    public function cadre(){
        return $this->belongsTo('App\Cadre');
    }
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
