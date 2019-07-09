<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'soo',
        'lga',
        'aoo',
        'sor',
        'lgor',
        'aor'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
