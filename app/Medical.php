<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Medical extends Model
{
    protected $fillable = [
        'user_id',
        'bloodGroup',
        'genotype',
        'height',
        'weight',
        'chestWidth'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
