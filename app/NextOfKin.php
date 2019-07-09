<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class NextOfKin extends Model
{
    protected $fillable = [
        'user_id',
        'nokfn',
        'nokg',
        'nokr',
        'noka',
        'nokp'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
