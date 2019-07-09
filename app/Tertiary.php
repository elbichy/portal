<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Tertiary extends Model
{
    protected $fillable = [
        'user_id',
        'qualification',
        'institution',
        'location',
        'course',
        'grade',
        'TstartYear',
        'TendYear'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
