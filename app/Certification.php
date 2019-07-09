<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Certification extends Model
{
    protected $fillable = [
        'user_id',
        'institute',
        'location',
        'title',
        'startdate',
        'enddate'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
