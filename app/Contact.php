<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'soo',
        'soon',
        'lga',
        'aoo',
        'sor',
        'sorn',
        'lgor',
        'aor'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getSoonAttribute($value)
    {
        return ucfirst($value);
    }

}
